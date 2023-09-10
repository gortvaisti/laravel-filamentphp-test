<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'product_name' => 'Sport Cipő',
                'quantity' => 5,
                'status_id' => 1,
            ],
            [
                'product_name' => 'Elegáns Cipő',
                'quantity' => 3,
                'status_id' => 2,
            ],
        ]);
    }
}
