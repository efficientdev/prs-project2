<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
use App\Models\User;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
//use Modules\Proprietors\Models\Proprietor; 

class ProprietorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can create multiple proprietors here
        $proprietors = [
            [
                'email' => 'john.doe@example.com',
                'password' => 'password', // Will be hashed
                'surname' => 'Doe',
                'other_names' => 'John',
                'tin' => '1234567890',
                'nin' => '9876543210',
                'phone_number' => '08012345678',
                'title' => 'Ms.',
            ],
            // Add more test records if needed
        ];

        foreach ($proprietors as $data) {
            $name = $data['surname'] . ' ' . $data['other_names'];
            $username = $this->generateUniqueUsername($name);

            $userMeta = [
                'surname' => $data['surname'],
                'other_names' => $data['other_names'],
                'username' => $username,
            ];

            $user = User::create([
                'name' => $name,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'meta' => $userMeta,
            ]);

            $user->assignRole('proprietor');

            $proprietorMeta = [
                'tin' => $data['tin'],
                'nin' => $data['nin'],
                'phone_number' => $data['phone_number'],
                'title' => $data['title'],
                'name' => $name,
            ];

            /*Proprietor::create([
                'user_id' => $user->id,
                'meta' => $proprietorMeta,
            ]);*/
        }
    }

    /**
     * Generate a unique username based on a name.
     */
    private function generateUniqueUsername(string $name): string
    {
        $base = Str::slug($name, '_');
        $username = $base;
        $i = 1;

        while (User::where('meta->username', $username)->exists()) {
            $username = $base . '_' . $i++;
        }

        return $username;
    }
}
