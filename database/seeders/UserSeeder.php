<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['full_name' => 'Lương Quyền Xương', 'email' => 'lqx213@gmail.com', 'password' => '123456789', 'phone' => '0848846304', 'sex' => 1, 'is_admin' => true, 'status' => true],
        ]);
    }
}
