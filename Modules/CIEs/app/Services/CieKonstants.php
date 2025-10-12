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
}