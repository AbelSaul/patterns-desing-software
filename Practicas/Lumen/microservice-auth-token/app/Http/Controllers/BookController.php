<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB; //Descomentando $app->withFacades();

use App\Book;
use App\User;


class BookController extends Controller
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

    public function list(Request $request){

        //conectar a bd,traer la lista de acuerdo al usuario
        // $user = $request->user();
        // if ($user->name==='Abel Saul') {
        //     $array = [
        //         ['name' => "Learning LUMEN", 'author' => 'Chinin'],
        //         ['name' => 'Expert SOA', 'author' => 'Saul']
        //     ];
        // }else{
        //     $array = [
        //         ['name' => "Learning Laravel", 'author' => 'Chinin'],
        //         ['name' => 'Expert Paypal', 'author' => 'Saul']
        //     ];
        // }

        $books = Book::all();

        return response()->json($books);
    }


    public function index(Request $request)
    {
        //http://localhost:8000/api/book?api_token=0001
        // Method GET
        $user = $request->user();       
        $users_books = DB::table('books as b')
        ->join('users as u','u.id','b.user_id')
        ->select('u.name as user_name','b.name')
        ->where('user_id',$user->id)
        ->get();
        
        //Esto retorna un object(Illuminate\Support\Collection)
        return response()->json($users_books);
    }

    public function show($id,Request $request)
    {
        // http://localhost:8000/api/book/1?api_token=0001
        //Method GET
        $user_book = DB::table('books as b')
        ->join('users as u','u.id','b.user_id')
        ->select('u.name as user_name','b.name')
        ->where('b.id',$id)
        ->where('u.api_token',$request->input('api_token'))
        ->get();
        

        if ($user_book->isEmpty()) {
            return response()->json($user_book);
        }else{
            $message = 'Book not found';
            return response()->json($message);
        }
     
        
      

    }

    public function create(Request $request)
    {
        //localhost:8000/api/book?name=Sangre de Campeon&api_token=0002
        //Method POST
        $user = $request->user();
        $book = Book::create([
            'name' => $request['name'],
            'user_id' => $user->id
        ]);
        return response()->json($book, 201);
    }

    public function update($id, Request $request)
    {
        //http://localhost:8000/api/book/4?api_token=0002&name=Colmillo Azulito
        //Method PUT  
        //Esto retornar -> object(App\Book)
        $message = '';
     
        $book = Book::findOrFail($id);
    
        
        if (!empty($book)) {//
            //Devuelve FALSE si var existe y tiene un valor no vacío, distinto de cero. De otro modo devuelve TRUE
            $user = $request->user();
            if ($book->user_id === $user->id) {
                $book->update(['name' => $request['name']]);    
                return response()->json($book, 200);
            }else{
                $message = 'He is not the author of the book';
                return response()->json($message);    
            } 
        }else{
            $message = 'Book not exist';
            return response()->json($message);
        }

        
    }

    public function delete($id,Request $request)
    {

        //http://localhost:8000/api/book/1?api_token=0001&name=Azul Marino
        //Method DELETE
        $book = Book::findOrFail($id);

        if (!empty($book)) {//
            $user = $request->user();
            if ($book->user_id === $user->id) {
                $book->delete();
                return response('Deleted Successfully', 200);
            }else{
                $message = 'He is not the author of the book';
                return response()->json($message);    
            } 
        }else{
            $message = 'Book not exist';
            return response()->json($message);
        }
       
    }

    
}
