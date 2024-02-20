<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        if (env('INITIAL_SETUP')) {
            Role::create(['name' => 'Super Admin']);

            $user = \App\Models\User::factory()->create([
                'name' => 'Admin User',
                'email' => env('ADMIN_USER_EMAIL'),
            ]);

            $user->assignRole('Super Admin');
        }

        $this->call([
            StageSeeder::class,
            CategorySeeder::class,
        ]);

        \App\Models\Project::factory(15)->create();
        // or
        // $this->call(ProjectSeeder::class);
    }
}
