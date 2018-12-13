<?php

use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\User::create([

        	'email' => 'admin@admin.com',
        	'name' => 'faizan',
        	'password' => bcrypt('admin123'),

        ]);
    }
}
