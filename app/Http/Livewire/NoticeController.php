<?php

namespace App\Http\Livewire;

use App\Models\Blotter;
use App\Models\Notice;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class NoticeController extends Component
{
    public function render()
    {
        return view('livewire.notice-controller');
    }

    public function show()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {

                return view('notice.show');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getNoticeList(Request $request)
    {
        if ($request->ajax()) {
            $data = Blotter::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $notice = DB::table('notices')->where('case_no', $row->case_no)->first();
                    if ($notice) {
                        $actionBtn = '<a href="create/' . $row->case_no   . '" class="edit btn btn-primary" >Create Notice Form(s)</a>';
                    } else {
                        $actionBtn = '<a href="schedule/' . $row->case_no . '" class="edit btn btn-secondary" >Set Meeting Schedule</a>';
                    }
                    return $actionBtn;
                })
                ->addColumn('date_of_hearing', function ($row) {
                    $notice = DB::table('notices')->where('case_no', $row->case_no)->first();
                    if ($notice) {
                        $date = '<span class="badge rounded-pills bg-primary">' . date('F d, Y, h:iA', strtotime($notice->date_of_meeting)) . '</span>';
                    } else {
                        $date = '<span class="badge rounded-pills bg-dark">N/A</span>';
                    }

                    return $date;
                })
                ->editColumn('processed_by', function ($row) {
                    $processor = DB::table('users')->where('id', $row->processed_by)->first();
                    return  $processor->name;
                })
                ->editColumn('date_reported', function ($row) {
                    $strdate = date('F d, Y', strtotime($row->date_reported));
                    return  $strdate;
                })
                ->rawColumns(['action', 'date_of_hearing'])
                ->make(true);
        }
    }

    public function schedule($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {

                $blotter_report = Blotter::find($id);
                $case_involved = DB::table('case_involved')->where('case_no', $id)->first();

                $complainant = DB::table('person')->where('person_id', $case_involved->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $case_involved->respondent_id)->first();
                $present_sched = DB::table('notices')->join('blotter_report', 'blotter_report.case_no', '=', 'notices.case_no')->get();


                return view('notice.schedule', compact('blotter_report', 'complainant', 'respondent', 'present_sched'));
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
                    'hearing_date' => 'required',
                    'hearing_time' => 'required',
                ], [
                    //custom error message here if ever meron
                ]);

                $notice = new Notice();
                $notice->case_no = $id;
                $notice->date_of_meeting = $request->hearing_date . ' ' . $request->hearing_time;
                $notice->save();

                return back()->with('success', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function create($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {

                $notice = DB::table('notices')->where('case_no', $id)->first();
                //$blotter_report = Blotter::find($id);
                $blotter_report = DB::table('blotter_report')->join('case_involved', 'case_involved.case_no', '=', 'blotter_report.case_no')->first();

                $complainant = DB::table('person')->where('person_id', $blotter_report->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $blotter_report->respondent_id)->first();

                return view('notice.create', compact('notice', 'blotter_report', 'complainant', 'respondent'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
}
