<?php
 /*
 *//**
 * Tool Functions Here
 */

function getSize($bytes = 0)
{
	if($bytes < 1024)
	{
		return $bytes."B";
	}
	$kb = $bytes/1024;
	if($kb < 1024)
		return substr("{$kb}",0,strpos("{$kb}",".")+3)."K";
	$mb = $kb/1024;
	if($mb < 1024)
		return substr("{$mb}",0,strpos("{$mb}",".")+3)."M";
	$gb = $mb/1024;
		return substr("{$gb}",0,strpos("{$gb}",".")+3)."G";
	
	
}
