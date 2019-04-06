<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Crypt;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         $faker = Faker::create();

         for ($i=0; $i < 5; $i++) {
             DB::table('users')->insert(array(
                    'name' => $faker->name,
                    'email'  => str_random(4).'@gmail.com',
                    'password' => Crypt::encryptString('secretddfsd'),
                    'api_token' => str_random(3),
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
             ));
        }
   
        
        // factory(App\User::class, 5)->create()->each(function ($u) {
        //     $u->posts()->save(factory(App\Post::class)->make());
        // });
    
    }
}
