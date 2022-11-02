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
use Illuminate\Support\Facades\Hash;

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
            $users = User::orderBy('id', 'asc')->get();

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == 0) {
                        $actionBtn = '<span class="text-secondary"> Account disabled</span>';
                        return $actionBtn;
                    } else {
                        $actionBtn = '<div class="d-grid gap-2"><a href="manage/disable/' . $row->id . '" class="btn btn-danger btn-sm disable_btn">Disable</a></div>';
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

    public function show_register()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {

                return view('account.register-acc');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function new_acc(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {

                // validation
                $request->validate([
                    'lastname' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'firstname' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'middlename' => 'required|max:255|regex:/^[\pL\s\-]+$/u', //regex for letters, hyphens and spaces only
                    'email' => 'required|max:255|email|unique:users|regex:/(.+)@(.+)\.(.+)/i',
                    'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                    'confirm_password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                ], [
                    // custom error message here if ever meron
                    'password.regex' => 'The password is weak. Must contain uppercase, lowercase, special character, number and must be 8 characters.',
                ]);

                $new_acc = new User();
                $new_acc->name = $request->firstname . " " . $request->middlename . " " . $request->lastname;
                $new_acc->email = $request->email;
                $new_acc->password =  Hash::make($request->password); 
                $new_acc->registered_by = Auth::user()->id;
                $new_acc->user_type_id = $request->user_type;
                $new_acc->position_id = $request->personnel_position;
                $new_acc->status = 1;
                $new_acc->save();

                return redirect('account/manage')->with('new_acc', '');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function activityLogs_show()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == 1 || 2) {

                return view('activity_log.show');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function getActivityLogs(Request $request)
    {
        if ($request->ajax()) {
            $logs = DB::table('activity_log')->get();

            return Datatables::of($logs)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    $strdate = date('F d, Y, h:i A', strtotime($row->created_at));
                    return $strdate;
                })
                ->editColumn('causer_id', function ($row) {
                    $done_by = User::find($row->causer_id);
                    return $done_by->name;
                })
                ->editColumn('properties', function ($row) {
                    $json_dec = json_decode($row->properties);
                    $json_enc = json_encode($json_dec, JSON_PRETTY_PRINT);

                    $modal = '<!-- Modal -->
                    <div class="modal fade" id="propertiesModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Properties changed</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <pre><code>' . $json_enc . '</code></pre>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>';

                    $link = '<a href="" data-bs-toggle="modal" data-bs-target="#propertiesModal'.$row->id.'">Open properties</a>';

                    return $link . $modal;
                })
                ->editColumn('log_name', function ($row) {
                    $log_name = '<span class="badge rounded-pill bg-warning text-dark">'.$row->log_name.'</span>';
                    return $log_name;
                })

                ->rawColumns(['properties', 'log_name'])
                ->make(true);
        }
    }
}
