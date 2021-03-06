<?php

namespace App\Services\AppServices\Bvn;

use App\Helpers\String as NewString;

/**
 * Process Bvn after getting details from Paystack API
 */
trait ProcessesBvnDetails
{
	public static function isNameValid($bvnDetails) : bool
	{
		$name = self::getFullNameFromBvnDetails($bvnDetails);
		if ( auth()->user()->name === $name )
		{
			return true;
		}
		return false;
	}

	private static function getFullNameFromBvnDetails($bvnDetails) : string
	{
		$firstName = $bvnDetails->data->first_name;
		$lastName = $bvnDetails->data->last_name;

		return NewString::getFullName($firstName, $lastName);
	}
}
