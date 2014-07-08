<?php

function instaFeed()

{
	
	// Instagram Authentication Variables. To Generate an access Token: 
	
	$userID = '545663';
	$accessToken = '545663.467ede5.df3b50f631b9455c9f3300d0909d9469';
	
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
	
	$instafeed = fetchData('https://api.instagram.com/v1/users/' . $userID .  '/media/recent/?access_token=' . $accessToken);
	$instafeed = json_decode($instafeed);
	
	// Build loop of photos
	
	$photos = array(); 
	
	foreach ( $instafeed->data as $ig ) {
		
		$photos[] =  '
			<a class="ig-photo" target="blank" href="' . $ig->link . '">
				<img src="' . $ig->images->low_resolution->url . '" alt="' . $ig->caption->text . '" width="100%" height="auto" />
			</a>';
		
	}
	
	foreach ($photos as $key => $val )
	
	{
		
		echo $val;
			
	}
	
	
}