<?php
/**
* This class helps to get video data by ID from Vimeo and print it on a page
* Created by Mila Daricheva
*/
class VideoData 
{
	private $apiLink,   // A Vimeo API link, an example is vimeo.com/api/v2/video/VIDEOID.xml
			$videoData, // A SimpleXMLElement Object created from XML which was pulled from Vimeo using API link  
			$DESCRIPTION_LENGTH = 300; // The length of description property
		
	// Constructor of the class
	function __construct($videoId){
		$this->apiLink = 'http://vimeo.com/api/v2/video/' . $videoId . '.xml';
		$this->getData();
	}
  
	// cURL helps to get data from Vimeo
	private function getData() {
		$curl = curl_init($this->apiLink);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		$this->videoData = simplexml_load_string(curl_exec($curl));
		curl_close($curl);
	}
	
	// Gets a video property by name
	public function getVideoProperty($videoProperty) {
		return $this->videoData->video->$videoProperty;
	}
	
	// Trancates a description to be shorter than the DESCRIPTION_LENGTH
	public function getShortDescription() {
		return preg_replace('/\s+?(\S+)?$/', '', substr($this->getVideoProperty('description'), 0, $this->DESCRIPTION_LENGTH)) . '...';
	}
	
	// Prints all properties of a video
	public function printAllProperties() {
		print '<pre>';
		print_r($this->videoData->video);
		print '</pre>';
	}
	
	// Prints video data in a specific layout 
	public function printVideoBlock() {	
		print	'<section class="videoBlock">
					<a class="thumb" target="_blank" href="' . $this->getVideoProperty('url') . '">
						<img alt="' . $this->getVideoProperty('title') . '" src="' . $this->getVideoProperty('thumbnail_medium') . '" />
					</a>	
					<div class="description">
						<h2>' . $this->getVideoProperty('title') . '</h2>
						<p>' . $this->getShortDescription() . '</p>
						<p><a target="_blank" href="' . $this->getVideoProperty('url') . '">Watch on Vimeo</a></p>
					</div>	
				</section>';
	}

}
