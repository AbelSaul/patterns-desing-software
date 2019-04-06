<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

	public function __construct()
    {
    
        $this->middleware('auth');
    }
    
    public function list($id)
    {
        //http://localhost:8000/users/list/1?api_token=123
    	$users = new User();
        $result = $users::where('id',$id)->first();
        // $person = Person::all();
        return response()->json($result);  
    }


}