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
     	$user = new User;
     	$user->name = 'Admin';
     	$user->email = 'admin_balittra@gmail.com';
     	$user->username = 'admin';
     	$user->password = bcrypt('4444');
     	$user->save();   
    }
}
