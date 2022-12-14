<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Yajra\DataTables\DataTables;

class Reports extends Component
{
    public function render()
    {
        return view('livewire.reports');
    }

    public function create()
    {

        //top 5 incident arlegui
        $top_incident_arlegui = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Arlegui St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_ARL = [];
        $type_count_ARL = [];
        foreach ($top_incident_arlegui as $street) {
            $type_ARL[] = $street->type;
            $type_count_ARL[] = $street->total;
        }

        //top 5 incident castillejos
        $top_incident_castillejos = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Castillejos St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_CAS = [];
        $type_count_CAS = [];
        foreach ($top_incident_castillejos as $street) {
            $type_CAS[] = $street->type;
            $type_count_CAS[] = $street->total;
        }

        //top 5 incident duque
        $top_incident_duque = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Duque St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_DUQ = [];
        $type_count_DUQ = [];
        foreach ($top_incident_duque as $street) {
            $type_DUQ[] = $street->type;
            $type_count_DUQ[] = $street->total;
        }

        //top 5 incident farnecio
        $top_incident_farnecio = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Farnecio St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_FAR = [];
        $type_count_FAR = [];
        foreach ($top_incident_farnecio as $street) {
            $type_FAR[] = $street->type;
            $type_count_FAR[] = $street->total;
        }

        //top 5 incident fraternal
        $top_incident_fraternal = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Fraternal St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_FRA = [];
        $type_count_FRA = [];
        foreach ($top_incident_fraternal as $street) {
            $type_FRA[] = $street->type;
            $type_count_FRA[] = $street->total;
        }

        //top 5 incident casal
        $top_incident_casal = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Pascual Casal St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_PCASAL = [];
        $type_count_PCASAL = [];
        foreach ($top_incident_casal as $street) {
            $type_PCASAL[] = $street->type;
            $type_count_PCASAL[] = $street->total;
        }

        //top 5 incident pax
        $top_incident_pax = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Pax St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_PAX = [];
        $type_count_PAX = [];
        foreach ($top_incident_pax as $street) {
            $type_PAX[] = $street->type;
            $type_count_PAX[] = $street->total;
        }

        //top 5 incident vergara
        $top_incident_pax = Report::select('type', DB::raw('count(*) as total'))->where('street', 'Vergara St.')->groupBy('type')->take(5)->orderBy('total', 'desc')->get();
        $type_VER = [];
        $type_count_VER = [];
        foreach ($top_incident_pax as $street) {
            $type_VER[] = $street->type;
            $type_count_VER[] = $street->total;
        }

        $total_incident_street = Report::select('street', DB::raw('count(*) as total'))->groupBy('street')->orderBy('street', 'asc')->get();
        //dd($total_incident_street);

        return view('user.report', [
            'type_ARL' => $type_ARL,
            'type_count_ARL' => $type_count_ARL,

            'type_CAS' => $type_CAS,
            'type_count_CAS' => $type_count_CAS,

            'type_DUQ' => $type_DUQ,
            'type_count_DUQ' => $type_count_DUQ,

            'type_FAR' => $type_FAR,
            'type_count_FAR' => $type_count_FAR,

            'type_FRA' => $type_FRA,
            'type_count_FRA' => $type_count_FRA,

            'type_PCASAL' => $type_PCASAL,
            'type_count_PCASAL' => $type_count_PCASAL,

            'type_PAX' => $type_PAX,
            'type_count_PAX' => $type_count_PAX,

            'type_VER' => $type_VER,
            'type_count_VER' => $type_count_VER,

            'total_incident_street' => $total_incident_street,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([

            'date_of_incident' => 'required',
            'location' => 'required',
            'persons' => 'required',
            'narrative' => 'required',

        ], []);

        $report = new Report();
        $report->type = $request->type;
        $report->date_of_incident = $request->date_of_incident;
        $report->street = $request->street;
        $report->location = $request->location;
        $report->persons = $request->persons;
        $report->narrative = $request->narrative;
        $report->created_at = date("Y-m-d");

        $report->save();
        return back()->with('success', '');
    }

    public function show()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                //$data = Reports::get();
                //$data = DB::select('SELECT * FROM reports');
                //dd($data);
                return view('user.show');
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
                /**
                $request->validate([
                    'date_of_incident' => 'required',
                    'location' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
                    'persons' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
                    'narrative' => 'required',

                    'remarks' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
                ], [
                    //custom error message here if ever meron
                ]);
                 */

                $report = Report::find($id);


                //$report->type = $request->type;
                //$report->date_of_incident = $request->date_of_incident;
                //$report->location = $request->location;
                //$report->persons = $request->persons;
                //$report->narrative = $request->narrative;
                $report->remarks = $request->remarks;
                $report->status = $request->status;
                $report->save();

                return redirect()->back()->with('updated', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }


    public function getIncidentReports(Request $request)
    {
        if ($request->ajax()) {
            //$data = Reports::latest()->get();
            $data = Report::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $link = '<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#editModal' . $row->id . '"><i class="bi bi-pen"></i> Edit</a>';
                    $modal = '<!-- Modal -->
                    <form method="post" action="' . route('report.update', $row->id) . '" enctype="multipart/form-data">
                    
                    <input type="hidden" name="_token" value="' . csrf_token() . '" />

                    <div class="modal fade" id="editModal' . $row->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Incident #' . $row->id . '</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">

                                    <div class="mb-3" id="textboxDiv">
                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea  class="form-control shadow-none  @error("remarks") is-invalid @enderror" value="' . old('persons') . '" name="remarks" id="remarks" required placeholder="Describe yourself here..."> ' . old("persons") . '</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select shadow-none  @error("status") is-invalid @enderror" name="status" id="status" required>
                                                <option value="PENDING">PENDING</option>
                                                <option value="ON-GOING">ON-GOING</option>
                                                <option value="COMPLETED">COMPLETED</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>';
                    return $link . $modal;
                })
                ->editColumn('type', function ($row) {
                    $type = '<span class="badge rounded-pills bg-primary">' . $row->type . '</span>';
                    return  $type;
                })
                ->editColumn('date_of_incident', function ($row) {
                    $strdate = date('F d, Y, h:i A', strtotime($row->date_of_incident));
                    return  $strdate;
                })
                ->editColumn('status', function ($row) {
                    $status = '<span class="badge rounded-pills bg-warning">' . $row->status . '</span>';
                    return  $status;
                })
                ->rawColumns(['action', 'type', 'status'])
                ->make(true);
        }
    }

    public function feedbacks_show()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {

                return view('admin.feedbacks');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getFeedbacks(Request $request)
    {
        if ($request->ajax()) {
            $feedbacks = DB::table('contact_forms')->get();

            return Datatables::of($feedbacks)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
