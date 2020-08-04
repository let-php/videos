<?php
    
namespace LetApps\App\Controllers;

class Index_Controller
{
	public function start()
	{
		$oHttp = Http();	
		$oModelApiYT = Model('app.api_youtube');
		$mKey = Config('video.youtube_key');
		
		// Obtenemos la Lista de Reproducción
		$sRoute = "https://www.googleapis.com/youtube/v3/playlists";
		$mParts = "id,snippet";
		//$mChannelId = "UCYpp03XhlCcPYGhIvwU3sbg";
		$aParams = [
			'key' => $mKey,
			'part' => $mParts,
			'id' => "PLPSle5C-w0E-fX7LqrAxCEfbiK6_LHRfV",
			'maxResults' => 1
		];
		$aResults = $oModelApiYT->getApi($sRoute, $aParams);
		$aPlayList = $aResults['items'][0];
		$aSnippet = $aPlayList['snippet'];
		unset($aResults);
		unset($aParams);
		
		
		// Obtener videos de la lista
		$mParts = "id,snippet,statistics";
		$sRoute = "https://www.googleapis.com/youtube/v3/videos";
		$mCodeVideo = $oHttp->getParam('video');
		$aParams = [
			'key' => $mKey,
			'part' => $mParts,
			'id' => $mCodeVideo
		];
		$aResults = $oModelApiYT->getApi($sRoute, $aParams);
		if(count($aResults['items']) == 0){ Router()->goToPage('app', ['video' => 'XyQ8p12QGuY']); }
		$aVideo = $aResults['items'][0];
		
		// Share Twitter
		$aVideo['aShare']['aTwitter']['text'] = urlencode(" @letphp - Te invita a ver el video - ". $aVideo['snippet']['title']);
		$aVideo['aShare']['aTwitter']['url'] = "https://youtu.be/".$aVideo['id']; 
		
		// Share Facebook
		$aVideo['aShare']['aFb']['app_id'] = 3766612823354831;
		$aVideo['aShare']['aFb']['display'] = "popup";
		$aVideo['aShare']['aFb']['href'] = "https://youtu.be/".$aVideo['id'];
		// Share Linkedin
		$aVideo['aShare']['aLn']['mini'] = true;
		$aVideo['aShare']['aLn']['url'] = "https://youtu.be/".$aVideo['id'];
		$aVideo['aShare']['aLn']['title'] = "f1";
		$aVideo['aShare']['aLn']['summary'] = "youtube";
		
		
		$aMeta = [
			'viewport' => 'width=device-width, initial-scale=1.0',
			'author' => 'Rodrigo Hernández Ortiz',
			'keywords' => 'videos, letphp, roni, letcode, letphp, tutorial',
			'description' => $aSnippet['description'],
			'og:title' => $aVideo['snippet']['title'],
			'og:description' => $aVideo['snippet']['description'],
			'og:type' => 'article',
			'og:url' => "https://youtu.be/".$aVideo['id'],
			'og:image' => $aVideo['snippet']['thumbnails']['standard']['url'],
			'twitter:card' => 'summary',
			'twitter:site' => '@letphp',
			'twitter:creator' => 'Rodrigo Hernández Ortiz',
		];
		
		View()
		->setJScript([
			'<script src="https://unpkg.com/jam-icons/js/jam.min.js"></script>',
			'videos.js' => 'app_app'
		])
		->setCss([
			'videos.css' => 'app@app',
			'mobile.css' => 'app_app'
		])
		->setTitle($aSnippet['title'])
		->setMeta($aMeta)
		->setValues([
			'aVideo' => $aVideo,
			'aSnippet' => $aSnippet,
			'mCodeVideo' => $mCodeVideo
		]);
		
		/*$mParts = "id,snippet,contentDetails,status";
		$sRoute = "https://www.googleapis.com/youtube/v3/playlistItems";
		$aParams = [
			'key' => 'AIzaSyDWeBzQ_IpjcwicgE1RKMvqYDr5cUjaBRI',
			'part' => $mParts,
			'playlistId' => "PLPSle5C-w0E-fX7LqrAxCEfbiK6_LHRfV"
		];
		$aResult = $oHttp->sendRequestCURL($sRoute, $aParams, 'GET');
		$aResult = json_decode($aResult, true);
		$aVideos = $aResult['items'];
		d($aResult);*/
		
	}
}
    
?>
