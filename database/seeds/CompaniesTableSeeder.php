<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('companies')->insert([
		        'id' => '1',
		        'name' => 'fantaplan',
		        'email' => 'webmaster@fantaplan.com',
		        'street' => '-',
		        'city' => 'Seoul',
                'status' => '1',
                'store_hours' => '{"Sunday":{"status":"closed","open":null,"close":null},"Monday":{"status":"open","open":"09:00am","close":"06:00pm"},"Tuesday":{"status":"open","open":"09:00am","close":"06:00pm"},"Wednesday":{"status":"open","open":"09:00am","close":"06:00pm"},"Thursday":{"status":"open","open":"09:00am","close":"06:00pm"},"Friday":{"status":"open","open":"09:00am","close":"06:00pm"},"Saturday":{"status":"closed","open":null,"close":null}}'
		]);
    }
}
