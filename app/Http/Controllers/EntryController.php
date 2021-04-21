<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entry;
use App\Command;
use App\employee;

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
}
