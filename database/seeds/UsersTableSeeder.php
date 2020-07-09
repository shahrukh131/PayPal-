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
        $user = User::where('email','admin@gmail.com')->first();

        if(!$user)
        {
            User::Create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role'=>'admin',
            'password' => bcrypt('admin123')
        ]);

        }


    }
}
