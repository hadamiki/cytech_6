<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sales")->insert([
            [
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
                'product_id'=>'伊藤園',
              

            ],
            [
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
                'company_name'=>'サントリー',
                'street_address'=>'東京都',
                'representative_name'=>'いいい',
                
            ],
            [
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
                'company_name'=>'コカ・コーラ',
                'street_address'=>'アメリカ',
                'representative_name'=>'ううう',
                
            ],
        ]);
    }
}
