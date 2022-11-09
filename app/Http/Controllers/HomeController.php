<?php

namespace App\Http\Controllers;

use App\Models\Blotter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == '1' || Auth::user()->user_type_id == 2) {
                $data = Blotter::select('case_no', 'created_at')->orderBy('created_at')->get()->groupBy(function($data){
                    return Carbon::parse($data->created_at)->format('M');
                });

                $months=[];
                $monthCount=[];
                foreach($data as $month => $values){
                    $months[]=$month;
                    $monthCount[]=count($values);
                }
                return view('admin.home', ['data'=>$data, 'months'=>$months, 'monthCount'=>$monthCount]);
            } else {
                return view('user.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        return view('user.home');
    }
}
