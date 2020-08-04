<?php
	
namespace LetApps\App\Models;
class Api_Youtube_Model
{
	public function __construct()
	{
	}
	
	public function getApi(string $sRoute, array $aParams)
	{
		$aResult = Http()->sendRequestCURL($sRoute, $aParams, 'GET');
		$aResult = json_decode($aResult, true);
		//$aVideos = $aResult['items'];
		
		return $aResult;
	}
	
	
}