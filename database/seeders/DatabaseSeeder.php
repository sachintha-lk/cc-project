<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $userroles = [
            [
                'id' => 1,
                'name' => 'Admin',
                'status' => true,
            ],
            [
                'id' => 2,
                'name' => 'Teacher',
                'status' => true,
            ],
            [
                'id' => 3,
                'name' => 'Student',
                'status' => true,
            ]

        ];

        foreach ($userroles as $role) {
            \App\Models\Role::create($role);
        }

        // Create admin user
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@educatelanka.lk',
            'password' => Hash::make('adminpassword'),
            'role_id' => 1,
            'status' => true,
        ]);

        // Create teacher user
        \App\Models\User::create([
            'name' => 'Teacher1',
            'email' => 'teacher1@school1.com',
            'password' => Hash::make('teacherpassword'),
            'role_id' => 2,
            'status' => true,
        ]);

        // Create student user
        \App\Models\User::create([
            'name' => 'Student1',
            'email' => 'student1@school1.com',
            'password' => Hash::make('studentpassword'),
            'role_id' => 3,
            'status' => true,
        ]);

        // Create student user
        \App\Models\User::create([
            'name' => 'Student2',
            'email' => 'student2@school1.com',
            'password' => Hash::make('studentpassword'),
            'role_id' => 3,
            'status' => true,
        ]);

        // Create student user
        \App\Models\User::create([
            'name' => 'Student3',
            'email' => 'student3@school1.com',
            'password' => Hash::make('studentpassword'),
            'role_id' => 3,
            'status' => true,
        ]);


        $grades = [
            [
                'id' => 1,
                'name' => 'Grade 1',
            ],
            [
                'id' => 2,
                'name' => 'Grade 2',
            ],
            [
                'id' => 3,
                'name' => 'Grade 3',
            ],
            [
                'id' => 4,
                'name' => 'Grade 4',
            ],
            [
                'id' => 5,
                'name' => 'Grade 5',
            ],
            [
                'id' => 6,
                'name' => 'Grade 6',
            ],
            [
                'id' => 7,
                'name' => 'Grade 7',
            ],
            [
                'id' => 8,
                'name' => 'Grade 8',
            ],
            [
                'id' => 9,
                'name' => 'Grade 9',
            ],
            [
                'id' => 10,
                'name' => 'Grade 10',
            ],
            [
                'id' => 11,
                'name' => 'Grade 11',
            ],
            [
                'id' => 12,
                'name' => 'Grade 12',
            ],
            [
                'id' => 13,
                'name' => 'Grade 13',
            ],
        ];

        foreach ($grades as $grade) {
            \App\Models\Grade::create($grade);
        }



        $class = [
            [
                'id' => 1,
                'class_name' => 'Class A',
                'grade_id' => 1,

            ],
            [
                'id' => 2,
                'class_name' => 'Grade B',
                'grade_id' => 1,

            ],


        ];

        foreach ($class as $class) {
            \App\Models\GradeClasses::create($class);
        }

        $class = [

            [
                'id' => 007,
                'class_name' => 'Class C',
                'grade_id' => 1,

            ],
            [
                'id' => 8,
                'class_name' => 'Grade D',
                'grade_id' => 1,

            ],
            [
                'id' => 9,
                'class_name' => 'Grade E',
                'grade_id' => 1,

            ]
        ];
        foreach ($class as $class) {
            \App\Models\GradeClasses::create($class);
        }
    }
}
