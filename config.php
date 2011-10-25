<?php
// include the class file
     require_once('lib/class.settings.php');

// create new ConfigMagik-Object
// Needed alternate paths for ajax based widgets to load appropriately therefore we go back recursively in directories
     $found = false;
     $path = 'config.ini';
     while(!$found){     
          if(file_exists($path)){ 
               $found = true;
               $Config = new ConfigMagik( $path, true, true);
               //echo '<script>alert("'.$path.'");</script>';
          }
          else{ $path= '../'.$path; }
}
//echo '<pre>';print_r($Config); echo '</pre>';

// Programs Section

     $GLOBAL_MACHINE      = filter_var($Config->get('ENABLED','GLOBAL'), FILTER_VALIDATE_BOOLEAN);
     $GLOBAL_USER_PASS    = filter_var($Config->get('AUTHENTICATION','GLOBAL'), FILTER_VALIDATE_BOOLEAN);
     $GLOBAL_IP           = $Config->get('URL','GLOBAL');
     $GLOBAL_USER         = $Config->get('USERNAME','GLOBAL');;
     $GLOBAL_PASS         = $Config->get('PASSWORD','GLOBAL');;

// Reverse Proxy

     $REVERSE_PROXY       = filter_var($Config->get('ENABLED','WEBROOT'), FILTER_VALIDATE_BOOLEAN);
     $XBMC_WEBROOT        = $Config->get('XBMC','WEBROOT');
     $SICKBEARD_WEBROOT   = $Config->get('SICKBEARD','WEBROOT');
     $COUCHPOTATO_WEBROOT = $Config->get('COUCHPOTATO','WEBROOT');
     $SABNZBD_WEBROOT     = $Config->get('SABNZBD','WEBROOT');
     $UTORRENT_WEBROOT    = $Config->get('UTORRENT','WEBROOT');
     $JDOWNLOADER_WEBROOT = $Config->get('JDOWNLOADER','WEBROOT');
     $TRANSMISSION_WEBROOT= $Config->get('TRANSMISSION','WEBROOT');
     $HEADPHONES_WEBROOT  = $Config->get('HEADPHONES','WEBROOT');
     $SUBSONIC_WEBROOT    = $Config->get('SUBSONIC','WEBROOT');
     $AUTOMOVIES_WEBROOT  = $Config->get('AUTOMOVIES','WEBROOT');

// XBMC Section

     $XBMC_IP             = $Config->get('IP','XBMC');
     $XBMC_PORT           = $Config->get('PORT','XBMC');
     $XBMC_USERNAME       = $Config->get('USERNAME','XBMC');
     $XBMC_PASS           = $Config->get('PASSWORD','XBMC');
          
// SickBeard Section

     $SICKBEARD_IP        = $Config->get('IP','SICKBEARD');
     $SICKBEARD_PORT      = $Config->get('PORT','SICKBEARD');
     $SICKBEARD_USERNAME  = $Config->get('USERNAME','SICKBEARD');
     $SICKBEARD_PASS      = $Config->get('PASSWORD','SICKBEARD');

// SABNZBD Section

     $SABNZBD_IP          = $Config->get('IP','SABNZBD');
     $SABNZBD_PORT        = $Config->get('PORT','SABNZBD');
     $SABNZBD_USERNAME    = $Config->get('USERNAME','SABNZBD');
     $SABNZBD_PASS        = $Config->get('PASSWORD','SABNZBD');
     $SABNZBD_API         = $Config->get('API','SABNZBD');

// CouchPotato Section

     $COUCHPOTATO_IP      = $Config->get('IP','COUCHPOTATO');
     $COUCHPOTATO_PORT    = $Config->get('PORT','COUCHPOTATO');
     $COUCHPOTATO_USERNAME= $Config->get('USERNAME','COUCHPOTATO');
     $COUCHPOTATO_PASS    = $Config->get('PASSWORD','COUCHPOTATO');

// CouchPotato Section

     $AUTOMOVIES_IP       = $Config->get('IP','AUTOMOVIES');
     $AUTOMOVIES_PORT     = $Config->get('PORT','AUTOMOVIES');
     $AUTOMOVIES_USERNAME = $Config->get('USERNAME','AUTOMOVIES');
     $AUTOMOVIES_PASS     = $Config->get('PASSWORD','AUTOMOVIES');

