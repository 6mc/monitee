<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entry;

class EntryController extends Controller
{
    //
    public function store(Request $request)
    {
      //  return view('board');

      if (strpos($request->getContent(), '.') !== false) {
        //  echo 'true';


$result =       entry::create(
    ['process' => $request->getContent(),
    'computer' =>  $request->header('user') ]
  );
  return $result;
    }
    else {
      return "0";
    }
  }

    public function show()
    {
      //  return view('board');
  return entry::all();
    }
}
