<?php

namespace App\Http\Livewire;

use App\Models\Blotter;
use App\Models\CaseHearing;
use App\Models\Hearing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Yajra\DataTables\DataTables;

class AccountController extends Component
{
    public function render()
    {
        return view('livewire.account-controller');
    }

    public function show_users()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {

                return view('account.manage-acc');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = DB::table('users')->orderBy('id', 'asc')->get();

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == 0) {
                        $actionBtn = '<span class="text-secondary"> Account disabled</span>';
                        return $actionBtn;
                    } else {
                        $actionBtn = '<div class="d-grid gap-2"><a href="manage/disable/'.$row->id.'" class="btn btn-danger btn-sm disable_btn">Disable</a></div>';
                        $confirmationBox = "
                        <script>
                            $('.disable_btn').on('click', function(e) {
                                e.preventDefault();
                                var self = $(this);
                                console.log(self.data('title'));
                                Swal.fire({
                                    title: 'Are you sure?',
                                    icon: 'warning',
                                    showDenyButton: true,
                                    confirmButtonText: 'Yes, disable it!',
                                    denyButtonText: `No, cancel!`,
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        location.href = self.attr('href');
                                    } else if (result.isDenied) {
                                        Swal.fire('Changes are not saved', '', 'error')
                                    }
                                })
                            })
                        </script>";
                        return $actionBtn . $confirmationBox;
                    }
                    
                })
                ->editColumn('user_type_id', function ($row) {
                    $user_type = DB::table('user_type')->where('id', $row->user_type_id)->first();
                    return '<span class="badge rounded-pill bg-success">' . $user_type->user_type_name . '</span>';
                })
                ->editColumn('position_id', function ($row) {
                    $position = DB::table('personnel_position')->where('id', $row->position_id)->first();
                    return '<span class="badge rounded-pill bg-success">' . $position->position_name . '</span>';
                })
                ->editColumn('created_at', function ($row) {
                    $strdate = date('F d, Y', strtotime($row->created_at));
                    return $strdate;
                })
                ->editColumn('registered_by', function ($row) {
                    $registered_by = DB::table('users')->where('id', $row->registered_by)->first();
                    if ($registered_by) {
                        return $registered_by->name;
                    } else {
                        return "N/A";
                    }
                })

                ->rawColumns(['action', 'user_type_id', 'position_id'])
                ->make(true);
        }
    }

    public function disable($id)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {

                $user = User::find($id);
                //dd($user);
                $user->status = 0;
                $user->save();

                return back()->with('success', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
}
