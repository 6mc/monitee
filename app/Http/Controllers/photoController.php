<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photo;
use App\employee;
use App\entry;
use App\User;
use App\Command;
use Carbon\Carbon;
use Zipper;
use Illuminate\Support\Facades\Storage;

class photoController extends Controller
{
    //
    public function store(Request $request)
    {


      $request->data->move('images', explode("/", $request->data)[2]);

      //return $request->data;
     //return explode("/", $request->data)[2];
     //  return "tamamdir";
	$shift_start = Storage::disk('public')->get('shift_start');
  	$shift_end = Storage::disk('public')->get('shift_end');
  	$days = Storage::disk('public')->get('days');

      if (date('H') >= $shift_start && date('H')< $shift_end && date('N') <= $days ) {
     photo::create([
       'pc' => $request->pc,
       'path' => "images/".explode("/", $request->data)[2]
     ]);
      }

     return "Success";
    }

    public function detail($id)
    {

  $messages = Command::whereDate('created_at', '=', Carbon::today()->toDateString())->where('command','like', '%trayballoon%')->where('pc', employee::findorFail($id)->pc)->get();

   // return employee::findorFail($id)->pc;
   $liveinterval = Storage::disk('public')->get('liveinterval');
   $screenshots =  photo::whereDate('created_at', '=', Carbon::today()->toDateString())->where('pc', employee::findorFail($id)->pc)->get();
   
   $employees = employee::all();
  $entries =  entry::whereDate('created_at', '=', Carbon::today()->toDateString())->where('computer', employee::findorFail($id)->pc)->get()->reverse();


   return view('detailv2', compact('screenshots','liveinterval','employees','entries','id','messages'));


    }


    public function redirecthistory(Request $request)
    {

      echo $request->date;

    }


        public function history($id, $date)
    {

$employees = employee::all();

$screenshots =  photo::where('pc', employee::findorFail($id)->pc)->whereDate('created_at', '=', $date)->get();
  
  $Path = public_path($date .'.zip');
  Zipper::make($Path)->extractTo('history');

$entries =  entry::where('computer', employee::findorFail($id)->pc)->whereDate('created_at', '=', $date)->get();
// $date->setTimestamp($timestamp);

return view('historyv3', compact('screenshots','employees','entries'));


    }


    public function live($id)
    {
      return photo::where('pc', employee::findorFail($id)->pc)->orderBy('id', 'desc')->first();
    }


 public function stream()
    {
    $prey = User::find(1)->watching;

        if($prey)
        return employee::find($prey)->pc;
        else
        return "NULL";
  

    }


}
