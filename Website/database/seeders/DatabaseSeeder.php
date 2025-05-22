<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Baldior',
            'email' => 'baldior@gmail.com',
            'password' => bcrypt('admin1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Project::factory(5)->create([
        //     'user_id' => $user->id,
        // ]);

        // Voeg de technologieën direct toe in de DatabaseSeeder
        $technologies = [
            'Laravel',
            'React',
            'TailwindCSS',
            'WordPress',
            'PHP',
            'JavaScript',
            'Vite',
            'CSS',
            'XAMPP',
            'Docker',
            'MySQL',
        ];

        foreach ($technologies as $tech) {
            Technology::create([
                'name' => $tech,
            ]);
        }
    }
}
