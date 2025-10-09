<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
use Spatie\Permission\Models\Role;
use App\Models\{Lga,City,SchoolSector};

class LgaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //UserRank


$lga = array(
  array('lga_id' => '1','lga_name' => 'Akoko Edo','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '2','lga_name' => 'Egor','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '3','lga_name' => 'Esan Central','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '4','lga_name' => 'Esan North East','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '5','lga_name' => 'Esan South East','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '6','lga_name' => 'Esan West','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '7','lga_name' => 'Etsako Central','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '8','lga_name' => 'Etsako East','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '9','lga_name' => 'Etsako West','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '10','lga_name' => 'Igueben','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '11','lga_name' => 'Ikpoba Okha','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '12','lga_name' => 'Oredo','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '13','lga_name' => 'Orhionmwon','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '14','lga_name' => 'Ovia North East','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '15','lga_name' => 'Ovia South West','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '16','lga_name' => 'Owan East','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '17','lga_name' => 'Owan West','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '18','lga_name' => 'Uhunmwonde','created_at' => NULL,'updated_at' => NULL),
  array('lga_id' => '54','lga_name' => 'unknown','created_at' => '2019-06-22 08:26:25','updated_at' => '2019-06-22 08:26:25')
);
        foreach ($lga as $roleName) {
            Lga::firstOrCreate([
            	'lga_id' => $roleName['lga_id'],
            	'lga_name' => $roleName['lga_name']
            ]); 
        }


/* `edoproje_medu`.`city` */
$city = array(
  array('city_id' => '1','city_name' => 'Afuze','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '2','city_name' => 'Agenebode','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '3','city_name' => 'Auchi','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '4','city_name' => 'Benin City','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '5','city_name' => 'Egor','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '6','city_name' => 'Ekpoma','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '7','city_name' => 'Emokweme','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '8','city_name' => 'Eso','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '9','city_name' => 'Ibillo','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '10','city_name' => 'Ibore','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '11','city_name' => 'Igarra','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '12','city_name' => 'Igodomigodo','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '13','city_name' => 'Igueben','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '14','city_name' => 'Iguododo','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '15','city_name' => 'Ihievbe','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '16','city_name' => 'Imiekuri','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '17','city_name' => 'Irrua','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '18','city_name' => 'Iyamho','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '19','city_name' => 'Jattu','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '20','city_name' => 'Obadan','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '21','city_name' => 'Ogwa','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '22','city_name' => 'Okpekpe','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '23','city_name' => 'Okpella','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '24','city_name' => 'Ososo','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '25','city_name' => 'Ubiaja','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '26','city_name' => 'Ugbokhare','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '27','city_name' => 'Ughoton','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '28','city_name' => 'Unuamen','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '29','city_name' => 'Uromi','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '30','city_name' => 'Uzebba','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '31','city_name' => 'Other','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '32','city_name' => 'Etike','created_at' => NULL,'updated_at' => NULL),
  array('city_id' => '34','city_name' => 'Ugbagu','created_at' => '2019-05-30 08:22:27','updated_at' => '2019-05-30 08:22:27'),
  array('city_id' => '35','city_name' => 'Edo','created_at' => '2019-06-14 09:28:25','updated_at' => '2019-06-14 09:28:25'),
  array('city_id' => '36','city_name' => 'Evboneka','created_at' => '2020-09-08 03:45:46','updated_at' => '2020-09-08 03:45:46'),
  array('city_id' => '37','city_name' => 'UHUNMWONDE','created_at' => '2020-11-18 20:36:44','updated_at' => '2020-11-18 20:36:44'),
  array('city_id' => '38','city_name' => 'Owan','created_at' => '2021-04-21 15:42:06','updated_at' => '2021-04-21 15:42:06'),
  array('city_id' => '39','city_name' => 'Ora','created_at' => '2021-04-26 18:41:27','updated_at' => '2021-04-26 18:41:27'),
  array('city_id' => '40','city_name' => 'Iyowa  Community','created_at' => '2021-04-26 18:41:27','updated_at' => '2021-04-26 18:41:27'),
  array('city_id' => '41','city_name' => 'Idunmwungha','created_at' => '2021-04-26 18:41:27','updated_at' => '2021-04-26 18:41:27'),
  array('city_id' => '42','city_name' => 'Ologbo','created_at' => '2021-05-10 13:58:46','updated_at' => '2021-05-10 13:58:46'),
  array('city_id' => '43','city_name' => 'Uhie','created_at' => '2021-05-10 13:58:46','updated_at' => '2021-05-10 13:58:46'),
  array('city_id' => '44','city_name' => 'egr','created_at' => '2022-12-02 13:14:58','updated_at' => '2022-12-02 13:14:58'),
  array('city_id' => '45','city_name' => 'akk','created_at' => '2022-12-02 13:29:10','updated_at' => '2022-12-02 13:29:10'),
  array('city_id' => '46','city_name' => 'USELU','created_at' => '2022-12-03 18:29:50','updated_at' => '2022-12-03 18:29:50'),
  array('city_id' => '47','city_name' => 'Uhen Town','created_at' => '2022-12-03 20:06:36','updated_at' => '2022-12-03 20:06:36'),
  array('city_id' => '48','city_name' => 'Ewohimi','created_at' => '2022-12-05 05:20:28','updated_at' => '2022-12-05 05:20:28'),
  array('city_id' => '49','city_name' => 'ssfvAS','created_at' => '2022-12-05 08:25:10','updated_at' => '2022-12-05 08:25:10'),
  array('city_id' => '50','city_name' => 'BENIN-CITY','created_at' => '2022-12-05 17:21:12','updated_at' => '2022-12-05 17:21:12'),
  array('city_id' => '51','city_name' => 'Etsako East','created_at' => '2022-12-07 17:57:21','updated_at' => '2022-12-07 17:57:21'),
  array('city_id' => '52','city_name' => 'Benn City','created_at' => '2022-12-09 22:27:48','updated_at' => '2022-12-09 22:27:48'),
  array('city_id' => '53','city_name' => 'FUGAR','created_at' => '2022-12-10 18:39:12','updated_at' => '2022-12-10 18:39:12'),
  array('city_id' => '54','city_name' => 'Benin City.','created_at' => '2022-12-14 03:55:37','updated_at' => '2022-12-14 03:55:37'),
  array('city_id' => '55','city_name' => 'Ekperi','created_at' => '2022-12-14 11:51:51','updated_at' => '2022-12-14 11:51:51'),
  array('city_id' => '56','city_name' => 'SABONGIDA ORA','created_at' => '2022-12-15 14:56:21','updated_at' => '2022-12-15 14:56:21'),
  array('city_id' => '57','city_name' => 'EDO STATE N','created_at' => '2022-12-15 22:04:50','updated_at' => '2022-12-15 22:04:50'),
  array('city_id' => '58','city_name' => 'Osomhegbe','created_at' => '2022-12-16 10:37:33','updated_at' => '2022-12-16 10:37:33'),
  array('city_id' => '59','city_name' => '09','created_at' => '2022-12-16 20:38:55','updated_at' => '2022-12-16 20:38:55'),
  array('city_id' => '60','city_name' => 'Binin City','created_at' => '2022-12-19 09:52:57','updated_at' => '2022-12-19 09:52:57'),
  array('city_id' => '61','city_name' => 'Orominyan','created_at' => '2022-12-19 17:28:04','updated_at' => '2022-12-19 17:28:04'),
  array('city_id' => '62','city_name' => 'Benign city','created_at' => '2022-12-19 18:22:32','updated_at' => '2022-12-19 18:22:32'),
  array('city_id' => '63','city_name' => 'Igbanke','created_at' => '2022-12-20 21:09:43','updated_at' => '2022-12-20 21:09:43'),
  array('city_id' => '64','city_name' => 'Ehor','created_at' => '2022-12-21 07:43:18','updated_at' => '2022-12-21 07:43:18'),
  array('city_id' => '65','city_name' => 'Udo Town','created_at' => '2022-12-21 09:12:21','updated_at' => '2022-12-21 09:12:21'),
  array('city_id' => '66','city_name' => 'Ogbona','created_at' => '2022-12-21 10:32:18','updated_at' => '2022-12-21 10:32:18'),
  array('city_id' => '67','city_name' => 'Ugbekpe-Ekperi','created_at' => '2022-12-22 11:56:39','updated_at' => '2022-12-22 11:56:39'),
  array('city_id' => '68','city_name' => 'Okokpon 2','created_at' => '2022-12-27 12:56:41','updated_at' => '2022-12-27 12:56:41'),
  array('city_id' => '69','city_name' => 'Owan East','created_at' => '2022-12-28 17:01:20','updated_at' => '2022-12-28 17:01:20'),
  array('city_id' => '70','city_name' => 'Oredo','created_at' => '2022-12-29 14:22:58','updated_at' => '2022-12-29 14:22:58'),
  array('city_id' => '71','city_name' => 'AFOKPELLA-OKPELLA','created_at' => '2022-12-30 13:08:36','updated_at' => '2022-12-30 13:08:36'),
  array('city_id' => '72','city_name' => 'Owan West','created_at' => '2023-05-08 15:43:41','updated_at' => '2023-05-08 15:43:41'),
  array('city_id' => '73','city_name' => 'Ovia North East','created_at' => '2023-05-11 16:43:55','updated_at' => '2023-05-11 16:43:55')
);
		foreach ($city as $roleName) {
            City::firstOrCreate([
            	'city_id' => $roleName['city_id'],
            	'city_name' => $roleName['city_name']
            ]); 
        } 

    $school_sectors = array(
  array('school_sector_id' => '1','school_sector_name' => 'public'),
  array('school_sector_id' => '2','school_sector_name' => 'private')
);
    foreach ($school_sectors as $roleName) {
            SchoolSector::firstOrCreate([
              'school_sector_id' => $roleName['school_sector_id'],
              'school_sector_name' => $roleName['school_sector_name']
            ]); 
        }
 
    }


}

