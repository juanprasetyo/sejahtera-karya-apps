<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = User::firstWhere('email', 'juanprasetyo000@gmail.com');
        Project::factory()
                ->count(20000)
                ->state(['user_id' => $user_id])
                ->create();
    }
}
