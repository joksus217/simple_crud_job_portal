<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'john_doe',
            'email' => 'john_doe@gmail.com',
            'password' => Hash::make('secret'),
            'Fullname' => 'John Doe',
            'type' => 1
        ]);

        DB::table('users')->insert([
            'username' => 'jane_doe',
            'email' => 'jane_doe@gmail.com',
            'password' => Hash::make('secret'),
            'Fullname' => 'Jane Doe',
            'type' => 1
        ]);

        DB::table('users')->insert([
            'username' => 'ben_brode',
            'email' => 'ben_brode@gmail.com',
            'password' => Hash::make('secret'),
            'Fullname' => 'Ben Brode',
            'type' => 2
        ]);

        DB::table('users')->insert([
            'username' => 'cory_barlog',
            'email' => 'cory_barlog@gmail.com',
            'password' => Hash::make('secret'),
            'Fullname' => 'Cory Barlog',
            'type' => 2
        ]);

        DB::table('freelancers')->insert([
            'user_id' => 1,
            'position' => 'Backend Progammer',
            'experience' => 7,
            'rank' => 1,
            'summary' => 'Lorem Ipsum Dolor sit amet'
        ]);

        DB::table('freelancers')->insert([
            'user_id' => 2,
            'position' => 'Frontend Progammer',
            'experience' => 5,
            'rank' => 2,
            'summary' => 'Lorem Ipsum Dolor sit amet'
        ]);

        DB::table('companies')->insert([
            'user_id' => 3,
            'name' => 'Blizzard Entertainment',
            'industry' => 'Game Studio',
            'address' => 'Irvine, California',
            'summary' => 'Lorem Ipsum Dolor sit amet'
        ]);

        DB::table('companies')->insert([
            'user_id' => 4,
            'name' => 'SIE Santa Monica Studio',
            'industry' => 'Game Studio',
            'address' => 'Santa Monica, California',
            'summary' => 'Lorem Ipsum Dolor sit amet'
        ]);

        for($i = 0; $i < 20; $i++){
           DB::table('jobs')->insert([
                'company_id' => 1,
                'title' => 'Lead Software Engineer ' . str_random(10),
                'description' => 'You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',
                'status' => 1
            ]);

            DB::table('jobs')->insert([
                'company_id' => 1,
                'title' => 'Senior Software Engineer ' . str_random(10),
                'description' => 'Maintain comprehensive documentation of our build systems',
                'status' => 0
            ]);

            DB::table('jobs')->insert([
                'company_id' => 2,
                'title' => 'Tools Engineer ' . str_random(10),
                'description' => 'Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',
                'status' => 1
            ]); 
        }

        
    }
}
