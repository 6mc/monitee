<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entry;
use App\employee;
use DateTime;
use App\photo;

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
       return view('board', compact('entries', 'employees','screenshots'));
    }
}
