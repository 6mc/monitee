<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entry;
use App\Command;
use App\employee;
use Carbon\Carbon;

class EntryController extends Controller
{
    //
    public function store(Request $request)
    {
      //  return view('board');

      // if (strpos($request->getContent(), '.') !== false) {
        //  echo 'true';
//$str = $request->getContent();
//$var = array_pop(explode("/", $str));

$result =       entry::create(
    ['process' =>  @end(explode('/', $request->getContent())) ,
    'computer' =>  $request->header('user') ]
  );
  return $result;
    // }
    // else {
    //   return "0";
    // }
  }

      public function signup(Request $request)
    {

$result =       employee::create(
    ['name' => $request->header('name') ,
    'pc' =>  $request->header('user') ]
  );
  return $result;

  }



    public function show()
    {
      //  return view('board');
  return entry::all();
    }



    public function getCommand($id)
    {

    if (is_numeric($id)) {
      
    $cmd =   Command::where('pc', employee::find($id)->pc)->where('isExecuted', 0)->first();
    }
    else
    {
    $cmd =  Command::where('pc', $id)->where('isExecuted', 0)->first();
    }

    if($cmd)
    {
    $cmd->isExecuted = 1;
    $cmd->save();
    return    $cmd->command;
    }
    else
    {
      return "echo null";
    }      

    
    
    }



     public function addCommand(Request $request)
    {


      $result =       Command::create(
    ['isExecuted' =>  0 ,
    'command' =>  $request->command,
    'pc'=> $request->pc ]
     ); 

      return redirect()->back();
    }

         public function sendMessage(Request $request)
    {


      $result =       Command::create(
    ['isExecuted' =>  0 ,
    'command' => 'nircmd trayballoon "Mesaj" "'. $request->command .'" "shell32.dll,22" 15000', 
    // $request->command,
    'pc'=> $request->pc ]
     ); 

      return redirect()->back();
    }

     public function filter(Request $request)
    {

    $date = Carbon::createFromFormat('Y-m-d', $request->end_date);
    $date = $date->addDays(1);
      
     return entry::whereBetween('created_at',[$request->start_date, $date])->where('computer', $request->pc)->get();
    }


}
