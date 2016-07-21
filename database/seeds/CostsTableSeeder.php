<?php

use Illuminate\Database\Seeder;

class CostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('costs')->insert([
		    [
		        'user_id' => '1',
		        'company_name' => 'BMC',
		        'month'=>'1',
		        'value'=>'10,500'
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'A-TECH',
		        'month'=>'1',
		        'value'=>'1,500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'BMC',
		        'month'=>'2',
		        'value'=>'500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'BMC',
		        'month'=>'3',
		        'value'=>'10,500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'BMC',
		        'month'=>'7',
		        'value'=>'10',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'BMC',
		        'month'=>'10',
		        'value'=>'500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'BMC',
		        'month'=>'11',
		        'value'=>'12,200',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'A-TECH',
		        'month'=>'4',
		        'value'=>'10,500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'A-TECH',
		        'month'=>'2',
		        'value'=>'9,500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'A-TECH',
		        'month'=>'6',
		        'value'=>'600',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'A-TECH',
		        'month'=>'8',
		        'value'=>'500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => 'A-TECH',
		        'month'=>'10',
		        'value'=>'14,500',
		    ],
		    [
		        'user_id' => '1',
		        'company_name' => '기타',
		        'month'=>'1',
		        'value'=>'200',
		    ],
		    		    [
		        'user_id' => '1',
		        'company_name' => '기타',
		        'month'=>'2',
		        'value'=>'150',
		    ],
		    		    [
		        'user_id' => '1',
		        'company_name' => '기타',
		        'month'=>'3',
		        'value'=>'321',
		    ],

		]);
    }
}