// uTorrent Section

     $uTORRENT_IP         = $Config->get('IP','UTORRENT');
     $uTORRENT_PORT       = $Config->get('PORT','UTORRENT');
     $uTORRENT_USERNAME   = $Config->get('USERNAME','UTORRENT');
     $uTORRENT_PASS       = $Config->get('PASSWORD','UTORRENT');

// jDownloader Section

     $JDOWNLOADER_IP         = $Config->get('IP','JDOWNLOADER');
     $JDOWNLOADER_REMOTEPORT = $Config->get('REMOTE_PORT','JDOWNLOADER');
     $JDOWNLOADER_WEBPORT    = $Config->get('WEB_PORT','JDOWNLOADER');
     $JDOWNLOADER_USERNAME   = $Config->get('USERNAME','JDOWNLOADER');
     $JDOWNLOADER_PASS       = $Config->get('PASSWORD','JDOWNLOADER');

// Transmission Section

     $TRANSMISSION_IP        = $Config->get('IP','TRANSMISSION');
     $TRANSMISSION_PORT      = $Config->get('PORT','TRANSMISSION');
     $TRANSMISSION_USERNAME  = $Config->get('USERNAME','TRANSMISSION');
     $TRANSMISSION_PASS      = $Config->get('PASSWORD','TRANSMISSION');
      
// SubSonic Section

     $SUBSONIC_IP            = $Config->get('IP','SUBSONIC');
     $SUBSONIC_PORT          = $Config->get('PORT','SUBSONIC');
     $SUBSONIC_USERNAME      = $Config->get('USERNAME','SUBSONIC');
     $SUBSONIC_PASS          = $Config->get('PASSWORD','SUBSONIC');
      
// HeadPhones Section
      
     $HEADPHONES_IP          = $Config->get('IP','HEADPHONES');
     $HEADPHONES_PORT        = $Config->get('PORT','HEADPHONES');
     $HEADPHONES_USERNAME    = $Config->get('USERNAME','HEADPHONES');
     $HEADPHONES_PASS        = $Config->get('PASSWORD','HEADPHONES');
      
// Builtin Authentication

     $AUTH_ON                = filter_var($Config->get('PASSWORD_PROTECTED','SECURITY'), FILTER_VALIDATE_BOOLEAN);;
     $AUTH_USERNAME          = $Config->get('USERNAME','SECURITY');
     $AUTH_PASS              = $Config->get('PASSWORD','SECURITY');

// SEARCH WIDGET

     $preferredSearch       = $Config->get('preferred_site','SEARCH');
     $preferredCategories   = $Config->get('preferred_categories','SEARCH');
     $NZBMATRIX_USERNAME    = $Config->get('NZBMATRIX_USERNAME','SEARCH');
     $NZBMATRIX_API         = $Config->get('NZBMATRIX_API','SEARCH');
     $NZBSU_API             = $Config->get('NZBSU_API','SEARCH');
     $NZB_DL                = $Config->get('NZB_DL','SEARCH');

// Site Widget

     $TRAKT_API             = $Config->get('TRAKT_API','TRAKT');
     $TRAKT_USERNAME        = $Config->get('TRAKT_USERNAME','TRAKT');
     $TRAKT_PASSWORD        = $Config->get('TRAKT_PASSWORD','TRAKT');
     $SHARETHETV_USERNAME   = $Config->get('SHARETHETV_USERNAME','SHARETHETV');
     $SHARETHETV_PASSWORD   = $Config->get('SHARETHETV_PASSWORD','SHARETHETV'); //NOT IMPLEMENTED YET, ADD FOR WHEN NEEDED.

/* Column Widths*/

     $width1 = $Config->get('WIDTH1','COLUMNS').'%';
     $width2 = $Config->get('WIDTH2','COLUMNS').'%';
     $width3 = $Config->get('WIDTH3','COLUMNS').'%';
     $width4 = $Config->get('WIDTH4','COLUMNS').'%';

