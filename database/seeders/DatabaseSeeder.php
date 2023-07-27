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
    }
}
