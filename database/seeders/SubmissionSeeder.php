<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Submission;

class SubmissionSeeder extends Seeder
{
    public function run(): void
    {
        $submissions = [
            [
                'name' => 'Ariana Grande',
                'email' => 'ariana@example.com',
                'message' => 'Hello World!',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'message' => 'This is a demo message',
            ],
            [
                'name' => 'Emma Watson',
                'email' => 'emma@example.com',
                'message' => 'Laravel + React test message',
            ],
        ];

        foreach ($submissions as $data) {
            Submission::create($data);
        }
    }
}
