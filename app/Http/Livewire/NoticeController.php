<?php

namespace App\Http\Livewire;

use App\Models\Blotter;
use App\Models\CaseHearing;
use App\Models\Hearing;
use App\Models\HearingNotices;
use App\Models\Notice;
use App\Models\Person;
use App\Models\Witness;
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
                        $actionBtn = '<a href="create/' . $row->case_no   . '" class="edit btn btn-primary" ><i class="bi bi-envelope"></i> Create Notice Form(s)</a>';
                    } else {
                        $actionBtn = '<a href="schedule/' . $row->case_no . '" class="edit btn btn-secondary"><i class="bi bi-calendar2-date"></i> Set Meeting Schedule</a>';
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
                $distinct_notice = DB::table('notices')->select('case_no')->distinct()->get();
                $present_sched = Notice::join('blotter_report', 'blotter_report.case_no', '=', 'notices.case_no')->get()->unique('case_no');
                //dd($distinct_notice);

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

                return redirect('../notice/show')->with('success', '');
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
                $witnesses = DB::table('witnesses')->where('case_no', $id)->get();

                $persons = array();
                foreach ($witnesses as $witness) {
                    $persons[] = DB::table('person')->where('person_id', $witness->witness_id)->first();
                }

                foreach ($allnotice as $all) {
                    if ($all->notice_type_id == 1) {
                        $hearing = DB::table('notices')->where('case_no', $id)->where('notice_type_id', 1)->first();
                        break;
                    } else {
                        $hearing = false;
                    }
                }
                foreach ($allnotice as $all) {
                    if ($all->notice_type_id == 2) {
                        $summon = DB::table('notices')->where('case_no', $id)->where('notice_type_id', 2)->first();
                        break;
                    } else {
                        $summon = false;
                    }
                }
                foreach ($allnotice as $all) {
                    if ($all->notice_type_id == 4) {
                        $constitution = DB::table('notices')->where('case_no', $id)->where('notice_type_id', 4)->first();
                        break;
                    } else {
                        $constitution = false;
                    }
                }
                foreach ($allnotice as $all) {
                    if ($all->notice_type_id == 3) {
                        $subpoena = DB::table('notices')->where('case_no', $id)->where('notice_type_id', 3)->first();
                        break;
                    } else {
                        $subpoena = false;
                    }
                }
                //$blotter_report = Blotter::find($id);
                $blotter_report = DB::table('blotter_report')->where('blotter_report.case_no', '=', $id)->first();
                $involved = DB::table('case_involved')->where('case_involved.case_no', '=', $blotter_report->case_no)->first();
                //$blotter_report = DB::table('blotter_report')->join('case_involved', 'case_involved.case_no', '=', 'blotter_report.case_no')->first();

                $complainant = DB::table('person')->where('person_id', $involved->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $involved->respondent_id)->first();

                return view('notice.create', compact('notice', 'hearing', 'summon', 'constitution', 'subpoena', 'blotter_report', 'complainant', 'respondent', 'persons'));
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
                $constitution->notice_type_id = 4;
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

                if ($notice->notice_type_id != 4) {
                    $notice->notified_by = Auth::user()->id;
                    $notice->notified = 1;
                    $notice->date_notified = date('Y-m-d H:i:s');
                    $notice->save();
                }

                #in order to have hearing record, must both have hearing notice and summon notice and both notified
                $hearingNotice = Notice::where('case_no', $notice->case_no)->where('notice_type_id', 1)->where('notified', 1)->first();
                $summonNotice = Notice::where('case_no', $notice->case_no)->where('notice_type_id', 2)->where('notified', 1)->first();

                #check if case hearing exists 
                $chk_case_hearing = DB::table('case_hearings')->where('case_no', $notice->case_no)->first();

                if ($hearingNotice && $summonNotice && !$chk_case_hearing) {
                    $hearingRecord = new Hearing();
                    $hearingRecord->date_of_meeting = $notice->date_of_meeting;
                    $hearingRecord->date_filed = date("Y-m-d H:i:s");

                    $hearingRecord->hearing_type_id = 1;
                    $hearingRecord->save();

                    #case hearing
                    $case_hearing = new CaseHearing();
                    $case_hearing->case_no = $notice->case_no;
                    $case_hearing->hearing_id = $hearingRecord->hearing_id;
                    $case_hearing->save();

                    #hearing notices
                    $hearing_notices = new HearingNotices();
                    $hearing_notices->notice_id = $hearingNotice->notice_id;
                    $hearing_notices->hearing_id = $hearingRecord->hearing_id;
                    $hearing_notices->save();

                    #summon notices
                    $hearing_notices2 = new HearingNotices();
                    $hearing_notices2->notice_id = $summonNotice->notice_id;
                    $hearing_notices2->hearing_id = $hearingRecord->hearing_id;
                    $hearing_notices2->save();
                }

                if ($notice->notice_type_id == 4) {
                    $chk_case_hearing_get = DB::table('case_hearings')->where('case_no', $notice->case_no)->get();
                    #check if that hearing is conciliation
                    $chck_hearing_type_con = array();
                    foreach ($chk_case_hearing_get as $chk) {
                        $chck_hearing_type_con[] = DB::table('hearings')->where('hearing_id', $chk->hearing_id)->where('hearing_type_id', 2)->first();
                    }

                    if ($chck_hearing_type_con) {
                        $notice->notified_by = Auth::user()->id;
                        $notice->notified = 1;
                        $notice->date_notified = date('Y-m-d H:i:s');
                        $notice->save();

                        #save the pangkat constitution notice to hearing notices table
                        $pangkatNotice = Notice::where('case_no', $notice->case_no)->where('notice_type_id', 4)->where('notified', 1)->first();

                        if ($pangkatNotice) {
                            //$case_hearing = DB::table('case_hearings')->where('case_no', $notice->case_no)->latest()->first();
                            //$hearingRecord2 = DB::table('hearings')->where('hearing_id', $case_hearing->hearing_id)->first();
                            #pangkat notices
                            $hearing_notices = new HearingNotices();
                            $hearing_notices->notice_id = $pangkatNotice->notice_id;
                            $hearing_notices->hearing_id = $chck_hearing_type_con[1]->hearing_id;
                            $hearing_notices->save();
                        }
                    } else {
                        return back()->with('fail_to_notify', '');
                    }
                }

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
                return $pdf->download("Hearing Notice ($notice->case_no).pdf");
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

                $pdf = PDF::loadView('notice.pdf.summon', compact('notice', 'kp_case', 'complainant', 'respondent'))->setPaper('a4');
                //return view('notice.pdf.summon', compact('notice', 'kp_case' ,'complainant', 'respondent'));
                return $pdf->download("Summon Notice ($notice->case_no).pdf");
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function pangkatPDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1) {
                $notice = DB::table('notices')->where('notice_id', $id)->first();

                $involved = DB::table('case_involved')->where('case_involved.case_no', '=', $notice->case_no)->first();
                $complainant = DB::table('person')->where('person_id', $involved->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $involved->respondent_id)->first();

                $pdf = PDF::loadView('notice.pdf.pangkat', compact('notice', 'complainant', 'respondent'))->setPaper('a4');
                //return view('notice.pdf.pangkat', compact('notice','complainant', 'respondent'));
                return $pdf->download("Pangkat Constitution ($notice->case_no).pdf");
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function summary()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {

                $blotter_report = Blotter::paginate('4');

                $case_involved = array();
                $complainant = array();
                $notices = array();
                foreach ($blotter_report as $key => $value) {
                    $case_involved[] = DB::table('case_involved')->where('case_involved.case_no', '=', $value->case_no)->first();
                    $complainant[] = DB::table('person')->where('person_id', $case_involved[$key]->complainant_id)->first();
                    $respondent[] = DB::table('person')->where('person_id', $case_involved[$key]->respondent_id)->first();
                    $notices[] = DB::table('notices')->where('case_no', $value->case_no)->get();
                }

                //dd($notices[0][2]);

                return view('notice.summary', compact('blotter_report', 'notices', 'complainant', 'respondent'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function addWitness($id, Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {

                $field_values_array = $request->lastName;
                $field_values_array2 = $request->firstName;
                $field_values_array3 = $request->middleName;

                foreach ($field_values_array as $key => $value) {
                    $person = new Person();
                    $person->first_name = $field_values_array2[$key];
                    $person->middle_name = $field_values_array3[$key];
                    $person->last_name = $field_values_array[$key];
                    $person->save();

                    $witness = new Witness();
                    $witness->case_no = $id;
                    $witness->witness_id = $person->person_id;
                    $witness->save();
                }

                $record = Notice::where('case_no', '=', $id)->first();
                $subpoena = new Notice();
                $subpoena->date_of_meeting = $record->date_of_meeting;
                $subpoena->case_no = $record->case_no;
                $subpoena->notice_type_id = 3;
                $subpoena->notified = 0;
                $subpoena->date_filed = date('Y-m-d H:i:s');
                $subpoena->save();

                return back()->with('added', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    public function removeWitness($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                $person = Person::find($id);
                $person->delete();

                return back()->with('deleted', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function subpoenaPDF($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                $notice = DB::table('notices')->where('notice_id', $id)->first();
                $blotter_report = DB::table('blotter_report')->where('blotter_report.case_no', $notice->case_no)->first();

                $witnesses = DB::table('witnesses')->where('case_no', $notice->case_no)->get();
                $persons = array();
                foreach ($witnesses as $witness) {
                    $persons[] = DB::table('person')->where('person_id', $witness->witness_id)->first();
                }

                $incident_case = DB::table('incident_case')->where('case_no', $notice->case_no)->first();
                $kp_case = DB::table('kp_cases')->where('kp_cases.article_no', $incident_case->article_no)->first();

                $involved = DB::table('case_involved')->where('case_involved.case_no', $notice->case_no)->first();
                $complainant = DB::table('person')->where('person_id', $involved->complainant_id)->first();
                $respondent = DB::table('person')->where('person_id', $involved->respondent_id)->first();

                $pdf = PDF::loadView('notice.pdf.subpoena', compact('notice', 'kp_case', 'complainant', 'respondent', 'persons'))->setPaper('a4');
                //return view('notice.pdf.subpoena', compact('notice', 'kp_case' ,'complainant', 'respondent', 'persons'));
                return $pdf->download("Subpoena Notice ($notice->case_no).pdf");
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
}
