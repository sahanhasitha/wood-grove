<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                'name' => 'admin',
                'email' => 'admin@thetap.com',
                'password' => Hash::make('admin123'),
                'is_admin' => '2',
            )
        );

        DB::table('users')->insert($users);
    }
}
