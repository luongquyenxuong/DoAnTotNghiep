<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            [
                'id_user'=>3,
                'id_address'=>5,
                'total_amount'=>110000,
                'ship'=>20000,
                'total'=>130000,
                'date'=>Carbon::create('2022', '1', '1'),
            ],
        ]);
    }
}
