<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Course;
use App\Models\Department;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(50)->create();
        Department::factory(100)->create();
        User::factory(200)->create();
        Course::factory(200)->create();
        Lesson::factory(500)->create();
        Material::factory(200)->create();
        Result::factory(500)->create();
    }
}
