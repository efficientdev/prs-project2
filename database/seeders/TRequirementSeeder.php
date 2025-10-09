<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

$t_requirements = array(
  array('id' => '1','requirement_name' => 'Evidence of school land ownership','visible_in_t1' => '1','t1_note' => '','visible_in_t2' => '1','t2_note' => NULL,'visible_in_t3' => '1','t3_note' => NULL,'visible_in_t4' => '1','t4_note' => NULL,'visible_in_t5' => '1','t5_note' => NULL,'visible_in_t6' => '1','t6_note' => NULL,'visible_in_t7' => '1','t7_note' => '','visible_in_t8' => '1','t8_note' => '','visible_in_t9' => '1','t9_note' => '','created_at' => NULL,'updated_at' => NULL),
  array('id' => '2','requirement_name' => 'School Land Size/ Site','visible_in_t1' => '1','t1_note' => 'At least, a land size of 100×100ft
A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties.
The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.
','visible_in_t2' => '1','t2_note' => 'At least, a land size of 100×200ft
A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties.
The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.','visible_in_t3' => '1','t3_note' => 'At least, a land size of 100×100ft
A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties.
The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.
','visible_in_t4' => '1','t4_note' => 'At least, a land size of 100×200ft
A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties.
The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.
','visible_in_t5' => '1','t5_note' => 'At least, a land size of 100×200ft
A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties.
The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.
','visible_in_t6' => '1','t6_note' => 'At least, a land size of 100×100ft
A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties.
The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.
','visible_in_t7' => '1','t7_note' => 'At least, a land size of 100×100ft A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties. The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.','visible_in_t8' => '1','t8_note' => 'At least, a land size of 100×100ft A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties. The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.','visible_in_t9' => '1','t9_note' => 'At least, a land size of 100×100ft A serene, technological enabled teaching and learning Environment, free  from noise, pollution, erosion, flood, high tension lines and any major threat to the security of the children, staff and school properties. The Land must be surveyed and conveyed to the school by the Edo State Ministry of Physical Planning.','created_at' => NULL,'updated_at' => NULL),
  array('id' => '3','requirement_name' => 'A Building Plan','visible_in_t1' => '1','t1_note' => 'For the School Buildings (Classrooms /Administrative Blocks) 
','visible_in_t2' => '1','t2_note' => 'For the School Buildings (Classrooms /Administrative Blocks) 
','visible_in_t3' => '1','t3_note' => 'For the School Buildings (Classrooms /Administrative Blocks) 
','visible_in_t4' => '1','t4_note' => 'For the School Buildings (Classrooms /Administrative Blocks) 
','visible_in_t5' => '1','t5_note' => 'For the School Buildings (Classrooms /Administrative Blocks) 
','visible_in_t6' => '1','t6_note' => 'For the School Buildings (Classrooms /Administrative Blocks) 
','visible_in_t7' => '1','t7_note' => 'For the School Buildings (Classrooms /Administrative Blocks) ','visible_in_t8' => '1','t8_note' => 'For the School Buildings (Classrooms /Administrative Blocks) ','visible_in_t9' => '1','t9_note' => 'For the School Buildings (Classrooms /Administrative Blocks) ','created_at' => NULL,'updated_at' => NULL),
  array('id' => '4','requirement_name' => 'Classroom Block(s)','visible_in_t1' => '1','t1_note' => 'A Classroom block of at least 3 classrooms','visible_in_t2' => '1','t2_note' => 'A Classroom block of at least 12 classrooms 
','visible_in_t3' => '1','t3_note' => 'A Classroom block of at least 3 classrooms 
','visible_in_t4' => '1','t4_note' => 'A Classroom block of at least 15 classrooms 
','visible_in_t5' => '1','t5_note' => 'A Classroom block of at least 3 classrooms 
','visible_in_t6' => '1','t6_note' => 'A Classroom block of at least 3 classrooms 
','visible_in_t7' => '1','t7_note' => 'A Classroom block of at least 3 classrooms ','visible_in_t8' => '1','t8_note' => 'A Classroom block of at least 3 classrooms','visible_in_t9' => '1','t9_note' => 'A Classroom block of at least 3 classrooms ','created_at' => NULL,'updated_at' => NULL),
  array('id' => '5','requirement_name' => 'Administrative Block','visible_in_t1' => '1','t1_note' => 'An Administrative Block with store and Library; etc
','visible_in_t2' => '1','t2_note' => 'An Administrative Block with store and Library; etc
','visible_in_t3' => '1','t3_note' => 'An Administrative Block with store and Library; etc
','visible_in_t4' => '1','t4_note' => 'An Administrative Block with store and Library; etc
','visible_in_t5' => '1','t5_note' => 'An Administrative Block with store and Library; etc
','visible_in_t6' => '1','t6_note' => 'An Administrative Block with store and Library; etc
','visible_in_t7' => '1','t7_note' => 'An Administrative Block with store and Library; etc','visible_in_t8' => '1','t8_note' => 'An Administrative Block with store and Library; etc','visible_in_t9' => '1','t9_note' => 'An Administrative Block with store and Library; etc','created_at' => NULL,'updated_at' => NULL),
  array('id' => '6','requirement_name' => 'Building / Classroom Wall and Floor','visible_in_t1' => '1','t1_note' => 'well cemented and painted','visible_in_t2' => '1','t2_note' => 'well cemented and painted','visible_in_t3' => '1','t3_note' => 'well cemented and painted 
','visible_in_t4' => '1','t4_note' => 'well cemented and painted 
','visible_in_t5' => '1','t5_note' => 'well cemented and painted 
','visible_in_t6' => '1','t6_note' => 'well cemented and painted 
','visible_in_t7' => '1','t7_note' => 'well cemented and painted ','visible_in_t8' => '1','t8_note' => 'well cemented and painted ','visible_in_t9' => '1','t9_note' => 'well cemented and painted','created_at' => NULL,'updated_at' => NULL),
  array('id' => '7','requirement_name' => 'Qualification of Teachers','visible_in_t1' => '1','t1_note' => 'Minimum of NCE','visible_in_t2' => '1','t2_note' => 'Minimum of NCE','visible_in_t3' => '1','t3_note' => 'Minimum of NCE. 
','visible_in_t4' => '1','t4_note' => ' Minimum of NCE. 
','visible_in_t5' => '1','t5_note' => 'Minimum of NCE. 
','visible_in_t6' => '1','t6_note' => 'Minimum of NCE. 
','visible_in_t7' => '1','t7_note' => 'Minimum of NCE.','visible_in_t8' => '1','t8_note' => 'Minimum of NCE.','visible_in_t9' => '1','t9_note' => 'Minimum of NCE.','created_at' => NULL,'updated_at' => NULL),
  array('id' => '8','requirement_name' => 'Classroom size','visible_in_t1' => '1','t1_note' => 'At least 22 by 24 ft
','visible_in_t2' => '1','t2_note' => 'At least 22 by 24 ft
','visible_in_t3' => '1','t3_note' => 'At least 22 by 24 ft
','visible_in_t4' => '1','t4_note' => 'At least 22 by 24 ft
','visible_in_t5' => '1','t5_note' => 'At least 22 by 24 ft
','visible_in_t6' => '1','t6_note' => 'At least 22 by 24 ft
','visible_in_t7' => '1','t7_note' => 'At least 22 by 24 ft','visible_in_t8' => '1','t8_note' => 'At least 22 by 24 ft','visible_in_t9' => '1','t9_note' => 'At least 22 by 24 ft','created_at' => NULL,'updated_at' => NULL),
  array('id' => '9','requirement_name' => 'Furniture','visible_in_t1' => '1','t1_note' => 'Seat with backrest
','visible_in_t2' => '1','t2_note' => 'Seat with backrest','visible_in_t3' => '1','t3_note' => 'Seat with backrest
','visible_in_t4' => '1','t4_note' => 'Seat with backrest
','visible_in_t5' => '1','t5_note' => 'Seat with backrest
','visible_in_t6' => '1','t6_note' => 'Seat with backrest
','visible_in_t7' => '1','t7_note' => 'Seat with backrest','visible_in_t8' => '1','t8_note' => 'Seat with backrest','visible_in_t9' => '1','t9_note' => 'Seat with backrest','created_at' => NULL,'updated_at' => NULL),
  array('id' => '10','requirement_name' => 'Class Board','visible_in_t1' => '1','t1_note' => 'Minimum of 4ft by 8ft
','visible_in_t2' => '1','t2_note' => 'Minimum of 4ft by 8ft
','visible_in_t3' => '1','t3_note' => 'Minimum of 4ft by 8ft','visible_in_t4' => '1','t4_note' => 'Minimum of 4ft by 8ft','visible_in_t5' => '1','t5_note' => 'Minimum of 4ft by 8ft
','visible_in_t6' => '1','t6_note' => 'Minimum of 4ft by 8ft
','visible_in_t7' => '1','t7_note' => 'Minimum of 4ft by 8ft','visible_in_t8' => '1','t8_note' => 'Minimum of 4ft by 8ft','visible_in_t9' => '1','t9_note' => 'Minimum of 4ft by 8ft','created_at' => NULL,'updated_at' => NULL),
  array('id' => '11','requirement_name' => 'Windows','visible_in_t1' => '1','t1_note' => 'Four (4) windows per class 
','visible_in_t2' => '1','t2_note' => 'Four (4) windows per class','visible_in_t3' => '1','t3_note' => 'Four (4) windows per class ','visible_in_t4' => '1','t4_note' => 'Four (4) windows per class','visible_in_t5' => '1','t5_note' => 'Four (4) windows per class 
','visible_in_t6' => '1','t6_note' => 'Four (4) windows per class','visible_in_t7' => '1','t7_note' => 'Four (4) windows per class ','visible_in_t8' => '1','t8_note' => 'Four (4) windows per class ','visible_in_t9' => '1','t9_note' => 'Four (4) windows per class ','created_at' => NULL,'updated_at' => NULL),
  array('id' => '12','requirement_name' => 'Doors','visible_in_t1' => '1','t1_note' => 'Two (2) doors per class
','visible_in_t2' => '1','t2_note' => 'Two (2) doors per class
','visible_in_t3' => '1','t3_note' => 'Two (2) doors per class
','visible_in_t4' => '1','t4_note' => 'Two (2) doors per class','visible_in_t5' => '1','t5_note' => 'Two (2) doors per class
','visible_in_t6' => '1','t6_note' => 'Two (2) doors per class
','visible_in_t7' => '1','t7_note' => 'Two (2) doors per class','visible_in_t8' => '1','t8_note' => 'Two (2) doors per class','visible_in_t9' => '1','t9_note' => 'Two (2) doors per class','created_at' => NULL,'updated_at' => NULL),
  array('id' => '13','requirement_name' => 'Playground Size','visible_in_t1' => '1','t1_note' => '50×100ft
','visible_in_t2' => '1','t2_note' => '50×100ft
','visible_in_t3' => '1','t3_note' => '50×100ft
','visible_in_t4' => '1','t4_note' => '50×100ft
','visible_in_t5' => '1','t5_note' => '50×100ft
','visible_in_t6' => '1','t6_note' => '50×100ft
','visible_in_t7' => '1','t7_note' => '50×100ft','visible_in_t8' => '1','t8_note' => '50×100ft','visible_in_t9' => '1','t9_note' => '50×100ft','created_at' => NULL,'updated_at' => NULL),
  array('id' => '14','requirement_name' => 'Indoor and outdoor Sports Facilities','visible_in_t1' => '1','t1_note' => 'Merry go round, slide, swing, etc
','visible_in_t2' => '1','t2_note' => 'Merry go round, slide, swing, etc
','visible_in_t3' => '1','t3_note' => 'Merry go round, slide, swing, etc
','visible_in_t4' => '1','t4_note' => 'Merry go round, slide, swing, etc
','visible_in_t5' => '1','t5_note' => 'Merry go round, slide, swing, etc
','visible_in_t6' => '1','t6_note' => 'Merry go round, slide, swing, etc
','visible_in_t7' => '1','t7_note' => 'Merry go round, slide, swing, etc','visible_in_t8' => '1','t8_note' => 'Merry go round, slide, swing, etc','visible_in_t9' => '1','t9_note' => 'Merry go round, slide, swing, etc','created_at' => NULL,'updated_at' => NULL),
  array('id' => '15','requirement_name' => 'Sanitary (Toilets and Urinal)','visible_in_t1' => '1','t1_note' => 'At least Four (4)	','visible_in_t2' => '1','t2_note' => 'At least Eight (8)	','visible_in_t3' => '1','t3_note' => 'At least Six (6)','visible_in_t4' => '1','t4_note' => 'At least Six (6)	','visible_in_t5' => '1','t5_note' => 'At least Four (4)','visible_in_t6' => '1','t6_note' => 'At least Four (4)','visible_in_t7' => '1','t7_note' => 'At least Four (4)	','visible_in_t8' => '1','t8_note' => 'At least Four (4)	','visible_in_t9' => '1','t9_note' => 'At least Four (4)','created_at' => NULL,'updated_at' => NULL),
  array('id' => '16','requirement_name' => 'Health/Clinic Block','visible_in_t1' => '1','t1_note' => 'Sickbay as alternative will suffice
','visible_in_t2' => '1','t2_note' => 'Sickbay as alternative will suffice
','visible_in_t3' => '1','t3_note' => 'Sickbay as alternative will suffice
','visible_in_t4' => '1','t4_note' => 'Sickbay as alternative will suffice
','visible_in_t5' => '1','t5_note' => 'Sickbay as alternative will suffice
','visible_in_t6' => '1','t6_note' => 'Sickbay as alternative will suffice
','visible_in_t7' => '1','t7_note' => 'Sickbay as alternative will suffice','visible_in_t8' => '1','t8_note' => 'Sickbay as alternative will suffice','visible_in_t9' => '1','t9_note' => 'Sickbay as alternative will suffice','created_at' => NULL,'updated_at' => NULL),
  array('id' => '17','requirement_name' => 'Statutory School Records','visible_in_t1' => '1','t1_note' => 'Compulsory','visible_in_t2' => '1','t2_note' => 'Compulsory','visible_in_t3' => '1','t3_note' => 'Compulsory','visible_in_t4' => '1','t4_note' => 'Compulsory','visible_in_t5' => '1','t5_note' => 'Compulsory','visible_in_t6' => '1','t6_note' => 'Compulsory','visible_in_t7' => '1','t7_note' => 'Compulsory','visible_in_t8' => '1','t8_note' => 'Compulsory','visible_in_t9' => '1','t9_note' => 'Compulsory','created_at' => NULL,'updated_at' => NULL),
  array('id' => '18','requirement_name' => 'Guidance  and Counseling Room','visible_in_t1' => '1','t1_note' => 'Required','visible_in_t2' => '1','t2_note' => 'Required','visible_in_t3' => '1','t3_note' => 'Required','visible_in_t4' => '1','t4_note' => 'Required','visible_in_t5' => '1','t5_note' => 'Required','visible_in_t6' => '1','t6_note' => 'Required','visible_in_t7' => '1','t7_note' => 'Required','visible_in_t8' => '1','t8_note' => 'Required','visible_in_t9' => '1','t9_note' => 'Required','created_at' => NULL,'updated_at' => NULL),
  array('id' => '19','requirement_name' => 'Perimeter Fence ','visible_in_t1' => '1','t1_note' => 'Very Necessary
','visible_in_t2' => '1','t2_note' => 'Very Necessary','visible_in_t3' => '1','t3_note' => 'Very Necessary
','visible_in_t4' => '1','t4_note' => 'Very Necessary
','visible_in_t5' => '1','t5_note' => 'Very Necessary
','visible_in_t6' => '1','t6_note' => 'Very Necessary
','visible_in_t7' => '1','t7_note' => 'Very Necessary','visible_in_t8' => '1','t8_note' => 'Very Necessary','visible_in_t9' => '1','t9_note' => 'Very Necessary','created_at' => NULL,'updated_at' => NULL),
  array('id' => '20','requirement_name' => 'Sanitation facility (Bin) ','visible_in_t1' => '1','t1_note' => 'Necessary','visible_in_t2' => '1','t2_note' => 'Necessary','visible_in_t3' => '1','t3_note' => 'Necessary','visible_in_t4' => '1','t4_note' => 'Necessary','visible_in_t5' => '1','t5_note' => 'Necessary','visible_in_t6' => '1','t6_note' => 'Necessary','visible_in_t7' => '1','t7_note' => 'Necessary','visible_in_t8' => '1','t8_note' => 'Necessary','visible_in_t9' => '1','t9_note' => 'Necessary','created_at' => NULL,'updated_at' => NULL),
  array('id' => '21','requirement_name' => 'Security Post (Guard) Block','visible_in_t1' => '1','t1_note' => 'Required','visible_in_t2' => '1','t2_note' => 'Required','visible_in_t3' => '1','t3_note' => 'Required','visible_in_t4' => '1','t4_note' => 'Required','visible_in_t5' => '1','t5_note' => 'Required','visible_in_t6' => '1','t6_note' => 'Required','visible_in_t7' => '1','t7_note' => 'Required','visible_in_t8' => '1','t8_note' => 'Required','visible_in_t9' => '1','t9_note' => 'Required','created_at' => NULL,'updated_at' => NULL),
  array('id' => '22','requirement_name' => 'Electricity Supply','visible_in_t1' => '1','t1_note' => 'Necessary','visible_in_t2' => '1','t2_note' => 'Necessary','visible_in_t3' => '1','t3_note' => 'Necessary','visible_in_t4' => '1','t4_note' => 'Necessary','visible_in_t5' => '1','t5_note' => 'Necessary','visible_in_t6' => '1','t6_note' => 'Necessary','visible_in_t7' => '1','t7_note' => 'Necessary','visible_in_t8' => '1','t8_note' => 'Necessary','visible_in_t9' => '1','t9_note' => 'Necessary','created_at' => NULL,'updated_at' => NULL),
  array('id' => '23','requirement_name' => 'Fire Fighting Equipment','visible_in_t1' => '1','t1_note' => 'Very Necessary
','visible_in_t2' => '1','t2_note' => 'Very Necessary','visible_in_t3' => '1','t3_note' => 'Very Necessary
','visible_in_t4' => '1','t4_note' => 'Very Necessary
','visible_in_t5' => '1','t5_note' => 'Very Necessary
','visible_in_t6' => '1','t6_note' => 'Very Necessary
','visible_in_t7' => '1','t7_note' => 'Very Necessary','visible_in_t8' => '1','t8_note' => 'Very Necessary','visible_in_t9' => '1','t9_note' => 'Very Necessary','created_at' => NULL,'updated_at' => NULL),
  array('id' => '24','requirement_name' => 'Library','visible_in_t1' => '0','t1_note' => '','visible_in_t2' => '1','t2_note' => 'Required','visible_in_t3' => '1','t3_note' => 'Required','visible_in_t4' => '1','t4_note' => 'Required','visible_in_t5' => '1','t5_note' => 'Required','visible_in_t6' => '1','t6_note' => 'Required','visible_in_t7' => '1','t7_note' => 'Required','visible_in_t8' => '1','t8_note' => 'Required','visible_in_t9' => '1','t9_note' => 'Required','created_at' => NULL,'updated_at' => NULL),
  array('id' => '25','requirement_name' => 'ICT Lab, and Art/music Studio','visible_in_t1' => '0','t1_note' => '','visible_in_t2' => '1','t2_note' => 'Necessary','visible_in_t3' => '1','t3_note' => 'A must
','visible_in_t4' => '1','t4_note' => 'a must
','visible_in_t5' => '1','t5_note' => 'Not a must
','visible_in_t6' => '1','t6_note' => 'Not a must
','visible_in_t7' => '1','t7_note' => 'Not a must','visible_in_t8' => '1','t8_note' => 'Not a must','visible_in_t9' => '1','t9_note' => 'Not a must','created_at' => NULL,'updated_at' => NULL),
  array('id' => '26','requirement_name' => 'Multi-purpose/ Examination Hall','visible_in_t1' => '0','t1_note' => '','visible_in_t2' => '1','t2_note' => 'A must
','visible_in_t3' => '1','t3_note' => ' A must
','visible_in_t4' => '1','t4_note' => 'a must
','visible_in_t5' => '1','t5_note' => 'Not a must
','visible_in_t6' => '1','t6_note' => 'Not a must','visible_in_t7' => '1','t7_note' => 'Not a must','visible_in_t8' => '1','t8_note' => 'Not a must','visible_in_t9' => '1','t9_note' => 'Not a must','created_at' => NULL,'updated_at' => NULL),
  array('id' => '27','requirement_name' => 'Canteen block','visible_in_t1' => '0','t1_note' => '','visible_in_t2' => '1','t2_note' => 'Not a Must','visible_in_t3' => '1','t3_note' => 'Not a Must','visible_in_t4' => '1','t4_note' => 'Not a Must','visible_in_t5' => '1','t5_note' => 'Not a Must
','visible_in_t6' => '1','t6_note' => 'Not a Must
','visible_in_t7' => '1','t7_note' => 'Not a Must','visible_in_t8' => '1','t8_note' => 'Not a Must','visible_in_t9' => '1','t9_note' => 'Not a Must','created_at' => NULL,'updated_at' => NULL)
);

    DB::table('t_requirements')->insert($t_requirements);
    

    }
}
