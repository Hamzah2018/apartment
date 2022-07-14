<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        // 1
        $user = DB::table('users')->where
        ('email','hamzah@gmail.com')->first();
        if(! $user){
            User::create(
            [
            'name' => 'Hamzah',
            'email' => 'hamzah@gmail.com',
            'password' => Hash::make('123456789'),
            'user_description' =>'this the Admin Account',
            'role' => 'admin'
            ]
            );
            }

        // User::create([
        // 'name' =>'محمد علي' ,
        // 'email' => 'm@gmail.com',
        // 'password' => bcrypt('123456789'),
        // 'user_description'=>'جولة الرويشان والمناطق المجاوره',
        // ]);
        // // 2
        // User::create([
        //     'name' =>'جمال' ,
        //     'email' => 'j@gmail.com',
        //     'password' => bcrypt('123456789'),
        //     'user_description'=>'شارع جمال',
        //     ]);
    }
}
