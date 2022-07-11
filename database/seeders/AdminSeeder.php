<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname'=>'System Admin',
            'username'=>'Admin',
            'email'=>'admin@gmail.com',
            'id_number'=>'11111111',
            'county'=>'vihiga',
            'phone'=>'0712135643',
            'password'=>Hash::make('password'),
            'subcounty'=>'vihiga',
            'location'=>'muhudu',
            'district'=>'shaviringa',
            'village' =>'jivuye',
            'is_admin'=>true

        ]);

        User::create([
            'fullname'=>'Alvine Llavu',
            'username'=>'Alvine',
            'email'=>'alvinellavu@gmail.com',
            'county'=>'vihiga',
            'phone'=>'677466534',
            'id_number' =>'22222222',
            'password'=>Hash::make('user'),
            'subcounty'=>'vihiga',
            'location'=>'muhudu',
            'district'=>'shaviringa',
            'village' =>'jivuye',
            'is_admin'=>false

        ]);
    }
}
