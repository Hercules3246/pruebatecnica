<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'firstname' => 'Admin', 
            'secondname' => 'Admin', 
            'firstlastname' => 'Admin', 
            'secondlastname' => 'Admin', 
            'numeroid' => 1151968044, 
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456'),
            'id_tipodocu' => 1

        ]);
    }
}
