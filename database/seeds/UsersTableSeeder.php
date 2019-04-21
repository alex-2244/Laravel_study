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
        $user = App\User::create([
            'name' => 'alex',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('alex1234'),
            'admin' => 1

        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/avatar.jpg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
