<?php
	
namespace LetApps\App\Fragments;
class Video_Fragment
{
	public function start()
	{
		/*
		$oView = View();
		$oHttp = Http();
		$oModelApiYT = Model('app.api_youtube');
		$mCodeVideo = $oHttp->getParam('video');
		

		
		// Obtener videos de la lista
		$mParts = "id,snippet,statistics";
		$sRoute = "https://www.googleapis.com/youtube/v3/videos";
		$aParams = [
			'key' => Config('video.youtube_key'),
			'part' => $mParts,
			'id' => $mCodeVideo
		];
		$aResults = $oModelApiYT->getApi($sRoute, $aParams);
		if(count($aResults['items']) == 0){ Router()->goToPage('app', ['video' => 'XyQ8p12QGuY']); }
		$aVideo = $aResults['items'][0];
		
		
		// Share Twitter
		$aVideo['aShare']['aTwitter']['text'] = urlencode(" @letphp - Te invita a ver el video - ". $aVideo['snippet']['title']);
		$aVideo['aShare']['aTwitter']['url'] = "https://youtu.be/".$aVideo['id']; //"https://docs.letphp.run";
		
		// Share Facebook
		$aVideo['aShare']['aFb']['app_id'] = 3766612823354831;
		$aVideo['aShare']['aFb']['display'] = "popup";
		$aVideo['aShare']['aFb']['href'] = "https://youtu.be/".$aVideo['id'];
		// Share Linkedin
		$aVideo['aShare']['aLn']['mini'] = true;
		$aVideo['aShare']['aLn']['url'] = "https://youtu.be/".$aVideo['id'];
		$aVideo['aShare']['aLn']['title'] = "f1";
		$aVideo['aShare']['aLn']['summary'] = "youtube";
		//$aVideo['aShare']['aLn']['url'] = "youtube";
		
		//d($aVideo);
		
		$aMeta = [
			'og:title' => $aVideo['snippet']['title'],
			'og:description' => $aVideo['snippet']['description'],
			'og:type' => 'article',
			'og:url' => "https://youtu.be/".$aVideo['id'],
			'og:image' => $aVideo['snippet']['thumbnails']['standard']['url']
		];
		
		$oView
		->setMeta($aMeta)
		->setValues([
			'aVideo' => $aVideo
		]);
		*/
		
	}
}	