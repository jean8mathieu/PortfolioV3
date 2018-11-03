<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Jean-Mathieu Emond',
            'username' => 'jean8mathieu',
            'email'    => 'jean-mathieu.emond@jmdev.ca',
            'password' => Hash::make('12345'),
        ));
    }
}
