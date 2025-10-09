<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrvInsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 

/* `edoproje_medu`.`prv_ins_categories` */
$prv_ins_categories = array(
  array('id' => '1','category_id' => '1','category_name' => 'E C C D E (Early Childhood Care Development & Education) only: ECCDE 1-3','category_min_length' => '100','category_min_breadth' => '100','category_app_fee' => '50000','visible' => '1','classes' => 'kg 1,kg 2,kg 3','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL),
  array('id' => '2','category_id' => '2','category_name' => 'Basic School Only (E C C D E 1-3 & Basic 1-9)','category_min_length' => '100','category_min_breadth' => '200','category_app_fee' => '150000','visible' => '1','classes' => 'basic 1,basic 2,basic 3,basic 4,basic 5,basic 6,basic 7,basic 8,basic 9','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL),
  array('id' => '3','category_id' => '3','category_name' => 'Secondary School Only : SS 1-3','category_min_length' => '100','category_min_breadth' => '200','category_app_fee' => '50000','visible' => '1','classes' => 'ss1, ss2','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL),
  array('id' => '4','category_id' => '4','category_name' => 'Basic & Secondary School Only (E C C D E 1-3, Basic 1-9 & SS 1-3)','category_min_length' => '100','category_min_breadth' => '200','category_app_fee' => '200000','visible' => '1','classes' => 'class 1','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL),
  array('id' => '5','category_id' => '5','category_name' => 'Technical School only (Voc. 1-3)','category_min_length' => '100','category_min_breadth' => '200','category_app_fee' => '50000','visible' => '1','classes' => 'class 1','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL),
  array('id' => '6','category_id' => '6','category_name' => 'Adult Education School','category_min_length' => '100','category_min_breadth' => '100','category_app_fee' => '25000','visible' => '1','classes' => 'class 1','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL),
  array('id' => '7','category_id' => '7','category_name' => 'Lecture Centre Only','category_min_length' => '100','category_min_breadth' => '100','category_app_fee' => '50000','visible' => '1','classes' => 'class 1','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL),
  array('id' => '8','category_id' => '8','category_name' => 'Special School only','category_min_length' => '100','category_min_breadth' => '100','category_app_fee' => '25000','visible' => '1','classes' => 'class 1','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-09-20 09:42:22','deleted_at' => NULL),
  array('id' => '9','category_id' => '9','category_name' => 'Trade Learning Centre','category_min_length' => '100','category_min_breadth' => '100','category_app_fee' => '25000','visible' => '1','classes' => 'class 2','created_at' => '2022-09-20 09:42:22','updated_at' => '2022-03-09 09:48:49','deleted_at' => NULL)
);

    DB::table('prv_ins_categories')->insert($prv_ins_categories);
    
    }
}
