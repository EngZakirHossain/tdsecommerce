<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'role_id' =>1,
            'is_system_admin' =>1,
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'phone' =>'01718297506',
            'password' =>Hash::make(123456789),
            'remember_token' =>Str::random(10),
        ]);
    }
}