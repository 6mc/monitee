<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photo;


class photoController extends Controller
{
    //
    public function store(Request $request)
    {


      $request->data->move('images', explode("/", $request->data)[2]);

      //return $request->data;
     //return explode("/", $request->data)[2];
     //  return "tamamdir";

     photo::create([
       'pc' => $request->pc,
       'path' => "images/".explode("/", $request->data)[2]
     ]);

     return "Success";
    }

}
