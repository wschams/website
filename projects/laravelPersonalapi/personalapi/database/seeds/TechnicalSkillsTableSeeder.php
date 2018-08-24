<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicalSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technical_skills')->insert([
            [
                'name'=> 'JavaScript',
                'created_at' => NOW()
            ],
            [
                'name'=> 'Java',
                'created_at' => NOW()
            ],
            [
                'name'=> 'Ajax',
                'created_at' => NOW()
            ],
            [
                'name'=> 'jQuery',
                'created_at' => NOW()
            ],
            [
                'name'=> 'React',
                'created_at' => NOW()
            ],
            [
                'name'=> 'Angular',
                'created_at' => NOW()
            ],
            [
                'name'=> 'MySQL',
                'created_at' => NOW()
            ],
            [
                'name'=> 'HTML',
                'created_at' => NOW()
            ],
            [
                'name'=> 'CSS',
                'created_at' => NOW()
            ],
            [
                'name'=> 'PHP',
                'created_at' => NOW()
            ],
            [
                'name'=> 'OOP',
                'created_at' => NOW()
            ],
            [
                'name'=> 'Bootstrap',
                'created_at' => NOW()
            ],
            [
                'name'=> 'NodeJS',
                'created_at' => NOW()
            ],
            [
                'name'=> 'MongoDB',
                'created_at' => NOW()
            ],
            [
                'name'=> 'ExpressJS',
                'created_at' => NOW()
            ]
        ]);
    }
}
