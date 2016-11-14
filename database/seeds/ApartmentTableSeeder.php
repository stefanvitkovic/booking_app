<?php

use Illuminate\Database\Seeder;

class ApartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('apartments')->insert([

                [
                    'name' => 'apartment 1',
                    'price'=> '10',
                ],
                [
                    'name' => 'apartment 2',
                    'price'=> '20',
                ]
         ]);
    }
}
