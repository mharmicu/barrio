<?php

namespace App\Http\Livewire;

use App\Models\Amicable_Settlement;
use App\Models\Arbitration_Award;
use App\Models\Blotter;
use App\Models\Case_Involved;
use App\Models\CaseHearing;
use App\Models\CourtAction;
use App\Models\Hearing;
use App\Models\Incident_Case;
use App\Models\Person;
use App\Models\Person_Signature;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Arr;
use PDF;

class BlotterController extends Component
{
    public function render()
    {
        return view('livewire.blotter-controller');
    }

    public function create()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1  || Auth::user()->user_type_id == 2) {
                $kp_cases = DB::select('SELECT * FROM kp_cases');
                return view('blotter.create', compact('kp_cases'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function store(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                // validation
                $request->validate([
                    //'salutation' => 'required',
                    'lastname' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'firstname' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'middlename' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'case' => 'required',
                    'complaint_desc' => 'required',
                    'relief_desc' => 'required',
                    //'salutation_res' => 'required',
                    'lastname_res' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'firstname_res' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'middlename_res' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'date_of_incident' => 'required',
                    // niremove ko validation sa image hahaha pag nilagyan ko ayaw masaveeeeeee
                ], [
                    // custom error message here if ever meron
                ]);
                // if ever may foreign keys / relationships nang nakaset up, uncomment $book = Auth::user(); and $book->books()->save($book); and delete $book->save();
                // $book = Auth::user();
                $blotter = new Blotter();
                $blotter->case_title = $request->lastname . ' vs ' . $request->lastname_res;
                $blotter->complaint_desc = $request->complaint_desc;
                $blotter->relief_desc = $request->relief_desc;
                $blotter->date_of_incident = $request->date_of_incident;
                $blotter->date_reported = date("Y-m-d H:i:s");
                $blotter->processed_by = Auth::user()->id;
                $blotter->compliance = 0;
                //$blotter->date_of_execution = date("Y-m-d H:i:s");
                $blotter->remarks = '';
                $blotter->save();

                $incident_case = new Incident_Case();
                $incident_case->article_no = $request->case;
                $incident_case->case_no = $blotter->case_no;
                $incident_case->save();

                $person_complainant = new Person();
                $person_complainant->salutation = $request->salutation;
                $person_complainant->first_name = $request->firstname;
                $person_complainant->middle_name = $request->middlename;
                $person_complainant->last_name = $request->lastname;
                $person_complainant->save();

                $person_respondent = new Person();
                $person_respondent->salutation = $request->salutation_res;
                $person_respondent->first_name = $request->firstname_res;
                $person_respondent->middle_name = $request->middlename_res;
                $person_respondent->last_name = $request->lastname_res;
                $person_respondent->save();

                $case_involved = new Case_Involved();
                $case_involved->case_no = $blotter->case_no;
                $case_involved->complainant_id = $person_complainant->person_id;
                $case_involved->respondent_id = $person_respondent->person_id;
                $case_involved->save();

                //saving image
                $image = $request->file('file');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                $person_signature = new Person_Signature();
                $person_signature->file_address = $imageName;
                $person_signature->person_id = $person_complainant->person_id;
                $person_signature->save();



                return redirect()->route('blotter.show')->with('successAddBlotter', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function show()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                $kp_cases = DB::select('SELECT * FROM kp_cases');
                return view('blotter.show', compact('kp_cases'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getBlotterReports(Request $request)
    {
        $case_hearing = array();
        $blotter = array();
        $hearings = array();

        if ($request->ajax()) {
            $data = Blotter::latest()->get();
            $chs = CaseHearing::latest()->get()->unique('case_no');

            foreach ($data as $d) {
                if (!$chs->contains('case_no', $d->case_no)) {
                    $blotter[] = Blotter::where('case_no', $d->case_no)->first();
                }
            }
            foreach ($chs as $c) {
                $hearings[] = Hearing::where('hearing_id', $c->hearing_id)->first();
            }

            foreach ($hearings as $h) {
                if (!$h->settlement_id && !$h->award_id) {
                    $case_hearing[] = CaseHearing::where('hearing_id', $h->hearing_id)->first();
                }
            }

            //check if the case is in COURT ACTION, if yes then wag na idisplay
            $court_actions = CourtAction::select('case_no')->get();
            $CA_case_no = [];
            foreach ($court_actions as $ca) {
                $CA_case_no[] = $ca->case_no;
            }

            foreach ($case_hearing as $ch) {
                if (!in_array($ch->case_no, $CA_case_no, TRUE)) {
                    $blotter[] = Blotter::where('case_no', $ch->case_no)->latest()->first();
                }
            }

            return Datatables::of($blotter)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $case_hearing = CaseHearing::where('case_no', $row->case_no)->latest()->first();
                    $notice = DB::table('notices')->where('case_no', $row->case_no)->first();
                    if ($notice) {
                        $noticeBtn = '<a href="../notice/create/' . $row->case_no   . '" class="edit btn btn-sm btn-primary" >Show Notices</a>';
                    } else {
                        $noticeBtn = '<a href="../notice/schedule/' . $row->case_no . '" class="edit btn btn-sm btn-secondary">Set Meeting Schedule</a>';
                    }
                    if ($case_hearing) {
                        $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->first();
                        $hearing_type = DB::table('hearing_types')->where('hearing_type_id', $hearing->hearing_type_id)->first();
                        switch ($hearing_type->type_name) {
                            case "Mediation":
                                $hearingBtn = '<div class="d-grid gap-2"><a href="../settlement/mediation/' . $row->case_no   . '" class=" btn btn-warning btn-sm">Hearing</a></div>';
                                break;
                            case "Conciliation":
                                $hearingBtn = '<div class="d-grid gap-2"><a href="../settlement/conciliation/' . $row->case_no   . '" class=" btn btn-warning btn-sm">Hearing</a></div>';
                                break;
                            case "Arbitration":
                                $hearingBtn = '<div class="d-grid gap-2"><a href="../settlement/arbitration-award/' . $row->case_no   . '" class=" btn btn-warning btn-sm">Hearing</a></div>';
                                break;
                            default:
                                $hearingBtn = '';
                        }
                    } else {
                        $hearingBtn = '';
                    }
                    $div = '<div class="d-grid gap-2">' . $noticeBtn . $hearingBtn . '</div>';
                    return $div;
                })

                ->addColumn('status', function ($row) {
                    $case_hearing = CaseHearing::where('case_no', $row->case_no)->latest()->first();
                    if ($case_hearing) {
                        $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->first();
                        $hearing_type = DB::table('hearing_types')->where('hearing_type_id', $hearing->hearing_type_id)->first();

                        switch ($hearing_type->type_name) {
                            case "Mediation":
                                $statusBadge = '<span class="badge rounded-pill bg-primary text-uppercase">' . $hearing_type->type_name . '</span>';
                                break;
                            case "Conciliation":
                                $statusBadge = '<span class="badge rounded-pill bg-warning text-uppercase">' . $hearing_type->type_name . '</span>';
                                break;
                            case "Arbitration":
                                $statusBadge = '<span class="badge rounded-pill bg-danger text-uppercase">' . $hearing_type->type_name . '</span>';
                                break;
                            default:
                                $statusBadge = '<span class="badge rounded-pill bg-dark">N/A</span>';
                        }
                    } else {
                        $statusBadge = '<span class="badge rounded-pill bg-dark">N/A</span>';
                    }
                    return $statusBadge;
                })
                ->editColumn('date_of_incident', function ($row) {
                    $strdate = date('F d, Y', strtotime($row->date_of_incident));
                    return  $strdate;
                })
                ->editColumn('date_reported', function ($row) {
                    $strdate = date('F d, Y', strtotime($row->date_reported));
                    return  $strdate;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }

    public function summary()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1  || Auth::user()->user_type_id == 2) {

                $search = request()->query('search');

                if ($search) {

                    $checkIfHasCaseHearing = DB::table('case_hearings')->where('case_no', $search)->latest()->first();

                    if ($checkIfHasCaseHearing) {
                        $checkIfHasHearing = DB::table('hearings')->where('hearing_id', $checkIfHasCaseHearing->hearing_id)->first();

                        if ($checkIfHasHearing->settlement_id || $checkIfHasHearing->award_id) {

                            $blotter_report = Blotter::where('case_no', $search)->get();
                            $case_hearing = DB::table('case_hearings')->where('case_no', $search)->latest()->first();
                            $hearing = DB::table('hearings')->where('hearing_id', $case_hearing->hearing_id)->first();
                            $hearing_type = DB::table('hearing_types')->where('hearing_type_id', $hearing->hearing_type_id)->first();

                            if ($hearing->settlement_id) {
                                $agreement = DB::table('amicable_settlements')->where('settlement_id', $hearing->settlement_id)->first();
                            } else if ($hearing->award_id) {
                                $agreement = DB::table('arbitration_awards')->where('award_id', $hearing->award_id)->first();
                            }

                            if ($blotter_report->isEmpty()) {
                                return redirect()->back()->with('none', '');
                            } else {
                                $case_involved = DB::table('case_involved')->where('case_no', $search)->get();
                                foreach ($case_involved as $involved) {
                                    $complainant = $involved->complainant_id;
                                    $respondent = $involved->respondent_id;
                                }

                                $complainant = Person::where('person_id', $complainant)->first();
                                $respondent = Person::where('person_id', $respondent)->first();

                                return view('blotter.summary', compact('blotter_report', 'complainant', 'respondent', 'hearing', 'hearing_type', 'agreement'));
                            }
                        } else {
                            return redirect()->back()->with('no_settlement', '');
                        }
                    } else {
                        return redirect()->back()->with('no_hearing', '');
                    }
                } else {
                    $blotter_report = Blotter::where('case_no', $search)->get();
                    return view('blotter.summary', compact('blotter_report'));
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function edit($id, Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {

                $request->validate([
                    'compliance' => 'required|in:0,1',
                    'executionDate' => 'required',
                    'remarks' => 'required|max:255'
                ], [
                    //custom error message here if ever meron
                ]);

                $blotter = Blotter::findOrFail($id);
                $blotter->compliance = $request->compliance;
                $blotter->date_of_execution = $request->executionDate;
                $blotter->remarks = $request->remarks;
                $blotter->save();

                return redirect()->route('blotter.settled')->with('updated', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function settledCases()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {

                return view('blotter.settled-cases');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getSettledCases(Request $request)
    {
        if ($request->ajax()) {
            $case_hearing = CaseHearing::all();
            $data = array();
            $hearings = array();

            foreach ($case_hearing as $ch) {
                $hearings[] = DB::table('hearings')->where('hearing_id', $ch->hearing_id)->first();
            }

            foreach ($case_hearing as $key => $value) {
                if ($hearings[$key]->settlement_id || $hearings[$key]->award_id) {
                    $data[] = Blotter::join('incident_case', 'blotter_report.case_no', '=', 'incident_case.case_no')
                        ->where('blotter_report.case_no', $value->case_no)
                        ->first();
                }
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/blotter/summary?_token=E0rjs8jNI5IVBuKPBrN832WXf78goi0UM7qRI8Iv&search=' . $row->case_no  . ' " class="edit btn btn-primary btn-sm">Details</a> ';
                    return $actionBtn;
                })
                ->editColumn('article_no', function ($article_no) {
                    return 'Article No. ' . $article_no->article_no;
                })
                ->editColumn('compliance', function ($compliance) {
                    if ($compliance->compliance == 0) return '<span class="badge rounded-pill bg-secondary">NON-COMPLIANCE</span>';
                    if ($compliance->compliance == 1) return '<span class="badge rounded-pill bg-dark">COMPLIANCE</span>';
                })
                ->editColumn('date_of_execution', function ($date_of_execution) {
                    if (is_null($date_of_execution->date_of_execution)) {
                        $strdate = '';
                    } else {
                        return date('F d, Y', strtotime($date_of_execution->date_of_execution));
                    }
                    return $strdate;
                })
                ->addColumn('agreement', function ($row) {
                    $case_hearing = CaseHearing::where('case_no', $row->case_no)->latest()->first();
                    if ($case_hearing) {
                        $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->first();
                        if ($hearing->settlement_id) {
                            $amicable_settlement = DB::table('amicable_settlements')->where('settlement_id', $hearing->settlement_id)->first();
                            $agreement = $amicable_settlement->agreement_desc;
                        } elseif ($hearing->award_id) {
                            $arbitration_awards = DB::table('arbitration_awards')->where('award_id', $hearing->award_id)->first();
                            $agreement = $arbitration_awards->award_desc;
                        } else {
                            $agreement = "ERROR: NO RECORD???.";
                        }
                    } else {
                        $agreement = "No agreement yet.";
                    }
                    return $agreement;
                })
                ->addColumn('status', function ($row) {
                    $case_hearing = CaseHearing::where('case_no', $row->case_no)->latest()->first();
                    if ($case_hearing) {
                        $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->first();
                        $hearing_type = DB::table('hearing_types')->where('hearing_type_id', $hearing->hearing_type_id)->first();

                        switch ($hearing_type->type_name) {
                            case "Mediation":
                                $statusBadge = '<span class="badge rounded-pill bg-primary text-uppercase">' . $hearing_type->type_name . '</span>';
                                break;
                            case "Conciliation":
                                $statusBadge = '<span class="badge rounded-pill bg-warning text-uppercase">' . $hearing_type->type_name . '</span>';
                                break;
                            case "Arbitration":
                                $statusBadge = '<span class="badge rounded-pill bg-danger text-uppercase">' . $hearing_type->type_name . '</span>';
                                break;
                            default:
                                $statusBadge = '<span class="badge rounded-pill bg-dark">N/A</span>';
                        }
                    } else {
                        $statusBadge = '<span class="badge rounded-pill bg-dark">N/A</span>';
                    }
                    return $statusBadge;
                })
                ->addColumn('date_agreed', function ($row) {
                    $case_hearing = CaseHearing::where('case_no', $row->case_no)->latest()->first();
                    $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->first();
                    if ($hearing->settlement_id) {
                        $amicable_settlement = Amicable_Settlement::find($hearing->settlement_id)->first();
                        $strdate = date('F d, Y', strtotime($amicable_settlement->date_agreed));
                    } else if ($hearing->award_id) {
                        $arbitration_awards = Arbitration_Award::find($hearing->award_id)->first();
                        $strdate = date('F d, Y', strtotime($arbitration_awards->date_agreed));
                    }
                    return $strdate;
                })
                ->rawColumns(['status', 'agreement', 'date_agreed', 'compliance', 'action'])
                ->make(true);
        }
    }

    public function complaintPDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                $blotter_report = Blotter::where('blotter_report.case_no', '=', $id)->first();
                $incident_case = DB::table('incident_case')->where('case_no', $id)->first();
                $kp_case = DB::table('kp_cases')->where('kp_cases.article_no', $incident_case->article_no)->first();

                $involved = DB::table('case_involved')->where('case_involved.case_no', $id)->first();
                $complainant = Person::where('person_id', $involved->complainant_id)->first();
                $respondent = Person::where('person_id', $involved->respondent_id)->first();

                $pdf = PDF::loadView('blotter.pdf.complaint', compact('blotter_report', 'kp_case', 'complainant', 'respondent'))->setPaper('a4');
                //return view('blotter.pdf.complaint', compact('blotter_report' ,'kp_case' ,'complainant', 'respondent'));
                return $pdf->download("Complaint-Form ($id).pdf");
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function amicablePDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1  || Auth::user()->user_type_id == 2) {
                $blotter_report = Blotter::where('blotter_report.case_no', '=', $id)->first();
                $incident_case = DB::table('incident_case')->where('case_no', $id)->first();
                $kp_case = DB::table('kp_cases')->where('kp_cases.article_no', $incident_case->article_no)->first();

                $involved = DB::table('case_involved')->where('case_involved.case_no', $id)->first();
                $complainant = Person::where('person_id', $involved->complainant_id)->first();
                $respondent = Person::where('person_id', $involved->respondent_id)->first();

                $case_hearing = DB::table('case_hearings')->where('case_no', $id)->latest()->first();
                $hearing = DB::table('hearings')->where('hearing_id', $case_hearing->hearing_id)->first();
                $amicable_settlement = DB::table('amicable_settlements')->where('settlement_id', $hearing->settlement_id)->first();

                $pdf = PDF::loadView('blotter.pdf.amicable-settlement', compact('blotter_report', 'kp_case', 'complainant', 'respondent', 'amicable_settlement'))->setPaper('a4');
                //return view('blotter.pdf.amicable-settlement', compact('blotter_report' ,'kp_case' ,'complainant', 'respondent', 'amicable_settlement'));
                return $pdf->download("Amicable-Settlement-Form ($id).pdf");
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function arbitrationPDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1  || Auth::user()->user_type_id == 2) {
                $blotter_report = Blotter::where('blotter_report.case_no', '=', $id)->first();
                $incident_case = DB::table('incident_case')->where('case_no', $id)->first();
                $kp_case = DB::table('kp_cases')->where('kp_cases.article_no', $incident_case->article_no)->first();

                $involved = DB::table('case_involved')->where('case_involved.case_no', $id)->first();
                $complainant = Person::where('person_id', $involved->complainant_id)->first();
                $respondent = Person::where('person_id', $involved->respondent_id)->first();

                $case_hearing = DB::table('case_hearings')->where('case_no', $id)->latest()->first();
                $hearing = DB::table('hearings')->where('hearing_id', $case_hearing->hearing_id)->first();
                $arbitration_award = DB::table('arbitration_awards')->where('award_id', $hearing->award_id)->first();

                $pdf = PDF::loadView('blotter.pdf.arbitration-award', compact('blotter_report', 'kp_case', 'complainant', 'respondent', 'arbitration_award'))->setPaper('a4');
                //return view('blotter.pdf.arbitration-award', compact('blotter_report' ,'kp_case' ,'complainant', 'respondent', 'arbitration_award'));
                return $pdf->download("Arbitration-Award-Form ($id).pdf");
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function court_actions()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {

                return view('blotter.court-actions');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getCourtActions(Request $request)
    {
        if ($request->ajax()) {
            $data = CourtAction::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="court-actions/pdf/' . $row->case_no  . ' " class="btn btn-danger btn-sm"> <i class="bi bi-download"></i> | Download File Action</a> ';
                    return $actionBtn;
                })
                ->addColumn('case_title', function ($row) {
                    $case_involved = DB::table('case_involved')->where('case_involved.case_no', $row->case_no)->first();
                    $respondent = Person::where('person_id', $case_involved->respondent_id)->first();
                    $complainant = Person::where('person_id', $case_involved->complainant_id)->first();
                    $case_title = $complainant->first_name . " " . $complainant->last_name . " vs " . $respondent->first_name . " " . $respondent->last_name;
                    return  $case_title;
                })
                ->editColumn('date_filed', function ($row) {
                    return date('F d, Y', strtotime($row->date_filed));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function courtActionPDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                $blotter_report = Blotter::where('blotter_report.case_no', '=', $id)->first();
                $incident_case = DB::table('incident_case')->where('case_no', $id)->first();
                $kp_case = DB::table('kp_cases')->where('kp_cases.article_no', $incident_case->article_no)->first();

                $involved = DB::table('case_involved')->where('case_involved.case_no', $id)->first();
                $complainant = Person::where('person_id', $involved->complainant_id)->first();
                $respondent = Person::where('person_id', $involved->respondent_id)->first();

                $court_action = CourtAction::where('case_no', $id)->latest()->first();
                $pdf = PDF::loadView('blotter.pdf.court-action', compact('blotter_report', 'kp_case', 'complainant', 'respondent', 'court_action'))->setPaper('a4');
                //return view('blotter.pdf.court-action', compact('blotter_report' ,'kp_case' ,'complainant', 'respondent', 'court_action'));
                return $pdf->download("Certification to File Action - ($id).pdf");
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function showKPCases()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {

                $kp_cases = DB::table('kp_cases')->paginate(10);

                return view('blotter.kp_case', compact('kp_cases'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function editKP($id, Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                // validation
                $request->validate([
                    'case_name' => 'required|max:2500|regex:"^[^-]{1}?[^\"\']*$"', //regex for alphanumeric and some special characters and spaces only
                ], [
                    // custom error message here if ever meron
                ]);
                DB::table('kp_cases')
                    ->where('article_no', $id)
                    ->update(['case_name' => $request->case_name]);

                return redirect()->back()->with('kp_updated', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function addKP(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                // validation
                $request->validate([
                    'article_no' => 'required|integer',
                    'case_name' => 'required|max:2500|regex:"^[^-]{1}?[^\"\']*$"', //regex for alphanumeric and some special characters and spaces only
                ], [
                    // custom error message here if ever meron
                ]);

                DB::table('kp_cases')->insert([
                    'article_no' => $request->article_no,
                    'case_name' => $request->case_name,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);

                return redirect()->back()->with('kp_added', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
}
