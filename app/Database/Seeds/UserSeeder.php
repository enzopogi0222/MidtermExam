<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin1',
                'email'      => 'admin@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'first_name' => 'Admin',
                'last_name'  => 'User',
                'is_active'  => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'teacher1',
                'email'      => 'teacher1@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'role'       => 'teacher',
                'first_name' => 'John',
                'last_name'  => 'Teacher',
                'is_active'  => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'teacher2',
                'email'      => 'teacher2@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'role'       => 'teacher',
                'first_name' => 'Jane',
                'last_name'  => 'Smith',
                'is_active'  => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'student1',
                'email'      => 'student1@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'role'       => 'student',
                'first_name' => 'Alice',
                'last_name'  => 'Johnson',
                'is_active'  => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'student2',
                'email'      => 'student2@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'role'       => 'student',
                'first_name' => 'Bob',
                'last_name'  => 'Wilson',
                'is_active'  => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'student3',
                'email'      => 'student3@example.com',
                'password'   => password_hash('password123', PASSWORD_DEFAULT),
                'role'       => 'student',
                'first_name' => 'Carol',
                'last_name'  => 'Davis',
                'is_active'  => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert the data
        $this->db->table('users')->insertBatch($data);
        
        echo "Users seeded successfully!\n";
        echo "Test credentials (all use password: password123):\n";
        echo "- Admin: admin1\n";
        echo "- Teachers: teacher1, teacher2\n";
        echo "- Students: student1, student2, student3\n";
    }
}
