<?php
	
namespace LetApps\App\Fragments;
class Videos_Fragment
{
	public function start()
	{
		$oModelApiYT = Model('app.api_youtube');
		$mKey = "AIzaSyDWeBzQ_IpjcwicgE1RKMvqYDr5cUjaBRI";
		
		// Obtenemos la Lista de Reproducción
		$sRoute = "https://www.googleapis.com/youtube/v3/playlists";
		$mParts = "id,snippet,status";
		$mChannelId = "UCYpp03XhlCcPYGhIvwU3sbg";
		$aParams = [
			'key' => $mKey,
			'part' => $mParts,
			'id' => "PLPSle5C-w0E-fX7LqrAxCEfbiK6_LHRfV"
		];
		$aResults = $oModelApiYT->getApi($sRoute, $aParams);
		$aPlayList = $aResults['items'][0];
		$aSnippet = $aPlayList['snippet'];
		unset($aResults);
		unset($aParams);
		
		// Obtener videos de la lista
		$mParts = "id,snippet,contentDetails,status";
		$sRoute = "https://www.googleapis.com/youtube/v3/playlistItems";
		$aParams = [
			'key' => $mKey,
			'part' => $mParts,
			'playlistId' => $aPlayList['id'],
			'maxResults' => 20
		];
		$aResults = $oModelApiYT->getApi($sRoute, $aParams);
		$aItems = $aResults['items'];
		$aVideos = [];
		foreach($aItems AS $iKey => $aItem )
		{
			$aVideos[$iKey]['id'] = $aItem['contentDetails']['videoId'];
			
			$aTitle = explode('[', $aItem['snippet']['title']);
			
			$aVideos[$iKey]['position'] = $aItem['snippet']['position'];
			$aVideos[$iKey]['title'] = '#'.(intval($aItem['snippet']['position']) + 1).' '.str_replace(']', '', $aTitle[1]); //$aItem['snippet']['title'];
			$aVideos[$iKey]['descripcion'] = Input()->cleanStr($aItem['snippet']['description'], 100). '...';
			$aImage = $aItem['snippet']['thumbnails']['maxres'];
			$iDivisor = 30;
			$iWidth = intval($aImage['width'])/$iDivisor;
			$iHeight = intval($aImage['height'])/$iDivisor;
			$aVideos[$iKey]['image'] = $aImage['url'];
			$aVideos[$iKey]['image_width'] = $iWidth;
			$aVideos[$iKey]['image_height'] = $iHeight;			
			$aVideos[$iKey]['link'] = Router()->createRoute('app', ['video' => $aVideos[$iKey]['id'], Input()->parseTitle($aItem['snippet']['title']) ]);
		}
		
		
		
		View()
		->setValues([
			'aVideos' => $aVideos
		]);
		
		
		
	}
}