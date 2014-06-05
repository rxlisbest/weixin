<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'zelig',
            'username' => 'zelig',
            'email'    => 'qiyu2580@gmail.com',
            'password' => Hash::make('123456'),
        ));
    }
}
