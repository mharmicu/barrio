<?php

namespace App\Http\Livewire;

use App\Models\Blotter;
use App\Models\Notice;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use PDF;

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

                $sched = DB::table('notices')->where('case_no', $id)->first();

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
                $allnotice = DB::table('notices')->where('case_no', $id)->get();
                foreach ($allnotice as $all) {
                    if ($all->notice_type_id == 1) {
                        $hearing = DB::table('notices')->where('notice_type_id', 1)->first();
                        break;
                    } else {
                        $hearing = false;
                    }
                }
                foreach ($allnotice as $all) {
                    if ($all->notice_type_id == 2) {
                        $summon = DB::table('notices')->where('notice_type_id', 2)->first();
                        break;
                    } else {
                        $summon = false;
                    }
                }
                foreach ($allnotice as $all) {
                    if ($all->notice_type_id == 3) {
                        $constitution = DB::table('notices')->where('notice_type_id', 3)->first();
                        break;
                    } else {
                        $constitution = false;
                    }
                }
                //$blotter_report = Blotter::find($id);
                $blotter_report = DB::table('blotter_report')->where('blotter_report.case_no', '=', $id)->first();
                $involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();
                //$blotter_report = DB::table('blotter_report')->join('case_involved', 'case_involved.case_no', '=', 'blotter_report.case_no')->first();

                $complainant = DB::table('person')->where('person_id', $involved->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $involved->respondent_id)->first();

                return view('notice.create', compact('notice', 'hearing', 'summon', 'constitution', 'blotter_report', 'complainant', 'respondent'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function hearing($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {

                $hearing = Notice::where('case_no', '=', $id)->first();
                $hearing->notice_type_id = 1;
                $hearing->date_filed = date("Y-m-d H:i:s");
                $hearing->notified = 0;
                $hearing->save();

                return back()->with('success', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function summon($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {

                $record = Notice::where('case_no', '=', $id)->first();
                $summon = new Notice();
                $summon->date_of_meeting = $record->date_of_meeting;
                $summon->case_no = $record->case_no;
                $summon->notice_type_id = 2;
                $summon->notified = 0;
                $summon->date_filed = date("Y-m-d H:i:s");
                $summon->save();

                return back()->with('success', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function constitution($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {
                $record = Notice::where('case_no', '=', $id)->first();
                $constitution = new Notice();
                $constitution->date_of_meeting = $record->date_of_meeting;
                $constitution->case_no = $record->case_no;
                $constitution->notice_type_id = 3;
                $constitution->notified = 0;
                $constitution->date_filed = date('Y-m-d H:i:s');
                $constitution->save();

                return back()->with('success', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function subpoena($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {

                return back()->with('success', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function notify($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {
                $notice = Notice::find($id);

                $notice->notified_by = Auth::user()->id;
                $notice->notified = 1;
                $notice->date_notified = date('Y-m-d H:i:s');
                $notice->save();

                return back()->with('success', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function hearingPDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {
                $notice = DB::table('notices')->where('notice_id', $id)->first();

                $blotter_report = DB::table('blotter_report')->where('blotter_report.case_no', '=', $notice->case_no)->first();
                $involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();

                $complainant = DB::table('person')->where('person_id', $involved->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $involved->respondent_id)->first();

                $pdf = PDF::loadView('notice.pdf.hearing', compact('notice', 'complainant'));
                //return view('notice.pdf.hearing', compact('notice', 'complainant'));
                return $pdf->download('hearing.pdf');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function summonPDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {
                $notice = DB::table('notices')->where('notice_id', $id)->first();
                $blotter_report = DB::table('blotter_report')->where('blotter_report.case_no', '=', $notice->case_no)->first();
                
                $incident_case = DB::table('incident_case')->where('case_no', $notice->case_no)->first();
                $kp_case = DB::table('kp_cases')->where('kp_cases.article_no', $incident_case->article_no)->first();
                
                $involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();
                $complainant = DB::table('person')->where('person_id', $involved->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $involved->respondent_id)->first();

                $pdf = PDF::loadView('notice.pdf.summon', compact('notice', 'kp_case' ,'complainant', 'respondent'))->setPaper('a4');
                //return view('notice.pdf.summon', compact('notice', 'kp_case' ,'complainant', 'respondent'));
                return $pdf->download('summon.pdf');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
}