/* Widgets On/Off */

     $wComingEpisodes = $Config->get('wComingEpisodes','WIDGETS_ON/OFF');
     $wXBMCLibrary = $Config->get('wXBMCLibrary','WIDGETS_ON/OFF');
     $wControl = $Config->get('wControl','WIDGETS_ON/OFF');
     $wRecentTV = $Config->get('wRecentTV','WIDGETS_ON/OFF');
     $wRecentMovies = $Config->get('wRecentMovies','WIDGETS_ON/OFF');
     $wSearch = $Config->get('wSearch','WIDGETS_ON/OFF');
     $wRSS = $Config->get('wRSS','WIDGETS_ON/OFF');
     $wHardDrives = $Config->get('wHardDrives','WIDGETS_ON/OFF');
     $wNowPlaying = $Config->get('wNowPlaying','WIDGETS_ON/OFF');
     $wTransmission = $Config->get('wTransmission','WIDGETS_ON/OFF');
     $wSabnzbd = $Config->get('wSabnzbd','WIDGETS_ON/OFF');
     $wMessage = $Config->get('wMessage','WIDGETS_ON/OFF');
     $wTrakt = $Config->get('wTrakt','WIDGETS_ON/OFF');
     $wSystem = $Config->get('wSystem','WIDGETS_ON/OFF');
     $wjDownloader = $Config->get('wjDownloader','WIDGETS_ON/OFF');
     $wUPS = $Config->get('wUPS','WIDGETS_ON/OFF');
     $wWatched = $Config->get('wWatched','WIDGETS_ON/OFF');

/* ComingEpisodes Slider Length */

     $scrollbarlength = $Config->get('SCROLLBARLENGTH','WIDGET_MODS').'%';

 // NavBar Section

          $navlink;
          $x = $Config->get('NAVBAR');
          if(!empty($x)){
              foreach ($x as $k=>$e){
                  $k = str_ireplace('_', ' ', $k);
                  $navlink["$k"]         = "$e";
                    }
                }

// SubNav Section

          $subnavlink;
          $x = $Config->get('SUBNAV');
          if(!empty($x)){
            foreach ($x as $k=>$e){
              if(isset($k) && $k != ''){
                $k = str_ireplace('_', ' ', $k);
                $subnavlink["$k"]         = "$e";
                }
              }
              }

// Control Section

          $shortcut;
          $x = $Config->get('CONTROL');
          $array;
          if(!empty($x)){
              foreach ($x as $k => $e){
                  parse_str($e, $array);
                  $k = str_ireplace('_', ' ', $k);
                  $shortcut[urldecode($k)] = $array;
                    }
          }

// Hard Drive Section

          $drive;
          $x = $Config->get('HDD');
          if(!empty($x)){
              foreach ($x as $k=>$e){
                  $k = str_ireplace('_', ' ', $k);
                  $drive["$k"] = "$e";
                          }
          }

// RSS Section

          $rssfeeds;
          $x = $Config->get('RSS');
          if(!empty($x)){
              foreach ($x as $k => $e){
                        parse_str($e, $array);
                        /*
                        $cat = (!empty($array['cat']))?$array['cat']:'';
                        $pp = (!empty($array['pp']))?$array['pp']:'';
                        $script = (!empty($array['script']))?$array['script']:'';
                        $priority = (!empty($array['priority']))?$array['priority']:'';
                        $type = (!empty($array['type']))?$array['type']:'';
                        */
                  $k = str_ireplace('_', ' ', $k);
                  $rssfeeds[urldecode($k)] = $array;
                          }
          }

// Custom Stylesheet Section

         $customStyleSheet = 'css/customcss/'.$Config->get('ENABLED','THEMES').'.css';

// Coming Episode Styles //

         $ceview = $Config->get('CEVIEW','WIDGET_MODS');

// Message Section

          $xbmcMessages;
          $x = $Config->get('MESSAGE');
          if(!empty($x)){
              foreach ($x as $k=>$e){
                  $k = str_ireplace('_', ' ', $k);
                  $xbmcMessages["$k"] = "$e";
                          }
          }

// Security

     $mfpsecured = filter_var($Config->get('mfpsecured','SECURITY'), FILTER_VALIDATE_BOOLEAN);
     $mfpapikey = $Config->get('mfpapikey','SECURITY');

//XBMC MySQL Connections EXPERIMENTAL!

                            //DO NOT USE YET//
//***********************************************************************************//
//     Set this if you use a centralised MySQL Database.                             //
//     Further information about this is available on the XBMC Forum and MFP Thread  //
//***********************************************************************************//
//                                                                                   //
//$xbmcdbconn = array(                                                               //
//          'video' => array(                                                        //
//               'dns' => 'mysql:host=hostname;dbname=videos',                       //
//               'username' => '',                                                   //
//               'password' => '',                                                   //
//               'options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")//
//          ),                                                                       //
//          'music' => array(                                                        //
//               'dns' => 'mysql:host=hostname;dbname=music',                        //
//               'username' => 'username',                                           //
//               'password' => 'password',                                           //
//               'options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")//
//          ),                                                                       //
//     );                                                                            //
//***********************************************************************************//

