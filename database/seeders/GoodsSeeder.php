<?php

namespace Database\Seeders;

use Doctrine\DBAL\Types\BigIntType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')->insert([
            'name' => \Str::random(10),
            'description' => 'About',
            'category_id' => 1
        ]);
    }
}
