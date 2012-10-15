<?php
/**
* This class helps to pull data from Vimeo
*/
class VimeoData 
{
	var $apiLink,   //Vimeo API link
		$videoData; // XML data for video from Vimeo
	
	function __construct($videoId){
		// API link, Example: vimeo.com/api/v2/video/49318684.xml
		$this->apiLink = 'http://vimeo.com/api/v2/video/' . $videoId . '.xml';
		$this->getData();
	}
  
	// cURL helps to pull data from Vimeo
	function getData() {
		$curl = curl_init($this->apiLink);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 20);
		$this->videoData = simplexml_load_string(curl_exec($curl));
		curl_close($curl);
	}
	
	function getVideoProperty($videoProperty) {
		return $this->videoData->video->$videoProperty;
	}

	function printVideoBlock() {	
		print	'<section class="videoBlock">
					<img alt="' . $this->getVideoProperty('title') . '" src="' . $this->getVideoProperty('thumbnail_medium') . '" />
					<h2>' . $this->getVideoProperty('title') . '</h2>
					<p>' . $this->getVideoProperty('description') . '</p>
				</section>';
	}
}