if($GLOBAL_MACHINE)
{
     //XBMC Global Settings//
     if(empty($XBMC_IP) && !empty($XBMC_PORT)){
          $XBMC_IP = $GLOBAL_IP;
     }
     //SickBeard Global Settings//
     if(empty($SICKBEARD_IP) && !empty($SICKBEARD_PORT)){
          $SICKBEARD_IP = $GLOBAL_IP;          
     }
     //SabNZBd+ Global Settings//
     if(empty($SABNZBD_IP) && !empty($SABNZBD_PORT)){
          $SABNZBD_IP = $GLOBAL_IP;
     }
     //CouchPotato Global Settings//
     if(empty($COUCHPOTATO_IP) && !empty($COUCHPOTATO_PORT)){
          $COUCHPOTATO_IP = $GLOBAL_IP;
     }
     //AutoMovies Global Settings//
     if(empty($AUTOMOVIES_IP) && !empty($AUTOMOVIES_PORT)){
          $AUTOMOVIES_IP = $GLOBAL_IP;
     }
     //uTorrent Global Settings//
     if(empty($uTORRENT_IP) && !empty($uTORRENT_PORT)){
          $uTORRENT_IP = $GLOBAL_IP;
     }
     //jDownloader Global Settings//
     if(empty($JDOWNLOADER_IP) && !empty($JDOWNLOADER_WEBPORT)){
          $JDOWNLOADER_IP = $GLOBAL_IP;
     }
     //Transmission Global Settings//
     if(empty($TRANSMISSION_IP) && !empty($TRANSMISSION_PORT)){
          $TRANSMISSION_IP = $GLOBAL_IP;
     }
     //SubSonic Global Settings//
     if(empty($SUBSONIC_IP) && !empty($SUBSONIC_PORT)){
          $SUBSONIC_IP = $GLOBAL_IP;
     }
     //HeadPhones Global Settings//
     if(empty($HEADPHONES_IP) && !empty($HEADPHONES_PORT)){
          $HEADPHONES_IP = $GLOBAL_IP;
     }
}
//Authentication Global Settings//
if(empty($AUTH_USERNAME)||empty($AUTH_PASS)){
  $AUTH_USERNAME = $GLOBAL_USER;
  $AUTH_PASS     = $GLOBAL_PASS;
}
if($GLOBAL_USER_PASS){
  if(empty($XBMC_USERNAME) && empty($XBMC_PASS)){
    $XBMC_USERNAME = $GLOBAL_USER;
    $XBMC_PASS     = $GLOBAL_PASS;
  }
  if(empty($TRANSMISSION_USERNAME) && empty($TRANSMISSION_PASS)){
    $TRANSMISSION_USERNAME = $GLOBAL_USER;
    $TRANSMISSION_PASS     = $GLOBAL_PASS;
  }
   if(empty($SUBSONIC_USERNAME) && empty($SUBSONIC_PASS)){
   $SUBSONIC_USERNAME = $GLOBAL_USER;
   $SUBSONIC_PASS     = $GLOBAL_PASS;
  }
  if(empty($JDOWNLOADER_USERNAME) && empty($JDOWNLOADER_PASS)){
    $JDOWNLOADER_USERNAME = $GLOBAL_USER;
    $JDOWNLOADER_PASS     = $GLOBAL_PASS;
  }
  if(empty($uTORRENT_USERNAME) && empty($uTORRENT_PASS)){
    $uTORRENT_USERNAME = $GLOBAL_USER;
    $uTORRENT_PASS     = $GLOBAL_PASS;
  }
  if(empty($COUCHPOTATO_USERNAME)||empty($COUCHPOTATO_PASS)){
    $COUCHPOTATO_USERNAME = $GLOBAL_USER;
    $COUCHPOTATO_PASS     = $GLOBAL_PASS;
  }
  if(empty($AUTOMOVIES_USERNAME)||empty($AUTOMOVIES_PASS)){
    $AUTOMOVIES_USERNAME = $GLOBAL_USER;
    $AUTOMOVIES_PASS     = $GLOBAL_PASS;
  }
  if(empty($SABNZBD_USERNAME) && empty($SABNZBD_PASS)){
    $SABNZBD_USERNAME = $GLOBAL_USER;
    $SABNZBD_PASS     = $GLOBAL_PASS;
  }
  if(empty($SICKBEARD_USERNAME) && empty($SICKBEARD_PASS)){
    $SICKBEARD_USERNAME = $GLOBAL_USER;
    $SICKBEARD_PASS     = $GLOBAL_PASS;
  }
  if(empty($SUBSONIC_USERNAME) && empty($SUBSONIC_PASS)){
    $SUBSONIC_USERNAME = $GLOBAL_USER;
    $SUBSONIC_PASS     = $GLOBAL_PASS;
  }
  if(empty($HEADPHONES_USERNAME) && empty($HEADPHONES_PASS)){
    $HEADPHONES_USERNAME = $GLOBAL_USER;
    $HEADPHONES_PASS     = $GLOBAL_PASS;
  }
}

