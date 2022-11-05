<?php

namespace App\Http\Livewire;

use App\Models\Amicable_Settlement;
use App\Models\Arbitration_Agreement;
use App\Models\Arbitration_Award;
use App\Models\Blotter;
use App\Models\CaseHearing;
use App\Models\CourtAction;
use App\Models\Hearing;
use App\Models\Notice;
use App\Models\Person;
use App\Models\Person_Signature;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;


class SettlementController extends Component
{
    public function render()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }

        return view('livewire.settlement-controller');
    }

    public function show_mediation()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                return view('settlement.show-mediation');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function show_conciliation()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                return view('settlement.show-conciliation');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function show_arbitration()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                return view('settlement.show-arbitration');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function proceed_to_conciliation($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $hearingNotice = Notice::where('case_no', $id)->where('notice_type_id', 1)->where('notified', 1)->first();
                $hearingRecord = new Hearing();
                $hearingRecord->date_of_meeting = $hearingNotice->date_of_meeting;
                $hearingRecord->date_filed = date("Y-m-d H:i:s");

                $hearingRecord->hearing_type_id = 2;
                $hearingRecord->save();

                #case hearing
                $case_hearing = new CaseHearing();
                $case_hearing->case_no = $hearingNotice->case_no;
                $case_hearing->hearing_id = $hearingRecord->hearing_id;
                $case_hearing->save();

                return redirect('settlement/show-mediation')->with('proceeded', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function proceed_to_arbitration($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $hearingNotice = Notice::where('case_no', $id)->where('notice_type_id', 1)->where('notified', 1)->first();
                $hearingRecord = new Hearing();
                $hearingRecord->date_of_meeting = $hearingNotice->date_of_meeting;
                $hearingRecord->date_filed = date("Y-m-d H:i:s");

                $hearingRecord->hearing_type_id = 3;
                $hearingRecord->save();

                #case hearing
                $case_hearing = new CaseHearing();
                $case_hearing->case_no = $hearingNotice->case_no;
                $case_hearing->hearing_id = $hearingRecord->hearing_id;
                $case_hearing->save();

                return redirect('settlement/show-arbitration')->with('proceeded', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getMediation(Request $request)
    {
        if ($request->ajax()) {
            $mediation_hearing = array();
            $blotter_report = array();
            $case_hearing = array();
            $all_case_hearing = DB::select('SELECT * FROM case_hearings WHERE id IN (SELECT MAX(id) FROM case_hearings GROUP BY case_no)');

            foreach ($all_case_hearing as $ch) {
                $mediation_hearing[] = Hearing::where('hearing_id', $ch->hearing_id)->where('hearing_type_id', 1)->whereNull('settlement_id')->first();
            }
            foreach ($mediation_hearing as $mediation) {
                if ($mediation) {
                    $case_hearing[] = CaseHearing::where('hearing_id', $mediation->hearing_id)->first();
                }
            }
            foreach ($case_hearing as $c) {
                $court_action = CourtAction::where('case_no', $c->case_no)->first();
                if (!$court_action) {
                    $blotter_report[] = Blotter::where('case_no', $c->case_no)->first();
                }
            }

            return Datatables::of($blotter_report)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="d-grid gap-2"><a href="mediation/' . $row->case_no   . '" class="btn btn-primary btn-sm">Go to Hearing</a><a href="../notice/create/' . $row->case_no   . '" class="btn btn-secondary btn-sm">Add Witness</a><a href="file-court-action/' . $row->case_no   . '" class="btn btn-outline-danger btn-sm">File Court Action</a></div>';
                    return $actionBtn;
                })
                ->addColumn('complainant', function ($row) {
                    $case_involved = DB::table('case_involved')->where('case_no', $row->case_no)->first();
                    $complainant = Person::where('person_id', $case_involved->complainant_id)->first();

                    $comp = '<span class="badge rounded-pill bg-primary">' . $complainant->first_name . ' ' . $complainant->middle_name . ' ' . $complainant->last_name . '</span>';
                    return $comp;
                })
                ->addColumn('respondent', function ($row) {
                    $case_involved = DB::table('case_involved')->where('case_no', $row->case_no)->first();
                    $respondent = Person::where('person_id', $case_involved->respondent_id)->first();

                    $resp = '<span class="badge rounded-pill bg-primary">' . $respondent->first_name . ' ' . $respondent->middle_name . ' ' . $respondent->last_name . '</span>';
                    return $resp;
                })
                ->addColumn('witness', function ($row) {
                    $witnesses = DB::table('witnesses')->where('case_no', $row->case_no)->get();
                    $persons = array();
                    $names = '';
                    foreach ($witnesses as $key => $value) {
                        $persons[] = Person::where('person_id', $value->witness_id)->first();
                        $names = $names . ' ' . '<span class="badge rounded-pill bg-secondary">' . $persons[$key]->first_name . ' ' . $persons[$key]->middle_name . ' ' . $persons[$key]->last_name . '</span>';
                    }
                    return $names;
                })
                ->addColumn('date_of_meeting', function ($row) {
                    $case_hearing = DB::table('case_hearings')->where('case_no', $row->case_no)->first();
                    $hearing = DB::table('hearings')->where('hearing_id', $case_hearing->hearing_id)->first();

                    $date_of_meeting = '<span class="badge rounded-pill bg-danger">' . date('F d, Y @ h:i A', strtotime($hearing->date_of_meeting)) . '</span>';
                    return $date_of_meeting;
                })
                ->rawColumns(['action', 'complainant', 'respondent', 'witness', 'date_of_meeting'])
                ->make(true);
        }
    }

    public function getConciliation(Request $request)
    {
        if ($request->ajax()) {
            $conciliation_hearing = array();
            $blotter_report = array();
            $case_hearing = array();
            $all_case_hearing = DB::select('SELECT * FROM case_hearings WHERE id IN (SELECT MAX(id) FROM case_hearings GROUP BY case_no)');

            foreach ($all_case_hearing as $ch) {
                $conciliation_hearing[] = Hearing::where('hearing_id', $ch->hearing_id)->where('hearing_type_id', 2)->whereNull('settlement_id')->first();
            }
            foreach ($conciliation_hearing as $conciliation) {
                if ($conciliation) {
                    $case_hearing[] = CaseHearing::where('hearing_id', $conciliation->hearing_id)->first();
                }
            }
            foreach ($case_hearing as $c) {
                $court_action = CourtAction::where('case_no', $c->case_no)->first();
                if (!$court_action) {
                    $blotter_report[] = Blotter::where('case_no', $c->case_no)->first();
                }
            }
            return Datatables::of($blotter_report)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //check whether it has PANGKAT CONSTITUTION NOTICE
                    $notice = DB::table('notices')->where('case_no', $row->case_no)->where('notice_type_id', 4)->where('notified', 1)->first();
                    if ($notice) {
                        $requirementButton = '<a href="conciliation/' . $row->case_no   . '" class="btn btn-primary btn-sm">Go to Hearing</a>';
                    } else {
                        $requirementButton = '<a href="../notice/create/' . $row->case_no   . '" class="btn btn-info btn-sm">Create Notice</a>';
                    }
                    $actionBtn = '<div class="d-grid gap-2">' . $requirementButton  . '<a href="../notice/create/' . $row->case_no   . '" class="btn btn-secondary btn-sm">Add Witness</a><a href="file-court-action/' . $row->case_no   . '" class="btn btn-outline-danger btn-sm">File Court Action</a></div>';
                    return $actionBtn;
                })
                ->addColumn('complainant', function ($row) {
                    $case_involved = DB::table('case_involved')->where('case_no', $row->case_no)->first();
                    $complainant = Person::where('person_id', $case_involved->complainant_id)->first();

                    $comp = '<span class="badge rounded-pill bg-primary">' . $complainant->first_name . ' ' . $complainant->middle_name . ' ' . $complainant->last_name . '</span>';
                    return $comp;
                })
                ->addColumn('respondent', function ($row) {
                    $case_involved = DB::table('case_involved')->where('case_no', $row->case_no)->first();
                    $respondent = Person::where('person_id', $case_involved->respondent_id)->first();

                    $resp = '<span class="badge rounded-pill bg-primary">' . $respondent->first_name . ' ' . $respondent->middle_name . ' ' . $respondent->last_name . '</span>';
                    return $resp;
                })
                ->addColumn('witness', function ($row) {
                    $witnesses = DB::table('witnesses')->where('case_no', $row->case_no)->get();
                    $persons = array();
                    $names = '';
                    foreach ($witnesses as $key => $value) {
                        $persons[] = Person::where('person_id', $value->witness_id)->first();
                        $names = $names . ' ' . '<span class="badge rounded-pill bg-secondary">' . $persons[$key]->first_name . ' ' . $persons[$key]->middle_name . ' ' . $persons[$key]->last_name . '</span>';
                    }
                    return $names;
                })
                ->addColumn('date_of_meeting', function ($row) {
                    $case_hearing = DB::table('case_hearings')->where('case_no', $row->case_no)->first();
                    $hearing = DB::table('hearings')->where('hearing_id', $case_hearing->hearing_id)->first();

                    $date_of_meeting = '<span class="badge rounded-pill bg-danger">' . date('F d, Y @ h:i A', strtotime($hearing->date_of_meeting)) . '</span>';
                    return $date_of_meeting;
                })
                ->addColumn('conciliation_requirement', function ($row) {
                    //check whether it has PANGKAT CONSTITUTION NOTICE
                    $notice = DB::table('notices')->where('case_no', $row->case_no)->where('notice_type_id', 4)->where('notified', 1)->first();
                    if ($notice) {
                        $requirement = '<p class="badge rounded-pill bg-primary">-</p>';
                    } else {
                        $requirement = '<p class="text-danger fw-bold">Needs Pangkat Constitution Notice</p>';
                    }
                    return $requirement;
                })
                ->rawColumns(['action', 'complainant', 'respondent', 'witness', 'date_of_meeting', 'conciliation_requirement'])
                ->make(true);
        }
    }

    public function getArbitration(Request $request)
    {
        if ($request->ajax()) {
            $arbitration_hearing = Hearing::where('hearing_type_id', 3)->whereNull('award_id')->get();
            $blotter_report = array();
            foreach ($arbitration_hearing as $arbitration) {
                $case_hearing = CaseHearing::where('hearing_id', $arbitration->hearing_id)->first();

                $court_action = CourtAction::where('case_no', $case_hearing->case_no)->first();
                if (!$court_action) {
                    $blotter_report[] = Blotter::where('case_no', $case_hearing->case_no)->first();
                }
            }

            return Datatables::of($blotter_report)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $case_hearing = DB::table('case_hearings')->where('case_no', $row->case_no)->latest()->first();
                    //check whether it has ARBITRATION AGREEMENT
                    $arbitration_agreements = DB::table('arbitration_agreements')->where('hearing_id', $case_hearing->hearing_id)->first();
                    if ($arbitration_agreements) {
                        $requirementButton = '<a href="arbitration-award/' . $row->case_no   . '" class="btn btn-primary btn-sm">Go to Hearing</a>';
                    } else {
                        $requirementButton = '<a href="arbitration-agreement/' . $row->case_no   . '" class="btn btn-warning btn-sm">Create Arbitration Requirement</a>';
                    }
                    $actionBtn = '<div class="d-grid gap-2">' . $requirementButton  . '<a href="../notice/create/' . $row->case_no   . '" class="btn btn-secondary btn-sm">Add Witness</a><a href="file-court-action/' . $row->case_no   . '" class="btn btn-outline-danger btn-sm">File Court Action</a></div>';
                    return $actionBtn;
                })
                ->addColumn('complainant', function ($row) {
                    $case_involved = DB::table('case_involved')->where('case_no', $row->case_no)->first();
                    $complainant = Person::where('person_id', $case_involved->complainant_id)->first();

                    $comp = '<span class="badge rounded-pill bg-primary">' . $complainant->first_name . ' ' . $complainant->middle_name . ' ' . $complainant->last_name . '</span>';
                    return $comp;
                })
                ->addColumn('respondent', function ($row) {
                    $case_involved = DB::table('case_involved')->where('case_no', $row->case_no)->first();
                    $respondent = Person::where('person_id', $case_involved->respondent_id)->first();

                    $resp = '<span class="badge rounded-pill bg-primary">' . $respondent->first_name . ' ' . $respondent->middle_name . ' ' . $respondent->last_name . '</span>';
                    return $resp;
                })
                ->addColumn('witness', function ($row) {
                    $witnesses = DB::table('witnesses')->where('case_no', $row->case_no)->get();
                    $persons = array();
                    $names = '';
                    foreach ($witnesses as $key => $value) {
                        $persons[] = Person::where('person_id', $value->witness_id)->first();
                        $names = $names . ' ' . '<span class="badge rounded-pill bg-secondary">' . $persons[$key]->first_name . ' ' . $persons[$key]->middle_name . ' ' . $persons[$key]->last_name . '</span>';
                    }
                    return $names;
                })
                ->addColumn('date_of_meeting', function ($row) {
                    $case_hearing = DB::table('case_hearings')->where('case_no', $row->case_no)->first();
                    $hearing = DB::table('hearings')->where('hearing_id', $case_hearing->hearing_id)->first();

                    $date_of_meeting = '<span class="badge rounded-pill bg-danger">' . date('F d, Y @ h:i A', strtotime($hearing->date_of_meeting)) . '</span>';
                    return $date_of_meeting;
                })
                ->addColumn('arbitration_requirement', function ($row) {
                    $case_hearing = DB::table('case_hearings')->where('case_no', $row->case_no)->latest()->first();
                    //check whether it has ARBITRATION AGREEMENT
                    $arbitration_agreements = DB::table('arbitration_agreements')->where('hearing_id', $case_hearing->hearing_id)->first();
                    if ($arbitration_agreements) {
                        $requirement = '<p class="badge rounded-pill bg-primary">-</p>';
                    } else {
                        $requirement = '<p class="text-danger fw-bold">Needs Arbitration Agreement</p>';
                    }
                    return $requirement;
                })
                ->rawColumns(['action', 'complainant', 'respondent', 'witness', 'date_of_meeting', 'arbitration_requirement'])
                ->make(true);
        }
    }

    public function mediation($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $blotter_report = Blotter::find($id);
                $case_involved = DB::table('case_involved')->where('case_no', $id)->first();
                $complainant = Person::where('person_id', $case_involved->complainant_id)->first();
                $respondent = Person::where('person_id', $case_involved->respondent_id)->first();
                $witnesses = DB::table('witnesses')->where('case_no', $id)->get();

                $persons = array();
                foreach ($witnesses as $witness) {
                    $persons[] = Person::where('person_id', $witness->witness_id)->first();
                }

                return view('settlement.mediation', compact('blotter_report', 'complainant', 'respondent', 'persons'));
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function store_mediation($id, Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $request->validate([
                    'agreement_desc' => 'required|max:2500|regex:"^[^-]{1}?[^\"\']*$"', //regex for alphanumeric and some special characters and spaces only
                    //'complainant_sign' => ['nullable', 'mimes:jpg,bmp,jpeg,png', 'max:15000'],
                    'respondent_sign' => ['required', 'mimes:jpg,bmp,jpeg,png', 'max:15000']
                    // niremove ko validation sa image hahaha pag nilagyan ko ayaw masaveeeeeee
                ], [
                    // custom error message here if ever meron
                ]);
                $blotter_report = Blotter::find($id);
                $case_hearing = CaseHearing::where('case_no', $id)->latest()->first();
                $case_involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();
                //$respondent = DB::table('person')->where('person_id', $case_involved->respondent_id)->first();

                $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->where('hearing_type_id', 1)->first();

                //making amicable settlement record
                $amicable_settlement_record = new Amicable_Settlement();
                $amicable_settlement_record->date_agreed = date("Y-m-d H:i:s");
                $amicable_settlement_record->agreement_desc = $request->agreement_desc;
                $amicable_settlement_record->save();

                //updating hearings table
                $hearing->settlement_id = $amicable_settlement_record->settlement_id;
                $hearing->save();

                //saving image - respondent signature lang
                $image = $request->file('respondent_sign');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                $person_signature = new Person_Signature();
                $person_signature->file_address = $imageName;
                $person_signature->person_id = $case_involved->respondent_id;
                $person_signature->save();

                return redirect('settlement/show-mediation')->with('success', '');
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function conciliation($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $blotter_report = Blotter::find($id);
                $case_involved = DB::table('case_involved')->where('case_no', $id)->first();
                $complainant = Person::where('person_id', $case_involved->complainant_id)->first();
                $respondent = Person::where('person_id', $case_involved->respondent_id)->first();
                $witnesses = DB::table('witnesses')->where('case_no', $id)->get();

                $persons = array();
                foreach ($witnesses as $witness) {
                    $persons[] = Person::where('person_id', $witness->witness_id)->first();
                }

                return view('settlement.conciliation', compact('blotter_report', 'complainant', 'respondent', 'persons'));
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function store_conciliation($id, Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $request->validate([
                    'agreement_desc' => 'required|max:2500|regex:"^[^-]{1}?[^\"\']*$"', //regex for alphanumeric and some special characters and spaces only
                    //'complainant_sign' => ['nullable', 'mimes:jpg,bmp,jpeg,png', 'max:15000'],
                    'respondent_sign' => ['required', 'mimes:jpg,bmp,jpeg,png', 'max:15000']
                    // niremove ko validation sa image hahaha pag nilagyan ko ayaw masaveeeeeee
                ], [
                    // custom error message here if ever meron
                ]);
                $blotter_report = Blotter::find($id);
                $case_hearing = CaseHearing::where('case_no', $id)->latest()->first();
                $case_involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();
                //$respondent = DB::table('person')->where('person_id', $case_involved->respondent_id)->first();

                $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->where('hearing_type_id', 2)->first();

                //making amicable settlement record
                $amicable_settlement_record = new Amicable_Settlement();
                $amicable_settlement_record->date_agreed = date("Y-m-d H:i:s");
                $amicable_settlement_record->agreement_desc = $request->agreement_desc;
                $amicable_settlement_record->save();

                //updating hearings table
                $hearing->settlement_id = $amicable_settlement_record->settlement_id;
                $hearing->save();

                //saving image - respondent signature lang
                $image = $request->file('respondent_sign');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                $person_signature = new Person_Signature();
                $person_signature->file_address = $imageName;
                $person_signature->person_id = $case_involved->respondent_id;
                $person_signature->save();

                return redirect('settlement/show-conciliation')->with('success', '');
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function arbitration_agreement($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $blotter_report = Blotter::find($id);
                $case_involved = DB::table('case_involved')->where('case_no', $id)->first();
                $complainant = Person::where('person_id', $case_involved->complainant_id)->first();
                $respondent = Person::where('person_id', $case_involved->respondent_id)->first();
                $witnesses = DB::table('witnesses')->where('case_no', $id)->get();

                $persons = array();
                foreach ($witnesses as $witness) {
                    $persons[] = Person::where('person_id', $witness->witness_id)->first();
                }

                return view('settlement.arbitration_agreement', compact('blotter_report', 'complainant', 'respondent', 'persons'));
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function store_arbitration_agreement($id, Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $request->validate([
                    //'complainant_sign' => ['nullable', 'mimes:jpg,bmp,jpeg,png', 'max:15000'],
                    //'complainant_sign_check' => ['required'],
                    'respondent_sign' => ['required', 'mimes:jpg,bmp,jpeg,png', 'max:15000'],
                    //'lupon_sign' => ['required', 'mimes:jpg,bmp,jpeg,png', 'max:15000']
                ], [
                    // custom error message here if ever meron
                ]);

                $blotter_report = Blotter::find($id);
                $case_hearing = CaseHearing::where('case_no', $id)->latest()->first();
                $case_involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();
                //$respondent = DB::table('person')->where('person_id', $case_involved->respondent_id)->first();

                $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->where('hearing_type_id', 3)->first();

                //making arbitration_agreements record
                $arbitration_agreements = new Arbitration_Agreement();
                $arbitration_agreements->hearing_id = $hearing->hearing_id;
                $arbitration_agreements->date_made = date("Y-m-d H:i:s");
                $arbitration_agreements->save();

                //saving image - respondent signature lang
                $image = $request->file('respondent_sign');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                $person_signature = new Person_Signature();
                $person_signature->file_address = $imageName;
                $person_signature->person_id = $case_involved->respondent_id;
                $person_signature->save();

                return redirect('settlement/show-arbitration')->with('agreement_arb', '');
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function arbitration_award($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $blotter_report = Blotter::find($id);
                $case_involved = DB::table('case_involved')->where('case_no', $id)->first();
                $complainant = Person::where('person_id', $case_involved->complainant_id)->first();
                $respondent = Person::where('person_id', $case_involved->respondent_id)->first();
                $witnesses = DB::table('witnesses')->where('case_no', $id)->get();

                $persons = array();
                foreach ($witnesses as $witness) {
                    $persons[] = Person::where('person_id', $witness->witness_id)->first();
                }

                return view('settlement.arbitration_award', compact('blotter_report', 'complainant', 'respondent', 'persons'));
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function store_arbitration_award($id, Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $request->validate([
                    'agreement_desc' => 'required|max:2500|regex:"^[^-]{1}?[^\"\']*$"', //regex for alphanumeric and some special characters and spaces only
                    'complainant_sign' => ['nullable', 'mimes:jpg,bmp,jpeg,png', 'max:15000'],
                    'respondent_sign' => ['nullable', 'mimes:jpg,bmp,jpeg,png', 'max:15000'],
                ], [
                    // custom error message here if ever meron
                ]);

                $blotter_report = Blotter::find($id);
                $case_hearing = CaseHearing::where('case_no', $id)->latest()->first();
                $case_involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();
                //$respondent = DB::table('person')->where('person_id', $case_involved->respondent_id)->first();

                $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->where('hearing_type_id', 3)->first();

                //making amicable settlement record
                $arbitration_award_record = new Arbitration_Award();
                $arbitration_award_record->date_agreed = date("Y-m-d H:i:s");
                $arbitration_award_record->award_desc = $request->agreement_desc;
                $arbitration_award_record->made_by = Auth::user()->id;
                $arbitration_award_record->save();

                //updating hearings table
                $hearing->award_id = $arbitration_award_record->award_id;
                $hearing->save();

                return redirect('settlement/show-arbitration')->with('award_success', '');
            } else {

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function fileCourtAction($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {
                $blotter_report = Blotter::find($id);
                $case_involved = DB::table('case_involved')->where('case_involved.case_no', $id)->first();
                $respondent = Person::where('person_id', $case_involved->respondent_id)->first();
                $complainant = Person::where('person_id', $case_involved->complainant_id)->first();
                $case_hearing = CaseHearing::where('case_no', $id)->latest()->first();
                $hearing = Hearing::where('hearing_id', $case_hearing->hearing_id)->first();
                $hearing_type = DB::table('hearing_types')->where('hearing_type_id', $hearing->hearing_type_id)->first();

                return view('settlement.file-court-action', compact('blotter_report', 'respondent', 'complainant', 'hearing_type', 'hearing'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function courtActionStore($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {

                $court_action = new CourtAction();
                $court_action->date_filed = date("Y-m-d H:i:s");
                $court_action->case_no = $id;
                $court_action->save();

                return redirect('../home')->with('filed_court_action', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
}
