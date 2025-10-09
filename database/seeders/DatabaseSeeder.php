<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Applications\Database\Seeders\ApprovalStageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([ApprovalStageSeeder::class,]);

        $u=User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

    $this->call([
        RoleSeeder::class,
        ApplicationStatusSeeder::class,
        ProprietorSeeder::class,
        PrvInsCategorySeeder::class,
        TRequirementSeeder::class,
        LgaSeeder::class
    ]);
    $u->assignRole('ADM');
    $this->call(WardSeeder::class);

    
    
/*
        */
    }
}
