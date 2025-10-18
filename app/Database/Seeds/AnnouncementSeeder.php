<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => 'Welcome to the New Semester!',
                'content'    => 'We are excited to start a new semester filled with learning and growth. Stay tuned for upcoming events!',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'System Maintenance Notice',
                'content'    => 'Our system will be under maintenance on Sunday from 12 AM to 6 AM. Please plan accordingly.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}
