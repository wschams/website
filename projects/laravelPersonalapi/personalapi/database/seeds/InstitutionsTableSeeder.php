<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutions')->insert([
            [
                'title'=> 'Software Developer Intern',
                'organization' => 'Bitbean',
                'start_date' => 'May 2018',
                'end_date' => 'Current',
                'location'=> 'Lakewood, NJ',
                'created_at' => NOW()
            ],
            [
                'title'=> 'Software Web and Application Development Course',
                'organization' => 'The School of Evolving Technologies(PCS)',
                'start_date' => 'September 2016',
                'end_date' => 'April 2018',
                'location'=> 'Lakewood, NJ',
                'created_at' => NOW()
            ],
            [
                'title'=> 'Talmudic Law Student',
                'organization' => 'Beth Medrash Govoha',
                'start_date' => '2009',
                'end_date' => '2016',
                'location'=> 'Lakewood, NJ',
                'created_at' => NOW()
            ]
        ]);
    }
}
