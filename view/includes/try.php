<?php 
class whois
{
	function test($domain)
	{
		// prepare vars
		$r         = "taken";             // request type: domain availability
		$apikey    = "0e2149cece60181ccce638dccfa81c09";        // your API key

		// API call
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,
				"http://api.whoapi.com/?apikey=0e2149cece60181ccce638dccfa81c09&r=whois&domain=$domain");
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
		$output  = json_decode(curl_exec($ch), true);
		curl_close($ch);
		if($output['status'] == 0)
		{
			$dt1 = date_create($output['date_created']);
			$dt2 = date_create($output['date_expires']);
			$diff = date_diff($dt1,$dt2);
			$age = $diff->format("%Y years");
			return $op = array ( 
				"status" => $output['status_desc'],
				"created_date" => $output['date_created'],
				"expiry" => $output['date_expires'],
				"registrar" => $output['whois_name'],
				"domain" => $output['domain_name'],
				"age" => $age
			);
		}
		else
		{
			// show error
			echo $output['status_desc'];
		}
	}
}
?>