<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Proprietors\Models\ApplicationStatus;

use Modules\Registrations\Models\RegistrationApprovalStage;
class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


/* `sch_apprv2`.`registration_approval_stages` */
$registration_approval_stages = array(
  array('id' => '1','name' => 'PRS/ REVENUE OFFICER Desk Review
','order' => '1','role_name' => 'PRS','created_at' => NULL,'updated_at' => NULL),
  array('id' => '2','name' => ' Inspection & Verification
','order' => '2','role_name' => 'CIE','created_at' => NULL,'updated_at' => NULL),
  array('id' => '3','name' => 'Pre-Approval / Follow-up Inspection
','order' => '3','role_name' => 'PRS','created_at' => NULL,'updated_at' => NULL),
  array('id' => '4','name' => 'Evaluation & Recommendation
','order' => '4','role_name' => 'DPRS','created_at' => NULL,'updated_at' => NULL),
  array('id' => '5','name' => 'Review by Permanent Secretary','order' => '5','role_name' => 'PS','created_at' => NULL,'updated_at' => NULL),
  array('id' => '6','name' => 'Final Approval by Honourable Commissioner (HC)
','order' => '6','role_name' => 'COMM','created_at' => NULL,'updated_at' => NULL),
  array('id' => '7','name' => 'First letter Issued and payment of Approval fee Pending
','order' => '7','role_name' => 'PRS','created_at' => NULL,'updated_at' => NULL)
);

foreach ($registration_approval_stages as $key => $value) {
  # code...
    RegistrationApprovalStage::firstOrCreate($value);
}

        //

/* `edoproje_medu`.`school_status` */
$school_status = array(
  array('school_status_id' => '-13','school_status_name' => 'Final Confirmation Rejected By DPRS','school_status_action' => '','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '-11','school_status_name' => 'Pre-Approval Rejected by Commissioner','school_status_action' => '','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '-6','school_status_name' => 'Pre-Approval Rejected by DPRS','school_status_action' => '','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '-5','school_status_name' => 'Rejected by CIE','school_status_action' => '','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '-4','school_status_name' => 'Rejected by DPRS','school_status_action' => '','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '-2','school_status_name' => 'Rejected by Commissioner','school_status_action' => '','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '1','school_status_name' => 'Pending Payment Confirmation by DFA','school_status_action' => 'Confirm Application Fee Payment','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '2','school_status_name' => 'Pending Commissioner Confirmation','school_status_action' => 'Confirm Application','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '3','school_status_name' => 'Pending PS Confirmation','school_status_action' => 'Forward to [[NEXTOFFICER]]','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '4','school_status_name' => 'Pending DPRS Confirmation','school_status_action' => 'Confirm Application','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '5','school_status_name' => 'Pending CIE Feasibility Inspection','school_status_action' => 'Satisfactory','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '6','school_status_name' => 'Pending DPRS Pre-Approval Inspection','school_status_action' => 'Satisfactory','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '7','school_status_name' => 'Pending PS Pre-Approval Confirmation','school_status_action' => 'Forward to [[NEXTOFFICER]]','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '8','school_status_name' => 'Pending Approval Fee Confirmation','school_status_action' => 'Confirm Approval Fee Payment','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '9','school_status_name' => 'Pending PS Confirmation','school_status_action' => 'Forward to [[NEXTOFFICER]]','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '10','school_status_name' => 'Pending Biometric Capture','school_status_action' => 'Forward to [[NEXTOFFICER]]','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '11','school_status_name' => 'Pending DG Provisional Approval','school_status_action' => 'Forward to [[NEXTOFFICER]]','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '12','school_status_name' => 'Pending Commissioner Approval','school_status_action' => 'Approve','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '13','school_status_name' => 'Pending Approval fee payment','school_status_action' => 'Forward to [[NEXTOFFICER]]','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '14','school_status_name' => 'Pending DPRS Confirmation','school_status_action' => 'Approve','created_at' => NULL,'updated_at' => NULL),
  array('school_status_id' => '15','school_status_name' => 'Approved','school_status_action' => 'Print Approval Letter','created_at' => NULL,'updated_at' => NULL)
);

/*
foreach ($school_status as $key => $value) {
	# code...
	if ($value['school_status_id']>0) { 
		ApplicationStatus::firstOrCreate([
			'id'=>$value['school_status_id'],
			'status_name'=>$value['school_status_name'],
		]);
	}
}*/

/* `sch_apprv2`.`application_statuses` */
$application_statuses = array(
  array('id' => '1','status_name' => 'Submit Application','next_id' => '2','actor_role_id' => '12','next_role_id' => '12','next_role' => 'proprietor','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '2','status_name' => 'Pay Application fee','next_id' => '3','actor_role_id' => '12','next_role_id' => '9','next_role' => 'prs','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '3','status_name' => 'PRS/ REVENUE OFFICER Desk Review ','next_id' => '4','actor_role_id' => '9','next_role_id' => '2','next_role' => 'cie','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '4','status_name' => 'Inspection & Verification','next_id' => '5','actor_role_id' => '2','next_role_id' => '9','next_role' => 'prs','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '5','status_name' => 'Pre-Approval / Follow-up Inspection','next_id' => '6','actor_role_id' => '9','next_role_id' => '7','next_role' => 'dprs','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '6','status_name' => 'Evaluation & Recommendation
','next_id' => '7','actor_role_id' => '7','next_role_id' => '10','next_role' => 'ps','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '7','status_name' => 'Review by Permanent Secretary','next_id' => '8','actor_role_id' => '10','next_role_id' => '3','next_role' => 'comm','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '8','status_name' => 'Final Approval by Honourable Commissioner (HC)','next_id' => '9','actor_role_id' => '3','next_role_id' => '9','next_role' => 'prs','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '9','status_name' => 'Issuance of First letter','next_id' => '10','actor_role_id' => '9','next_role_id' => '12','next_role' => 'proprietor','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '10','status_name' => 'Payment of Approval fee','next_id' => '11','actor_role_id' => '12','next_role_id' => '9','next_role' => 'prs','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00'),
  array('id' => '11','status_name' => 'PRS/ REVENUE OFFICER Desk Review ','next_id' => '12','actor_role_id' => '9','next_role_id' => '12','next_role' => 'proprietor','created_at' => '2025-10-02 10:57:57','updated_at' => '2025-10-02 00:00:00')
);
foreach ($application_statuses as $key => $value) {
  # code...
    ApplicationStatus::firstOrCreate($value);
}

    }
}
