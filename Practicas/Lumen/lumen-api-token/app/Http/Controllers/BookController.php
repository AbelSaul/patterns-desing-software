<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function list(Request $request){
        $user=$request->user();

        if ($user->name=="Luis") {
            $array=[
                ['name'=>"Learning LUMEN",'author'=>"Chinin"],
                ['name'=>"Experto SOA","author"=>"Saul"],
            ];
        }else{
            $array=[
            ['name'=>"Learning LUMEN",'author'=>"Chinin"],
            ['name'=>"Experto SOA","author"=>"Saul"],

        ];
        }

        return response()->json($array);


    }

}