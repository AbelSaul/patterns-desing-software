<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Person;
use App\Debt;


class PersonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function get($dni){
        $person = new Person();
        $result = $person::where('dni',$dni)->first();
        // $person = Person::all();
        return response()->json($result);
    }

    public function debts($dni){
        $person = Person::where('dni',$dni)->first();
        $debt = Debt::where('person_id',$person->id)->first();
        return response()->json($debt);
    }   
    public function requests($dni){
        $person = new Person();
        $result = $person::where('dni',$dni)->first();
        //Preguntar si status == 2 esta requisitoriado.
        if ($result->status == 2) {
            $requested = 'true';
        }else{
            $requested = 'false';
        }

        return response($requested);
    }
}
