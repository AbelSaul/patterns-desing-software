<?php 
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;

	class Book extends Model{

		protected $fillable = ['name','user_id'];
		//public $timestamps = false;
	}

 ?>