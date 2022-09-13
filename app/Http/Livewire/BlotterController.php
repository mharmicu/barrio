<?php

namespace App\Http\Livewire;

use App\Models\Blotter;
use App\Models\Case_Involved;
use App\Models\Incident_Case;
use App\Models\Person;
use App\Models\Person_Signature;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use DataTables;

class BlotterController extends Component
{
    public function render()
    {
        return view('livewire.blotter-controller');
    }

    public function create()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {
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
            if (Auth::user()->user_type_id == 1) {
                // validation
                $request->validate([
                    'salutation' => 'required',
                    'lastname' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'firstname' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'middlename' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'case' => 'required',
                    'complaint_desc' => 'required',
                    'relief_desc' => 'required',
                    'salutation_res' => 'required',
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
                $blotter->date_of_execution = date("Y-m-d H:i:s");
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



                return back()->with('success', '');
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
            if (Auth::user()->user_type_id == 1) {

                return view('blotter.show');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getBlotterReports(Request $request)
    {
        if ($request->ajax()) {
            $data = Blotter::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })

                ->addColumn('status', function ($row) {
                    $statusBadge = '<span class="badge rounded-pill bg-dark">N/A</span>';
                    return $statusBadge;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }

    public function summary()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {

                $search = request()->query('search');
                if ($search) {
                    $blotter_report = DB::table('blotter_report')->where('case_no', $search)->get();

                    if ($blotter_report->isEmpty()) {
                        return redirect()->back()->with('none', '');
                    } else {
                        $case_involved = DB::table('case_involved')->where('case_no', $search)->get();
                        foreach ($case_involved as $involved) {
                            $complainant = $involved->complainant_id;
                            $respondent = $involved->respondent_id;
                        }

                        $complainant = DB::table('person')->where('person_id', $complainant)->first();
                        $respondent = DB::table('person')->where('person_id', $respondent)->first();

                        return view('blotter.summary', compact('blotter_report', 'complainant', 'respondent'));
                    }
                } else {
                    $blotter_report = DB::table('blotter_report')->where('case_no', $search)->get();
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
            if (Auth::user()->user_type_id == 1) {

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

                return redirect()->back()->with('updated', '');
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
            if (Auth::user()->user_type_id == 1) {

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
            //$incident_case = DB::table('incident_case')->select('*')->get();
            //$incident_case = Incident_Case::latest()->get();
            //$blotter = Blotter::latest()->get();
            $data = DB::table('blotter_report')
                ->join('incident_case', 'blotter_report.case_no', '=', 'incident_case.case_no')
                ->get();


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
                ->addColumn('status', '<span class="badge rounded-pill bg-dark">N/A</span>')
                ->rawColumns(['status', 'compliance', 'action'])
                ->make(true);
        }
    }
}
