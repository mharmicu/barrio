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

        return view('user.report');
    }

    public function store(Request $request)
    {

        $request->validate([

            'date_of_incident' => 'required',
            'location' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'persons' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'narrative' => 'required',

        ], []);

        $report = new Report();
        $report->type = $request->type;
        $report->date_of_incident = $request->date_of_incident;
        $report->location = $request->location;
        $report->persons = $request->persons;
        $report->narrative = $request->narrative;

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

                $request->validate([
                    'date_of_incident' => 'required',
                    'location' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
                    'persons' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
                    'narrative' => 'required',

                    'remarks' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
                ], [
                    //custom error message here if ever meron
                ]);

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
            $data = DB::select('SELECT * FROM reports');
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $link = '<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#editModal' . $row->id . '">Edit</a>';
                    $modal = '<!-- Modal -->
                    <div class="modal fade" id="editModal' . $row->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Incident #'.$row->id.'</h5>
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
                                        <option value="PENDING">ON-GOING</option>
                                        <option value="PENDING">COMPLETED</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="report/edit/'.$row->id.'" type="button" class="btn btn-primary">Edit</a>
                          </div>
                        </div>
                      </div>
                    </div>';
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


    public function update()
    {
    }
}