$xbmclogin              = (!empty($XBMC_USERNAME)&&!empty($XBMC_PASS))?"$XBMC_USERNAME:$XBMC_PASS@":"";
$sickbeardlogin         = (!empty($SICKBEARD_USERNAME)&&!empty($SICKBEARD_PASS))?"$SICKBEARD_USERNAME:$SICKBEARD_PASS@":"";
$SABNZBDlogin           = (!empty($SABNZBD_USERNAME)&&!empty($SABNZBD_PASS))?"$SABNZBD_USERNAME:$SABNZBD_PASS@":"";
$COUCHPOTATOlogin       = (!empty($COUCHPOTATO_USERNAME)&&!empty($COUCHPOTATO_PASS))?"$COUCHPOTATO_USERNAME:$COUCHPOTATO_PASS@":"";
$AUTOMOVIESlogin       = (!empty($AUTOMOVIES_USERNAME)&&!empty($AUTOMOVIES_PASS))?"$AUTOMOVIES_USERNAME:$AUTOMOVIES_PASS@":"";
$uTorrentlogin          = (!empty($uTORRENT_USERNAME)&&!empty($uTORRENT_PASS))?"$uTORRENT_USERNAME:$uTORRENT_PASS@":"";
$TRANSMISSIONlogin      = (!empty($TRANSMISSION_USERNAME)&&!empty($TRANSMISSION_PASS))?"$TRANSMISSION_USERNAME:$TRANSMISSION_PASS@":"";
$SUBSONIClogin          = (!empty($SUBSONIC_USERNAME)&&!empty($SUBSONIC_PASS))?"user=$SUBSONIC_USERNAME&password=$SUBSONIC_PASS":"";
$JDOWNLOADERlogin       = (!empty($JDOWNLOADER_USERNAME)&&!empty($JDOWNLOADER_PASS))?"$JDOWNLOADER_USERNAME:$JDOWNLOADER_PASS@":"";
$HEADPHONESlogin        = (!empty($HEADPHONES_USERNAME)&&!empty($HEADPHONES_PASS))?"$HEADPHONES_USERNAME:$HEADPHONES_PASS@":"";
$transmission_admin     = $TRANSMISSION_USERNAME;
$transmission_pass      = $TRANSMISSION_PASS;     
$nzbusername            = $NZBMATRIX_USERNAME;
$nzbapi                 = $NZBMATRIX_API;
$nzbsuapi               = $NZBSU_API;
$nzbsudl                = $NZB_DL;
$sabapikey              = $SABNZBD_API;
$trakt_api              = $TRAKT_API;
$trakt_username         = $TRAKT_USERNAME;
$trakt_password         = $TRAKT_PASSWORD;
$authsecured            = $AUTH_ON;
$authusername           = $AUTH_USERNAME;
$authpassword           = $AUTH_PASS;

