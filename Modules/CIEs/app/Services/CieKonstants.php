<?php

namespace Modules\CIEs\Services;

//use Modules\CIEs\Services\CieKonstants;//getPhotoList
//CieKonstants.php

/**
 * 
 */
class CieKonstants
{
	
	function __construct()
	{
		# code...
	}

	public static function getPhotoList(){
		return [
            'Front view of the School with school gate',
            'classroom showing seating arrangement and white board',
            'Toilet facilities',
            'Laboratory (if available)'
        ];
	}
	public static function hasAtLeast3($u){
		$passed=[];
		$hasthem=CieKonstants::getCompulsoryPhotoList();
		foreach ($hasthem as $key => $it) {
			# code...
			$ins=$u[$it]??[];
			if(count($ins)>=1){
			//if(count($ins)>=3){
				$passed[]=1;
			}
		}
		if (count($passed)==count($hasthem)) {
			# code...
			return true;
		}
		return false;
	}
	public static function getCompulsoryPhotoList(){
		return [
            'Front view of the School with school gate',
            'classroom showing seating arrangement and white board',
            'Toilet facilities',
        ];
	}
}