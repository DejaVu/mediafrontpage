<?php
$mobilelayout = array(
					"Library" => "wXBMCLibrary",
					//"Remote" => "wRemote",
					"Playing" => "wNowPlaying",

//DEPRECEATED					"Upcoming" => "wComingEpisodes",

					"Control" => "wControl",
					"SABnzbd" => "wSabnzbd",
					"RSS" => "wRSS",
					"Drives" => "wHardDrives"
				);
$mobilefunction["wXBMCLibrary"] = "executeVideo(\"m\", \$action, \$breadcrumb, \$params);";
$mobilefunction["wNowPlaying"] = "displayNowPlaying(\"index.php\");";

//DEPRECEATED
//$mobilefunction["wComingEpisodes"] = "displayComingSoon();";

$mobilefunction["wControl"] = "widgetControl(\"index.php\", true);";
$mobilefunction["wSabnzbd"]	= "sabStatus();";
$mobilefunction["wRSS"]	= "widgetRSS(\"index.php\");";
$mobilefunction["wHardDrives"] = "widgetHardDrives();";
?>