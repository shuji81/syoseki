<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class McategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category_name' => 'ビジネス書'
        ];
        DB::table('mcategory')->insert($param);

        $param = [
            'category_name' => '漫画'
        ];
        DB::table('mcategory')->insert($param);

        $param = [
            'category_name' => '小説'
        ];
        DB::table('mcategory')->insert($param);

        $param = [
            'category_name' => '技術書'
        ];
        DB::table('mcategory')->insert($param);

        $param = [
            'category_name' => '資格取得本'
        ];
        DB::table('mcategory')->insert($param);

        $param = [
            'category_name' => 'その他'
        ];
        DB::table('mcategory')->insert($param);
    }
}

