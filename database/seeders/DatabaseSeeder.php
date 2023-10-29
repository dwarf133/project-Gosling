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
use Illuminate\Support\Facades\Hash;


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
        (new User([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'company_id' => 1,
            'department_id' => 1,
        ]))->save();
        User::factory(200)->create();
        Course::factory(200)->create();
        Lesson::factory(500)->create();
        Material::factory(200)->create();
        Result::factory(500)->create();
    }
}
