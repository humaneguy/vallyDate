<?php

namespace App\Services\PayStackService;

class Bvn
{
	public function resolveBvn($bvnNumber)
	{
		return $this->fetchBvn($bvnNumber);
	}

	private function fetchBvn($bvnNumber)
	{
		 $curl = curl_init();

		  curl_setopt_array($curl, array(

	     CURLOPT_URL => "https://api.paystack.co/bank/resolve_bvn/".$bvnNumber,

	     CURLOPT_RETURNTRANSFER => true,

	     CURLOPT_ENCODING => "",

	    CURLOPT_MAXREDIRS => 10,

	    CURLOPT_TIMEOUT => 30,

	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

	    CURLOPT_CUSTOMREQUEST => "GET",

	    CURLOPT_HTTPHEADER => array(

	     "Authorization: Bearer ". config('paystack.secret_key'),

	     "Cache-Control: no-cache",

	    ),

	  ));


	  $response = curl_exec($curl);

	  $err = curl_error($curl);

	  curl_close($curl);

	  if ( $err ) 
	  {
	    abort(503);
	  } 
	  else 
	  {
	    return json_decode($response);
	  }
	  
	}
}
