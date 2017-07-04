<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*
        User::create([
        	'email' =>  'test@mail.com',
        	'name'  =>'jhon',
        	'password' => \Hash::make('secret')
        ]);*/

        /*
        factory(User::class, 5)->create()->each(function ($user) {
        	factory(Roles::class)->create([
        		'user_id' => $user->id
        	]);
        });*/

        factory(User::class, 5)->create();
    }
}
