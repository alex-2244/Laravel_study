<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Laravel Blog',
            'address' => 'Madiwala, Bangalore',
            'contact_number' => '9500330961',
            'contact_email' => 'agalexnaveen@gmail.com'
        ]);
    }
}
