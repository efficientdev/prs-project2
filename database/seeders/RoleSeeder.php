<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
use Spatie\Permission\Models\Role;
use App\Models\{UserRank,User};

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //UserRank

        $user_rank = array(
          array('user_rank_id' => 'ADM','user_rank_name' => 'Administrator','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'CIE','user_rank_name' => 'CIE','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'COMM','user_rank_name' => 'Commissioner','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'DED','user_rank_name' => 'Director of Examination','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'DFA','user_rank_name' => 'DFA','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'DG','user_rank_name' => 'Director General','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'DPRS','user_rank_name' => 'Director of PRS','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'OFF','user_rank_name' => 'Biometric Capture Officers','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'PRS','user_rank_name' => 'PRS OFFICER','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'PS','user_rank_name' => 'Permanent Secretary','created_at' => NULL,'updated_at' => NULL),
          array('user_rank_id' => 'SSA','user_rank_name' => 'SSA','created_at' => NULL,'updated_at' => NULL)
        );

        foreach ($user_rank as $roleName) {
            Role::firstOrCreate(['name' => $roleName['user_rank_id']]);
            UserRank::firstOrCreate($roleName);

            $u=User::factory()->create([
                'name' => $roleName['user_rank_name'].' User',
                'email' => strtolower($roleName['user_rank_id']).'@edostategov.com.ng',
            ]);
            $u->assignRole($roleName['user_rank_id']);

        }

        Role::firstOrCreate(['name' => 'proprietor']);


        /*$roles = [
            'admin',
            'dfa',
            'commissioner',
            'ps',
            'dprs',
            'cie',
            'dg',
            'proprietor',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }*/
    }
}
