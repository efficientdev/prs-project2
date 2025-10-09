<?php

namespace Modules\Applications\Database\Seeders;

use Illuminate\Database\Seeder;

class ApprovalStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        \Modules\Applications\Models\ApprovalStage::insert([
	        ['name' => 'Initial Review', 'order' => 1,'role_name'=>'ADM'],
	        ['name' => 'Supervisor Approval', 'order' => 2,'role_name'=>'ADM'],
	        ['name' => 'Manager Approval', 'order' => 3,'role_name'=>'ADM'],
	    ]);
    }
}
