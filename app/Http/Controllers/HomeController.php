<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entry;
use App\employee;
use DateTime;
use App\photo;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $date2 = new DateTime;
      $date2->modify('-1 minutes'); 
      $fmdate = $date2->format('Y-m-d H:i:s');
      $screenshots = photo::where('created_at','>', $fmdate)->get();

      $date = new DateTime;
      $date->modify('-3 minutes');
      $formatted_date = $date->format('Y-m-d H:i:s');
      $employees = employee::all();
      $entries =   entry::where('created_at','>', $formatted_date)->get();
       return view('boardv2', compact('entries', 'employees','screenshots'));
    }

      public function config()
    {
   $interval =  Storage::disk('public')->get('interval');
  $liveinterval = Storage::disk('public')->get('liveinterval');
  $shift_start = Storage::disk('public')->get('shift_start');
  $shift_end = Storage::disk('public')->get('shift_end');
  $days = Storage::disk('public')->get('days');
   $employees = employee::all();
 return view('configv2', compact('interval', 'liveinterval','employees','shift_start','shift_end', 'days'));
    }

    public function editconfig(Request $request)
    {
     Storage::disk('public')->put('interval', $request->interval);
     Storage::disk('public')->put('liveinterval', $request->liveinterval);
     Storage::disk('public')->put('shift_start', $request->shift_start);
     Storage::disk('public')->put('shift_end', $request->shift_end);
     Storage::disk('public')->put('days', $request->days);
    $i = 0;
     foreach ($request->employeepc as $employee) {
       employee::where('pc', $employee)->update(['name' => $request->employeename[$i]]);
      $i++;
     }


     return redirect('/config');
    // return $request;
    }
}
