<?php
require_once "config.php";
require "layout.php";

function which_section($layoutarray, $layoutfind) {
  foreach ($layoutarray as $layoutkey => $layoutvalue)
    foreach ($layoutvalue as $k => $v)
      if ($k == $layoutfind) return $layoutkey;
  return false;
}

function addUnique(array &$lasections, $laname, $lavalue, $lainto_section = '')
{
    $lalast_section = '';
    foreach ($lasections as $lasection_name => $lasection)
    {
        if (key_exists($laname, $lasection)) return false;
        $lalast_section = $lasection_name;
    }
    if (empty($lainto_section)) $lainto_section = $lalast_section;
    $lasections[$lainto_section][$laname] = $lavalue;
}

 
if ($wComingEpisodes)
{
    addUnique($arrLayout, 'wComingEpisodes', array(
                                           "title" => "Coming Episodes",
                                           "display" => ""
                                      ), 
        $wComingEpisodesSection);
}

if ($wXBMCLibrary)
{
    addUnique($arrLayout, 'wXBMCLibrary', array(
                                           "title" => "XBMC Library",
                                           "display" => ""
                                      ),
        $wXBMCLibrarySection);
}

if ($wControl)
{
    addUnique($arrLayout, 'wControl', array(
                                              "title" => "Control",
                                              "display" => ""
                                         ),
        $wControlSection);
}

if ($wRecentTV)
{
    addUnique($arrLayout, 'wRecentTV', array(
                                           "title" => "Recent TV",
                                           "display" => ""
                                      ),
        $wRecentTVSection);
}

if ($wRecentMovies)
{
    addUnique($arrLayout, 'wRecentMovies', array(
                                           "title" => "Recent Movies",
                                           "display" => ""
                                      ),
        $wRecentMoviesSection);
}

if ($wSearch)
{
    addUnique($arrLayout, 'wSearch', array(
                                           "title" => "Search",
                                           "display" => ""
                                      ),
        $wSearchSection);
}

if ($wRSS)
{
    addUnique($arrLayout, 'wRSS', array(
                                           "title" => "RSS",
                                           "display" => ""
                                      ),
        $wRSSSection);
}

if ($wHardDrives)
{
    addUnique($arrLayout, 'wHardDrives', array(
                                           "title" => "Hard Drives",
                                           "display" => ""
                                      ),
        $wHardDrivesSection);
}

if ($wNowPlaying)
{
    addUnique($arrLayout, 'wNowPlaying', array(
                                           "title" => "NowPlaying",
                                           "display" => ""
                                      ),
        $wNowPlayingSection);
}

if ($wTransmission)
{
    addUnique($arrLayout, 'wTransmission', array(
                                           "title" => "Transmission",
                                           "display" => ""
                                      ),
        $wTransmissionSection);
}

if ($wSabnzbd)
{
    addUnique($arrLayout, 'wSabnzbd', array(
                                           "title" => "Sabnzbd",
                                           "display" => ""
                                      ),
        $wSabnzbdSection);
}

if ($wMessage)
{
    addUnique($arrLayout, 'wMessage', array(
                                           "title" => "Message",
                                           "display" => ""
                                      ),
        $wMessageSection);
}

if ($wTrakt)
{
    addUnique($arrLayout, 'wTrakt', array(
                                           "title" => "Trakt",
                                           "display" => ""
                                      ),
        $wTraktSection);
}

if ($wSystem)
{
    addUnique($arrLayout, 'wSystem', array(
                                           "title" => "System",
                                           "display" => ""
                                      ),
        $wSystemSection);
}

if ($wUPS)
{
    addUnique($arrLayout, 'wUPS', array(
                                           "title" => "UPS",
                                           "display" => ""
                                      ),
        $wUPSSection);
}

$wComingEpisodessection = which_section($arrLayout, 'wComingEpisodes');
$wXBMCLibrarysection = which_section($arrLayout, 'wXBMCLibrary');
$wControlsection = which_section($arrLayout, 'wControl');
$wRecentTVsection = which_section($arrLayout, 'wRecentTV');
$wRecentMoviessection = which_section($arrLayout, 'wRecentMovies');
$wSearchsection = which_section($arrLayout, 'wSearch');
$wRSSsection = which_section($arrLayout, 'wRSS');
$wHardDrivessection = which_section($arrLayout, 'wHardDrives');
$wNowPlayingsection = which_section($arrLayout, 'wNowPlaying');
$wTransmissionsection = which_section($arrLayout, 'wTransmission');
$wSabnzbdsection = which_section($arrLayout, 'wSabnzbd');
$wMessagesection = which_section($arrLayout, 'wMessage');
$wTraktsection = which_section($arrLayout, 'wTrakt');
$wSystemsection = which_section($arrLayout, 'wSystem');
$wUPSsection = which_section($arrLayout, 'wUPS');

if ( $wComingEpisodes == "false" )
	{ 
	unset($arrLayout[$wComingEpisodessection]['wComingEpisodes']);
	}

if ( $wXBMCLibrary == "false" )
	{ 
	unset($arrLayout[$wXBMCLibrarysection]['wXBMCLibrary']);
	}

if ( $wControl == "false" )
	{ 
	unset($arrLayout[$wControlsection]['wControl']);
	}
	
if ( $wRecentTV == "false" )
	{ 
	unset($arrLayout[$wRecentTVsection]['wRecentTV']);
	}

if ( $wRecentMovies == "false" )
	{ 
	unset($arrLayout[$wRecentMoviessection]['wRecentMovies']);
	}

if ( $wSearch == "false" )
	{ 
	unset($arrLayout[$wSearchsection]['wSearch']);
	}
	
if ( $wRSS == "false" )
	{ 
	unset($arrLayout[$wRSSsection]['wRSS']);
	}
	
if ( $wHardDrives == "false" )
	{ 
	unset($arrLayout[$wHardDrivessection]['wHardDrives']);
	}
	
if ( $wNowPlaying == "false" )
	{ 
	unset($arrLayout[$wNowPlayingsection]['wNowPlaying']);
	}
	
if ( $wTransmission == "false" )
	{ 
	unset($arrLayout[$wTransmissionsection]['wTransmission']);
	}
	
if ( $wSabnzbd == "false" )
	{ 
	unset($arrLayout[$wSabnzbdsection]['wSabnzbd']);
	}
	
if ( $wMessage == "false" )
	{ 
	unset($arrLayout[$wMessagesection]['wMessage']);
	}
	
if ( $wTrakt == "false" )
	{ 
	unset($arrLayout[$wTraktsection]['wTrakt']);
	}
	
if ( $wSystem == "false" )
	{ 
	unset($arrLayout[$wSystemsection]['wSystem']);
	}
	
if ( $wUPS == "false" )
	{ 
	unset($arrLayout[$wUPSsection]['wUPS']);
	}
?>