//   Reverse Proxy section    //
if($REVERSE_PROXY){
     if(!empty($XBMC_WEBROOT)){
          $xbmcjsonservice = 'http://'.$xbmclogin.$GLOBAL_IP.'/'.$XBMC_WEBROOT.'/jsonrpc';
          $xbmcimgpath     = 'http://'.$xbmclogin.$GLOBAL_IP.'/'.$XBMC_WEBROOT.'/vfs/';
     }
     if(!empty($SICKBEARD_WEBROOT)){
          $sickbeardcomingepisodes = 'http://'.$sickbeardlogin.$GLOBAL_IP.'/'.$SICKBEARD_WEBROOT.'/comingEpisodes';
          $sickbeardurl = 'http://'.$sickbeardlogin.$GLOBAL_IP.'/'.$SICKBEARD_WEBROOT.'/home/';
     }
     if(!empty($COUCHPOTATO_WEBROOT)){
          $cp_url = 'http://'.$COUCHPOTATOlogin.$GLOBAL_IP.'/'.$COUCHPOTATO_WEBROOT.'/';
     }
     if(!empty($AUTOMOVIES_WEBROOT)){
          $automovies_url = 'http://'.$AUTOMOVIESlogin.$GLOBAL_IP.'/'.$AUTOMOVIES_WEBROOT.'/';
     }
     if(!empty($UTORRENT_WEBROOT)){
          $utorrent_url = 'http://'.$uTorrentlogin.$GLOBAL_IP.'/'.$UTORRENT_WEBROOT.'/';
     }
     if(!empty($SABNZBD_WEBROOT)){
          $saburl = 'http://'.$SABNZBDlogin.$GLOBAL_IP.'/'.$SABNZBD_WEBROOT.'/';
     }
     if(!empty($TRANSMISSION_WEBROOT)){
          $transmission_url = 'http://'.$GLOBAL_IP.'/'.$TRANSMISSION_WEBROOT.'/rpc/';
          $transmission_web = 'http://'.$GLOBAL_IP.'/'.$TRANSMISSION_WEBROOT;
     }
     if(!empty($JDOWNLOADER_WEBROOT)){
          $jd_weburl = 'http://'.$JDOWNLOADERlogin.$GLOBAL_IP.'/'.$JDOWNLOADER_WEBROOT.'/';
     }
     if(!empty($HEADPHONES_WEBROOT)){
          $headphones_url = 'http://'.$GLOBAL_IP.'/'.$HEADPHONES_WEBROOT.'/';
     }
     if(!empty($SUBSONIC_WEBROOT)){
          $subsonic_url = 'http://'.$GLOBAL_IP.'/'.$SUBSONIC_WEBROOT.'/login.view?user=$SUBSONIC_USERNAME&password=$SUBSONIC_PASS';
     }
 } else {
   $xbmcjsonservice        = "http://$xbmclogin"."$XBMC_IP:$XBMC_PORT/jsonrpc";
   $xbmcimgpath            = "http://$xbmclogin"."$XBMC_IP:$XBMC_PORT/vfs";
   $sickbeardcomingepisodes= "http://$sickbeardlogin"."$SICKBEARD_IP:$SICKBEARD_PORT/comingEpisodes";
   $sickbeardurl           = "http://$sickbeardlogin"."$SICKBEARD_IP:$SICKBEARD_PORT/";
   $saburl                 = "http://$SABNZBDlogin"."$SABNZBD_IP:$SABNZBD_PORT/";
   $cp_url                 = "http://$COUCHPOTATOlogin"."$COUCHPOTATO_IP:$COUCHPOTATO_PORT/";
   $automovies_url         = "http://$AUTOMOVIESlogin"."$AUTOMOVIES_IP:$AUTOMOVIES_PORT/";
   $utorrent_url           = "http://$uTorrentlogin"."$uTORRENT_IP:$uTORRENT_PORT/gui/";
   $jd_url                 = "http://$JDOWNLOADERlogin"."$JDOWNLOADER_IP:$JDOWNLOADER_REMOTEPORT";
   $jd_weburl              = "http://$JDOWNLOADER_IP:$JDOWNLOADER_WEBPORT/";
   $transmission_url       = "http://$TRANSMISSION_IP:$TRANSMISSION_PORT/transmission/rpc/";     
   $transmission_web       = "http://$TRANSMISSIONlogin"."$TRANSMISSION_IP:$TRANSMISSION_PORT/transmission/web/";     
   $subsonic_url           = "http://$SUBSONIC_IP:$SUBSONIC_PORT/login.view?$SUBSONIClogin";
   $subsonic_check         = "http://$SUBSONIC_IP:$SUBSONIC_PORT/login.view";
   $headphones_url         = "http://$HEADPHONESlogin"."$HEADPHONES_IP:$HEADPHONES_PORT/";
}
if ($authsecured && session_id()=='') session_start();
?>