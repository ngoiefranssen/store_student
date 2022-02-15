<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Student::factory(5)->create();
    }
}
