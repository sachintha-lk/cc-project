<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Harishdurga\LaravelQuiz\Database\Seeders\QuestionTypeSeeder;
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
            'teacher_id' => 'T001',
            'name' => 'Teacher1',
            'email' => 'teacher1@school1.com',
            'password' => Hash::make('teacherpassword'),
            'role_id' => 2,
            'status' => true,
        ]);

        // Create student user
        \App\Models\User::create([
            'student_id' => 'ST001',
            'name' => 'Student1',
            'email' => 'student1@school1.com',
            'password' => Hash::make('studentpassword'),
            'role_id' => 3,
            'status' => true,
        ]);

        // Create student user
        \App\Models\User::create([
            'student_id' => 'ST002',
            'name' => 'Student2',
            'email' => 'student2@school1.com',
            'password' => Hash::make('studentpassword'),
            'role_id' => 3,
            'status' => true,
        ]);

        // Create student user
        \App\Models\User::create([
            'student_id' => 'ST003',
            'name' => 'Student3',
            'email' => 'student3@school1.com',
            'password' => Hash::make('studentpassword'),
            'role_id' => 3,
            'status' => true,
        ]);

        // Create student user
        \App\Models\User::create([
            'student_id' => 'ST004',
            'name' => 'Student4',
            'email' => 'student4@school1.com',
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
                'class_name' => '1 A',
                'grade_id' => 1,

            ],
            [
                'id' => 2,
                'class_name' => '1 B',
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

        $module = [
            [
                'id' => 1,
                'Module_name' => 'Mathematics',
                'Module_code' => 'M101',
                'iscommon' => true,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 2,
                'Module_name' => 'English',
                'Module_code' => 'E102',
                'iscommon' => true,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 3,
                'Module_name' => 'Sinhala',
                'Module_code' => 'S103',
                'iscommon' => true,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 4,
                'Module_name' => 'Tamil',
                'Module_code' => 'T104',
                'iscommon' => true,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 5,
                'Module_name' => 'Science',
                'Module_code' => 'S105',
                'iscommon' => true,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 6,
                'Module_name' => 'History',
                'Module_code' => 'H106',
                'iscommon' => true,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 7,
                'Module_name' => 'Geography',
                'Module_code' => 'G107',
                'iscommon' => true,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 8,
                'Module_name' => 'Dancing',
                'Module_code' => 'D108',
                'iscommon' => false,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
            [
                'id' => 9,
                'Module_name' => 'Art',
                'Module_code' => 'A109',
                'iscommon' => false,
                'class_id' => 1,
                'teacher_id' => '2'
            ],
        ];
        foreach ($module as $module) {
            \App\Models\Module::create($module);
        }

        $this->call(
            QuestionTypeSeeder::class
        );


    }
}
