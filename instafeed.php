<?php

function instafeed()

{
	
	// Instagram Authentication Variables. To Generate an access Token: 
	
	$userID = '';
	$accessToken = '';
	$count = 5;
	
	
	// Use curl to fetch the data from instagram
	
	function fetchData($url)
	
	{
	
		  $curl = curl_init();
		  curl_setopt($curl, CURLOPT_URL, $url);
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($curl, CURLOPT_TIMEOUT, 20);
		  $result = curl_exec($curl);
		  curl_close($curl); 
		  return $result;
	
	}
	
	// Decode fetched data
	//tags, location, comments, filter, created_time, link, likes, images[low_res, thumbnail, standard_res], users in photo
	
	$instafeed = fetchData('https://api.instagram.com/v1/users/' . $userID .  '/media/recent/?access_token=' . $accessToken . '&count=' . $count );
	$instafeed = json_decode($instafeed);
	
	
	// Build loop of photos
	
	$photos = array(); 
	
	foreach ( $instafeed->data as $ig ) {
		
		$photos[] =  '
			<a class="ig-photo" target="blank" href="' . $ig->link . '">
				<img src="' . $ig->images->standard_resolution->url . '" alt="' . $ig->caption->text . '" />
			</a>';
		
	}
	
	foreach ($photos as $key => $val )
	
	{
		
		echo $val;
			
	}
	
	
}