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
                ], [
                    //custom error message here if ever meron
                ]);

                $report = Report::findOrFail($id);
                $report->type = $request->type;
                $report->date_of_incident = $request->date_of_incident;
                $report->location = $request->location;
                $report->persons = $request->persons;
                $report->narrative = $request->narrative;
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
                    $actionBtn = '<a href=" " class="btn btn-success">Edit</a>';
                    return $actionBtn;
                })
                ->editColumn('type', function ($row) {
                    $type = '<span class="badge rounded-pills bg-primary">' . $row->type . '</span>';
                    return  $type;
                })
                ->editColumn('date_of_incident', function ($row) {
                    $strdate = date('F d, Y, h:i A', strtotime($row->date_of_incident));
                    return  $strdate;
                })
                ->rawColumns(['action', 'type'])
                ->make(true);
        }
    }


    public function update()
    {
    }
}
