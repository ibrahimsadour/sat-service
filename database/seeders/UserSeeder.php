<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Admin information to databse
        $add_admin = new User;
        $add_admin ->name = "Ibrahim Sadour";
        $add_admin ->email  = "i.m.s.1995@hotmail.com";
        $add_admin ->mobile  = "0685125822";
        $add_admin ->password = Hash::make('ibrahem810907');
        $add_admin->save();
    }
}
