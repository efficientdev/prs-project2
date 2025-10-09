<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    //php artisan db:seed --class=WardSeeder


    public function run(): void
    {
        $wards = [
            // Format: ['ward_id', 'lga_id', 'lga_name', 'ward_name', 'ward_no']
            [1, 1, 'AKOKO EDO', 'ENWAN/ATTE/IKPESHI/EGBIGELE', 'Ward 8'],
            [2, 1, 'AKOKO EDO', 'IBILLO/ EKPESA/ EKOR/ IKIRANILE/ OKE', 'Ward 4'],
            [3, 1, 'AKOKO EDO', 'IGARRA I', 'Ward 1'],
            [4, 1, 'AKOKO EDO', 'IGARRA II', 'Ward 2'],
            [5, 1, 'AKOKO EDO', 'IMOGA/ LAMPESE/ BEKUMA/ EKPE', 'Ward 3'],
            [6, 1, 'AKOKO EDO', 'MAKEKE/ OJAH/ DANGBALA/ OJIRAMI/ ANYAWOZA', 'Ward 5'],
            [7, 1, 'AKOKO EDO', 'OLOMA/ OKPE/ IJAJA/ KAKUMA/ ANYARA', 'Ward 6'],
            [8, 1, 'AKOKO EDO', 'OSOSO', 'Ward 10'],
            [9, 1, 'AKOKO EDO', 'SOMORIKA / OGBE / SASARO / ONUMU / ESHAWA / OGUGU IGBOSHI-AFE / IGBOSHI ELE / AIYEGUNLE', 'Ward 7'],
            [10, 1, 'AKOKO EDO', 'UNEMENEKHUA/AKPAMA/ AIYETORO/ EKPEDO/ ERHURUN/ UNEME OSU', 'Ward 9'],
            [11, 2, 'EGOR', 'EGOR', 'Ward 4'],
            [12, 2, 'EGOR', 'EVBAREKE', 'Ward 6'],
            // ... ✂️ Include all the rest of the entries ...
            [192, 18, 'UHUNMWODE', 'UMAGBAE SOUTH', 'Ward 6'],
        ];

        
            DB::table('wards')->insert([
    [
        'ward_id' => 1,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'ENWAN/ATTE/IKPESHI/EGBIGELE',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 2,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'IBILLO/ EKPESA/ EKOR/ IKIRANILE/ OKE',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 3,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'IGARRA I',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 4,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'IGARRA II',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 5,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'IMOGA/ LAMPESE/ BEKUMA/ EKPE',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 6,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'MAKEKE/ OJAH/ DANGBALA/ OJIRAMI/ ANYAWOZA',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 7,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'OLOMA/ OKPE/ IJAJA/ KAKUMA/ ANYARA',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 8,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'OSOSO',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 9,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'SOMORIKA / OGBE / SASARO / ONUMU / ESHAWA / OGUGU IGBOSHI-AFE / IGBOSHI ELE / AIYEGUNLE',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 10,
        'lga_id' => 1,
        'lga_name' => 'AKOKO EDO',
        'ward_name' => 'UNEMENEKHUA/AKPAMA/ AIYETORO/ EKPEDO/ ERHURUN/ UNEME OSU',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 11,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'EGOR',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 12,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'EVBAREKE',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 13,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'OGIDA/USE',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 14,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'OKHORO',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 15,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'OLIHA',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 16,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'OTUBU',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 17,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'UGBOWO',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 18,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'USELU I',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 19,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'USELU II',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 20,
        'lga_id' => 2,
        'lga_name' => 'EGOR',
        'ward_name' => 'UWELU',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 21,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'EWU I',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 22,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'EWU II',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 23,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'IKEKATO',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 24,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'OPOJI',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 25,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'OTORUWO I',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 26,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'OTORUWO II',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 27,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'UGBEGUN',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 28,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'UNEAH',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 29,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'UWESSAN I',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 30,
        'lga_id' => 3,
        'lga_name' => 'ESAN CENTRAL',
        'ward_name' => 'UWESSAN II',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 31,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'AMEDOKHIAN',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 32,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'ARUE',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 33,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'EFANDION',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 34,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'EGBELE',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 35,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'EWOYI',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 36,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'IDUMUOKOJIE',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 37,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'OBEIDU',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 38,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'UBIERUMU',
        'ward_no' => 'Ward 11'
    ],
    [
        'ward_id' => 39,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'UELEN/ OKUGBE',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 40,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'UWALOR',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 41,
        'lga_id' => 4,
        'lga_name' => 'ESAN NORTH EAST',
        'ward_name' => 'UZEA',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 42,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'EMU',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 43,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'EWATTO',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 44,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'EWOHIMI I',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 45,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'EWOHIMI II',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 46,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'ILLUSHI I',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 47,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'ILLUSHI II',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 48,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'OHORDUA',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 49,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'UBIAJA I',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 50,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'UBIAJA II',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 51,
        'lga_id' => 5,
        'lga_name' => 'ESAN SOUTH EAST',
        'ward_name' => 'UGBOHA',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 52,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'EGORO/IDOA/UKHUN',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 53,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'EMAUDO/ EGUARE/ EKPOMA',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 54,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'EMUHI/ UKPENU/ UJOELEN',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 55,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'IHUNMUDUMU/IDUMEBO/UKE/UJEMEN',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 56,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'ILLEH/EKOINE',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 57,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'IRUEKPEN',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 58,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'OGWA',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 59,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'UHIELE',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 60,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'UJIOGBA',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 61,
        'lga_id' => 6,
        'lga_name' => 'ESAN WEST',
        'ward_name' => 'UROHI',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 62,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'EKPERI I',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 63,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'EKPERI II',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 64,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'EKPERI III',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 65,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'FUGAR I',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 66,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'FUGAR II',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 67,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'FUGAR III',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 68,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'IRAOKHOR',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 69,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'OGBONA',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 70,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'SOUTH UNEME I',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 71,
        'lga_id' => 7,
        'lga_name' => 'ETSAKO CENTRAL',
        'ward_name' => 'SOUTH UNEME II',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 72,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'AGENEBODE',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 73,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'OKPEKPE',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 74,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'OKPELLA I',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 75,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'OKPELLA II',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 76,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'OKPELLA III',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 77,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'OKPELLA IV',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 78,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'THREE IBIES',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 79,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'WANNO I',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 80,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'WANNO II',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 81,
        'lga_id' => 8,
        'lga_name' => 'ETSAKO EAST',
        'ward_name' => 'WEPPA',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 82,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'ANWAIN',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 83,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'AUCHI',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 84,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'AUCHI III',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 85,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'AUCHI I',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 86,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'AUCHI II',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 87,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'AVIELE',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 88,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'JAGBE',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 89,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'SOUTH IBIE',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 90,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'UZAIRUE NORTH EAST',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 91,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'UZAIRUE NORTH WEST',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 92,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'UZAIRUE SOUTH EAST',
        'ward_no' => 'Ward 12'
    ],
    [
        'ward_id' => 93,
        'lga_id' => 9,
        'lga_name' => 'ETSAKO WEST',
        'ward_name' => 'UZAIRUE SOUTH WEST',
        'ward_no' => 'Ward 11'
    ],
    [
        'ward_id' => 94,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'EKEKHEN/IDUMU/OGO/EGBIKE',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 95,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'EKPON',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 96,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'EWOSSA',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 97,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'IDIGUN/ IDUMEDO',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 98,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'OKALO/ OKPUJIE',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 99,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'OWU/ OKUTA/ EGUARE EBELLE',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 100,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'UDO',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 101,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'UHE/IDUMUOGBO/IDUMUEKE',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 102,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'AFUDA/IDUMUOKA',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 103,
        'lga_id' => 10,
        'lga_name' => 'IGUEBEN',
        'ward_name' => 'AMAHOR/UGUN',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 104,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'ADUWAWA / EVBO MODU',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 105,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'GORRETTI',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 106,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'IDOGBO',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 107,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'IWOGBAN/UTEH',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 108,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'OBAYANTOR',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 109,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'OGBESON',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 110,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'OLOGBO',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 111,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'OREGBENI',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 112,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'ST. SAVIOUR',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 113,
        'lga_id' => 11,
        'lga_name' => 'IKPOBA OKHA',
        'ward_name' => 'UGBEKUN',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 114,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'GRA/ETETE',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 115,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'IBIWE/ IWEGIE/ UGBAGUE',
        'ward_no' => 'Ward 12'
    ],
    [
        'ward_id' => 116,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'IHOGBE/ ISEKHERE/ OREOGHENE/ IBIWE/ ICE ROAD',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 117,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'IKPEMA/EGUADASE',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 118,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'NEW BENIN I',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 119,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'NEW BENIN II',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 120,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'OGBE',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 121,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'OGBELAKA/ NEKPENEKPEN',
        'ward_no' => 'Ward 11'
    ],
    [
        'ward_id' => 122,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'OREDO',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 123,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'UNUERU/OGBOKA',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 124,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'URUBI/EVBIEMWEN/IWEHEN',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 125,
        'lga_id' => 12,
        'lga_name' => 'OREDO',
        'ward_name' => 'UZEBU',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 126,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'AIBIOKULA I',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 127,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'AIBIOKULA II',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 128,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'EVBOESI',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 129,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'IGBANKE EAST',
        'ward_no' => 'Ward 11'
    ],
    [
        'ward_id' => 130,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'IGBANKE WEST',
        'ward_no' => 'Ward 12'
    ],
    [
        'ward_id' => 131,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'IYOBA',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 132,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'UGBEKA',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 133,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'UGBOKO',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 134,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'UGU',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 135,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'UKPATO',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 136,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'URHONIGBE NORTH',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 137,
        'lga_id' => 13,
        'lga_name' => 'ORHIONMWON',
        'ward_name' => 'URHONIGBE SOUTH',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 138,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'ADOLOR',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 139,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'IGUOSHODIN',
        'ward_no' => 'Ward 12'
    ],
    [
        'ward_id' => 140,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'ISIUWA',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 141,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'ODUNA',
        'ward_no' => 'Ward 11'
    ],
    [
        'ward_id' => 142,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'OFUNMWEGBE',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 143,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'OGHEDE',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 144,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'OKADA EAST',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 145,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'OKADA WEST',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 146,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'OKOKHUO',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 147,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'OLUKU',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 148,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'UHEN',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 149,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'UHIERE',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 150,
        'lga_id' => 14,
        'lga_name' => 'OVIA NORTH EAST',
        'ward_name' => 'UTOKA',
        'ward_no' => 'Ward 13'
    ],
    [
        'ward_id' => 151,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'IGUOBAZUWA EAST',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 152,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'IGUOBAZUWA WEST',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 153,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'NIKOROGHA',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 154,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'OFUNAMA',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 155,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'ORA',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 156,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'SILUKO',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 157,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'UDO',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 158,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'UGBOGUI',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 159,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'UMAZA',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 160,
        'lga_id' => 15,
        'lga_name' => 'OVIA SOUTH WEST',
        'ward_name' => 'USEN',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 161,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'EMAI I',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 162,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'EMAI II',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 163,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'IGUE/IKAO',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 164,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'IHIEVBE I',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 165,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'IHIEVBE II',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 166,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'IVBIADAOBI',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 167,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'IVBIANION',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 168,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'OTUO I',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 169,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'OTUO II',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 170,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'UOKHA/AKE',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 171,
        'lga_id' => 16,
        'lga_name' => 'OWAN EAST',
        'ward_name' => 'WARRAKE',
        'ward_no' => 'Ward 11'
    ],
    [
        'ward_id' => 172,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'AVBIOSI',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 173,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'EMEORA/OKE',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 174,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'ERUERE',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 175,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'OKPUJE',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 176,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'OZALLA',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 177,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'SABONGIDA/ORA/OGBETURU',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 178,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'SOBE',
        'ward_no' => 'Ward 11'
    ],
    [
        'ward_id' => 179,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'UHONMORA',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 180,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'UKHUSE OSI',
        'ward_no' => 'Ward 6'
    ],
    [
        'ward_id' => 181,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'UZEBBA I',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 182,
        'lga_id' => 17,
        'lga_name' => 'OWAN WEST',
        'ward_name' => 'UZEBBA II',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 183,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'EGBEDE',
        'ward_no' => 'Ward 10'
    ],
    [
        'ward_id' => 184,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'EHOR',
        'ward_no' => 'Ward 1'
    ],
    [
        'ward_id' => 185,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'IGIEDUMA',
        'ward_no' => 'Ward 3'
    ],
    [
        'ward_id' => 186,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'IRHUE',
        'ward_no' => 'Ward 4'
    ],
    [
        'ward_id' => 187,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'ISI NORTH',
        'ward_no' => 'Ward 7'
    ],
    [
        'ward_id' => 188,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'ISI SOUTH',
        'ward_no' => 'Ward 8'
    ],
    [
        'ward_id' => 189,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'OHUAN',
        'ward_no' => 'Ward 9'
    ],
    [
        'ward_id' => 190,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'UHI',
        'ward_no' => 'Ward 2'
    ],
    [
        'ward_id' => 191,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'UMAGBAE NORTH',
        'ward_no' => 'Ward 5'
    ],
    [
        'ward_id' => 192,
        'lga_id' => 18,
        'lga_name' => 'UHUNMWODE',
        'ward_name' => 'UMAGBAE SOUTH',
        'ward_no' => 'Ward 6'
    ],
]);
        foreach ($wards as $ward) {
            /*DB::table('wards')->insert([
                'ward_id'   => $ward[0],
                'lga_id'    => $ward[1],
                'lga_name'  => $ward[2],
                'ward_name' => $ward[3],
                'ward_no'   => $ward[4],
                'created_at' => now(),
                'updated_at' => now(),
            ]);*/
        }
    }
}
