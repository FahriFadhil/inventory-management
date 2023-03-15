<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new\App\User;
        $user->name = 'Admin';
        $user->email = 'admin@test.com';
        $user->password = \Hash::make('admin');
        $user->authority = 'admin';
        $user->save();
    }
}
