<?php
     require_once('lib/class.settings.php');
          $config = new ConfigMagik('config.ini', true, true);

     if(!empty($_GET) && strpos($_SERVER['HTTP_REFERER'],'settings')){
     if(!is_writeable('config.ini')){
          echo 'Could not write to config.ini';
     return false;
     }
//if there is no section parameter, we will not do anything.
     if(!isset($_GET['section'])){ 
          echo false; return false;
     } else {
     $section_name = $_GET['section'];
//Unset section so that we can use the GET array to manipulate the other parameters in a foreach loop.
               unset($_GET['section']); 
     if (!empty($_GET)){
          foreach ($_GET as $var => $value){
//Here we go through all $_GET variables and add the values one by one.
          $var = urlencode($var);
     try{
//Setting variable '. $var.' to '.$value.' on section '.$section_name;
               $config->set($var, $value, $section_name); 
     } catch(Exception $e) {
          echo 'Could not set variable '.$var.'<br>';
          echo $e;
          return false;
          }
          }
     }
     try{
//Get the entire section so that we can check the variables in it.
          $section = $config->get($section_name); 
          foreach ($section as $title=>$value){
//Here we go through all variables in the section and delete the ones that are in there but not in the $_GET variables
//Used mostly for deleting things.
     if(!isset($_GET[$title]) && ($config->get($title, $section_name) !== NULL)){
          $title = urlencode($title);
     try{
          $config = new ConfigMagik('config.ini', true, true);
          $config->removeKey($title, $section_name);//$title removed;
          $config->save();
     } catch(Exception $e){
          echo 'Unable to remove variable '.$title.' on section'.$section_name.'<br>';
          echo $e;
          }
     }
     }
     } catch(Exception $e){
          echo $e;
}
          echo true;
          return true;
     }
     } else {
?>
<!-- @author: Gustavo Hoirisch -->
<?php 
     include "nav.php" 
?>
<html>
     <head>
     <title>MediaFrontPage - Settings</title>
     <link href="css/front.css" rel="stylesheet" type="text/css">
     <link href="css/settings.css" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
     <script type="text/javascript" src="js/fisheye-iutil.min.js"></script>
     <script type="text/javascript" src="js/settings.js"></script>
     <link rel="stylesheet" type="text/css" href="css/widget.css">
     <link rel="stylesheet" type="text/css" href="css/static_widget.css">
     <link rel="stylesheet" type="text/css" href="css/footer.css">
     <script src="js/jquery.scrollTo-1.3.3-min.js" type="text/javascript"></script>
     <script src="js/jquery.localscroll-1.2.5-min.js" type="text/javascript"></script>
     <script src="js/jquery.serialScroll-1.2.1-min.js" type="text/javascript"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
     <link rel="stylesheet" type="text/css" href="css/jquery.pnotify.default.css">
     <link rel="stylesheet" type="text/css" href="css/UI/jquery-ui-1.8.14.custom.css">
     <script src="js/jquery.pnotify.js" type="text/javascript"></script>
     <script type='text/javascript' src='js/jquery.tipsy.js'></script>
     <link rel="stylesheet" href="css/tipsy.css" type="text/css" />
     <script type='text/javascript'>
     $(function() {
          $('input').tipsy({gravity: 'w', fade: true});
          $('img').tipsy({fade: true, gravity: 'n'});     
     });
     </script>
     </head>
<body style="overflow: hidden;"><center><br>
     <div style="width:98%; height:95%;" class="widget">
          <div class="widget-head">
               <h3>MediaFrontPage Settings</h3>
          </div>
<br />
     <div id="slider">
     <ul class="settings_nav">
               <li><a href="#ABOUT">About</a></li>
               <li><a href="#GLOBAL">Global</a></li>
               <li><a href="#PROGRAMS">Programs</a></li>
               <li><a href="#SEARCH">Search Widget</a></li>
               <li><a href="#TRAKT">Trakt.tv</a></li>
               <li><a href="#SHARETHETV">ShareThe.tv</a></li>               
               <li><a href="#NAVBAR">Nav Bar</a></li>
               <li><a href="#SUBNAV">Sub Nav</a></li>
               <li><a href="#HDD">Hard Drives</a></li>
               <li><a href="#MESSAGE">Message Widget</a></li>
               <li><a href="#SECURITY">Security</a></li>
               <li><a href="#MODS">CSS Mods</a></li>
               <li><a href="#RSS">RSS Feeds</a></li>
               <li><a href="#CONTROL">Control Widget</a></li>
          </ul>
<!-- element with overflow applied -->
     <div class="scroll">
<!-- the element that will be scrolled during the effect -->
          <div class="scrollContainer">
               <div id="ABOUT" class="panel">
                    <table cellpadding="5px">
                         <tr><img src="media/mfp.png" /></tr>
                              <tr>
                                   <td colspan="2"><p align="justify" style="width: 500px;padding-bottom: 20px;">MediaFrontPage is a HTPC Web Program Organiser. Your HTPC utilises a number of different programs to do certain tasks. What MediaFrontPage does is creates a user specific web page that will be your nerve centre for everything you will need. It was originally created by <a href="http://forum.xbmc.org/member.php?u=24286">Nick8888</a> and has had a fair share of contributors. If you'd like to contribute please consider making a donation or come and join us developing this great tool.</p>

<!-- At the time of writing this MFP is kept mainly by <a href="http://forum.xbmc.org/member.php?u=68433">DejaVu</a> and <a href="http://forum.xbmc.org/member.php?u=52241">gugahoi</a>. -->

                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                             <input type="hidden" name="cmd" value="_s-xclick">
                                             <input type="hidden" name="hosted_button_id" value="D2R8MBBL7EFRY">
                                             <input type="image" src="media/donate.png" value="Donate" border="0" name="submit" Title="You know you want to!" alt="PayPal - The safer, easier way to pay online.">
                                             <img border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                                        </form>by<br><img src="media/paypal.png">
                                   </td>
                              </tr><tr align="left">
                                   <td>Homepage</td><td><a href="http://mediafrontpage.net/">http://mediafrontpage.net/</a></td>
                              </tr><tr align="left">
                                   <td>Forum</td><td><a href="http://forum.xbmc.org/showthread.php?t=83304">http://forum.xbmc.org/showthread.php?t=83304</a></td>
                              </tr><tr align="left">
                                   <td>Source</td><td><a href="https://github.com/MediaFrontPage/mediafrontpage">https://github.com/MediaFrontPage/mediafrontpage</a></td>
                              </tr><tr align="left">
                                   <td>Bug Tracker</td><td><a href="http://mediafrontpage.lighthouseapp.com">http://mediafrontpage.lighthouseapp.com</a></td>
                              </tr><tr align="left">
                                   <td>Last Updated</td>
                                   <td>
                                   <?php
// THIS STILL BREAKS THE               require_once 'lib/github/Autoloader.php';
// SETTINGS PAGE                       Github_Autoloader::register();
//                                     $github = new Github_Client();
//                                     $repo = $github->getRepoApi()->show('DejaVu77', 'mediafrontpage', 'master');
//                                     echo $repo['pushed_at'];
                                   ?>
                                   </td>
                              </tr><tr>
                                   <td>
                                    <?php
// THIS STILL BREAKS THE               $commits = $github->getCommitApi()->getBranchCommits('DejaVu77', 'mediafrontpage', 'master');
// SETTINGS PAGE                       echo "Version </td><td>".$commits['0']['parents']['0']['id'];
//                                     if($commits['0']['parents']['0']['id'] !== $config->get('version','ADVANCED')){
//                                     echo "\t<a href='#' onclick='updateVersion();'>***UPDATE Available***</a>";
//                                     }
                                      ?>
                                   </td>
                             </tr>
                    </table>
               </div>                    

<!-- General/Global Settings -->
     <div id="GLOBAL" class="panel"><br><br>
          <h3>Global Settings</h3><img src="media/Programs/config.png">
               <table>
                    <tr>
                    <td colspan="2"><p align="justify" style="width: 500px;">Use Global Settings if all your programs are installed to one computer and/or if you use the same Username and Password throughout. Changing a setting for that particular program overides this page.</p>
                    </tr><tr>
                         <td align="right"><p>Global URL:</p></td>
                         <td align="left"><p><input type="checkbox"  Title="Tick to Enable" name="ENABLED" <?php echo ($config->get('ENABLED','GLOBAL')=="true")?'CHECKED':'';?>></td>
                    </tr><tr>
                         <td align="right"><p>Global IP:</p></td>
                         <td align="left"><p><input name="URL" size="20" Title="Insert IP Address or Network Name" value="<?php echo $config->get('URL','GLOBAL')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Global Authentication:</p></td>
                         <td align="left"><p><input type="checkbox" Title="Tick to Enable" name="AUTHENTICATION" <?php echo ($config->get('AUTHENTICATION','GLOBAL') == "true")?'CHECKED':'';?>></p></td>
                    </tr><tr>
                         <td align="right"><p>Global Username:</p></td>
                         <td align="left"><input name="USERNAME" Title="Insert your Global Username" size="20" value="<?php echo $config->get('USERNAME','GLOBAL')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Global Password:</p></td>
                         <td align="left"><input type="password" Title="Insert your Global Password" name="PASSWORD" size="20" value="<?php echo $config->get('PASSWORD','GLOBAL')?>"></td>
                    </tr>
               </table>
          <input type="button" Title="Save these Settings" value="Save" Title="Save these Settings" onClick="updateSettings('GLOBAL');" />
     </div>

<!-- Programs Settings -->
     <div id="PROGRAMS" class="panel"><br><br>
          <style type="text/css">
               .zoom { 
                    width: 32; padding: 0px; border: 0px; 
                    -webkit-transition: all .2s ease-out; 
                    -moz-transition: all .2s ease-out; 
                    -o-transition: all .2s ease-out; 
                    transition: all .2s ease-out; 
                    }
               .zoom:hover { 
                    -moz-transform: scale(1.5);
                    -webkit-transform: scale(1.5);
                    -o-transform: scale(1.5);
                    transform: scale(1.5);
                    }
          </style>
          <h3>Program Settings</h3>
               <table cellspacing="15px" cellpadding="15px">
                    <tr>
                         <td><div class="zoom"><a href="#XBMC" title="XBMC"><img src="media/Programs/XBMC.png" style="-moz-transform :scale(0.5);opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#SABNZBD" title="SabNZBd+"><img src="media/Programs/SabNZBd.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#SUBSONIC" title="Subsonic"><img src="media/Programs/SubSonic.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#SICKBEARD" title="Sick Beard"><img src="media/Programs/SickBeard.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#COUCHPOTATO" title="Couch Potato"><img src="media/Programs/CouchPotato.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#HEADPHONES" title="Headphones"><img src="media/Programs/HeadPhones.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#TRANSMISSION"title="Transmission"><img src="media/Programs/Transmission.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#UTORRENT" title="uTorrent"><img src="media/Programs/uTorrent.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td><div class="zoom"><a href="#JDOWNLOADER" title="jDownloader"><img src="media/Programs/JDownloader.png" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                    </tr><tr>
                         <td align="center" colspan="9" ><p align="justify" style="width: 500px;">Here you can specify a Username / Password / IP Address / Ports for each program individually. These settings <i>will</i> overide the Global Setting.</p></td>
                    </tr><tr>
                         <td align="center" colspan="9"><input type="button" value="Reverse Proxies" Title="Click here to Setup Reverse Proxies" onClick="window.location.href='#WEBROOT'" /></td>
                    </tr>
               </table>
     </div>

<!-- WEBROOT/REVERSE PROXY Settings -->
     <div id="WEBROOT" class="panel"><br><br>
          <h3>Webroot Settings</h3>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Reverse Proxy changes your programs locations from http://serverip:port to http://serverip/programs. These also need to be edited within some of the programs you use. Further information on this is available from <a href="http://mediafrontpage.lighthouseapp.com/projects/76089/apache-configuration-hints" target="_blank">MediaFrontPage's Development Site</a> as well as more information about what else can be used for.</p></td>
                    </tr><tr>
                         <td align="right"><p>Reverse Proxy:</p></td>
                         <td align="left"><p><input type="checkbox" Title="Tick To Enable" name="ENABLED" <?php echo ($config->get('ENABLED','WEBROOT')=="true")?'CHECKED':'';?>></p></td>
                    </tr><tr>
                         <td align="right"><p>XBMC:</p></td>
                         <td align="left"><input name="XBMC" size="20" Title="XBMC's IP Address" value="<?php echo $config->get('XBMC','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Sickbeard:</p></td>
                         <td align="left"><input name="SICKBEARD" size="20" Title="Sickbeard's IP Address" value="<?php echo $config->get('SICKBEARD','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Couch Potato:</p></td>
                         <td align="left"><input name="COUCHPOTATO" size="20" Title="CouchPotato's IP Address" value="<?php echo $config->get('COUCHPOTATO','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>SabNZBd+:</p></td>
                         <td align="left"><input name="SABNZBD" size="20" Title="SabNZBd+'s IP Address" value="<?php echo $config->get('SABNZBD','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>jDownloader:</p></td>
                         <td align="left"><input name="JDOWNLOADER" size="20" Title="jDownloaders's IP Address" value="<?php echo $config->get('JDOWNLOADER','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Transmission:</p></td>
                         <td align="left"><input name="TRANSMISSION" size="20" Title="Transmission's IP Address" value="<?php echo $config->get('TRANSMISSION','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>uTorrent:</p></td>
                         <td align="left"><input name="UTORRENT" size="20" Title="uTorrent's IP Address" value="<?php echo $config->get('UTORRENT','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Headphones:</p></td>
                         <td align="left"><input name="HEADPHONES" size="20" Title="HeadPhones's IP Address" value="<?php echo $config->get('HEADPHONES','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>SubSonic:</p></td>
                         <td align="left"><input name="SUBSONIC" size="20" Title="SubSonic's IP Address" value="<?php echo $config->get('SUBSONIC','WEBROOT')?>"></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('WEBROOT');" />
     </div>

<!-- WEBROOT/REVERSE PROXY Settings -->
<!-- XBMC Settings -->
     <div id="XBMC" class="panel"><br><br>
          <h3>XBMC Settings</h3><a href="http://www.xbmc.org" Title="Visit XBMC" target="_blank"><img src="media/Programs/XBMC.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">To connect with XBMC, you need to enable a few settings in Network Settings within XBMC.<i><br><br>Allow control of XBMC via HTTP<br>Allow programs on this system to control XBMC<br>Allow programs on other systems to control XBMC.</i></p></td>
                    </tr><tr>            
                         <td align="right"><p>XBMC IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your XBMC IP Address" size="20" value="<?php echo $config->get('IP','XBMC')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>XBMC Port:</p></td>
                         <td align="left"><input name="PORT" Title="Insert your XBMC Port" size="4" value="<?php echo $config->get('PORT','XBMC')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>XBMC Username:</p></td>
                         <td align="left"><input name="USERNAME" Title="Insert your XBMC Username" size="20" value="<?php echo $config->get('USERNAME','XBMC')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>XBMC Password:</p></td>
                         <td align="left"><input type="password" Title="Insert your XBMC Password" name="PASSWORD" size="20" value="<?php echo $config->get('PASSWORD','XBMC')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('XBMC');" />
     </div>
    
<!-- Sickbeard Settings -->
     <div id="SICKBEARD" class="panel"><br><br>
          <h3>SickBeard Settings</h3><a href="http://www.sickbeard.com" target="_blank" title="Visit SickBeard"><img src="media/Programs/SickBeard.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find SickBeard.</p></td>
                    </tr><tr>
                         <td align="right"><p>SickBeard IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your SickBeard IP Address" size="20" value="<?php echo $config->get('IP','SICKBEARD')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SickBeard Port:</p></td>
                         <td align="left"><input name="PORT" Title="Insert your SickBeard Port" size="4" value="<?php echo $config->get('PORT','SICKBEARD')?>" /></td>
                    </tr><tr>
                     <td align="right"><p>SickBeard Username:</p></td>
                         <td align="left"><input name="USERNAME" Title="Insert your SickBeard Username" size="20" value="<?php echo $config->get('USERNAME','SICKBEARD')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SickBeard Password:</p></td>
                    <td align="left"><input name="PASSWORD" Title="Insert your SickBeard Password" size="20" type="password" value="<?php echo $config->get('PASSWORD','SICKBEARD')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('SICKBEARD');" />
     </div>
    
<!-- Sickbeard Settings -->
     <div id="COUCHPOTATO" class="panel"><br><br>
          <h3>Couch Potato Settings</h3><a href="http://www.couchpotatoapp.com" target="_blank" title="Visit CouchPotato"><img src="media/Programs/CouchPotato.png"></a>
               <table>
                 <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find CouchPotato.</p></td>
                    </tr><tr>
                         <td align="right"><p>Couch Potato IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your CouchPotato IP Address" size="20" value="<?php echo $config->get('IP','COUCHPOTATO')?>" /></td>
                    </tr><tr>
                     <td align="right"><p>Couch Potato Port:</p></td>
                    <td align="left"><input name="PORT" Title="Insert your CouchPotato Port" size="4" value="<?php echo $config->get('PORT','COUCHPOTATO')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>Couch Potato Username:</p></td>
                    <td align="left"><input name="USERNAME" Title="Insert your CouchPotato Username" size="20" value="<?php echo $config->get('USERNAME','COUCHPOTATO')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>Couch Potato Password:</p></td>
                         <td align="left"><input name="PASSWORD" Title="Insert your CouchPotato Password" size="20" type="password" value="<?php echo $config->get('PASSWORD','COUCHPOTATO')?>" /></td>
                    </tr>
               </table>
          <input type="button"value="Back" onClick="history.go(-1)">
          <input type="button" Title="Save these Settings" value="Save" Title="Save these Settings" onClick="updateSettings('COUCHPOTATO');" />
     </div>
     
<!-- SabNZBd+ Settings -->    
     <div id="SABNZBD" class="panel"><br><br>
          <h3>SabNZBd+ Settings</h3><a href="http://sabnzbd.org" Title="Visit SabNZBd+" target="_blank"><img src="media/Programs/SabNZBd.png"></a>
               <table>
                 <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find SabNZBd+.</p></td>
                    </tr><tr>
                         <td align="right"><p>SabNZBd+ IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your SabNZBd+ IP Address" size="20" value="<?php echo $config->get('IP','SABNZBD')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SabNZBd+ Port:</p></td>
                         <td align="left"><input name="PORT" Title="Insert your SabNZBd+ Port" size="4" value="<?php echo $config->get('PORT','SABNZBD')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SabNZBd+ Username:</p></td>
                         <td align="left"><input name="USERNAME" Title="Insert your SabNZBd+ Username" size="20" value="<?php echo $config->get('USERNAME','SABNZBD')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SabNZBd+ Password:</p></td>
                         <td align="left"><input name="PASSWORD" Title="Insert your SabNZBd+ Password" size="20" type="password" value="<?php echo $config->get('PASSWORD','SABNZBD')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SabNZBd+ API:</p></td>
                         <td align="left"><input name="API" Title="Insert your SabNZBd+ API" type="password" size="40" value="<?php echo $config->get('API','SABNZBD')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('SABNZBD');" />
     </div>
     
<!-- Transmission Settings -->    
     <div id="TRANSMISSION" class="panel"><br><br>
          <h3>Transmission Settings</h3><a href="http://www.transmissionbt.com" target="_blank" Title="Visit Transmission"><img src="media/Programs/Transmission.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find Transmission.</p></td>
                    </tr><tr>
                         <td align="right"><p>Transmission IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your Transmission IP Address" size="20" value="<?php echo $config->get('IP','TRANSMISSION')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>Transmission Port:</p></td>
                         <td align="left"><input name="PORT" Title="Insert your Transmission Port" size="4" value="<?php echo $config->get('PORT','TRANSMISSION')?>" /></td>
                    </tr><tr>
                     <td align="right"><p>Transmission Username:</p></td>
                    <td align="left"><input name="USERNAME" Title="Insert your Transmission Username" size="20" value="<?php echo $config->get('USERNAME','TRANSMISSION')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>Transmission Password:</p></td>
                         <td align="left"><input name="PASSWORD" Title="Insert your Transmission Password" size="20" type="password" value="<?php echo $config->get('PASSWORD','TRANSMISSION')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('TRANSMISSION');" />
     </div>
     
<!-- uTorrent Settings -->
     <div id="UTORRENT" class="panel"><br><br>
          <h3>uTorrent Settings</h3><a href="http://www.utorrent.com" target="_blank" Title="Visit uTorrent"><img src="media/Programs/uTorrent.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find uTorrent.</p></td>
                    </tr><tr>
                         <td align="right"><p>uTorrent IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your uTorrent IP Address" size="20" value="<?php echo $config->get('IP','UTORRENT')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>uTorrent Port:</p></td>
                         <td align="left"><input name="PORT" Title="Insert your uTorrent Port" size="4" value="<?php echo $config->get('PORT','UTORRENT')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>uTorrent Username:</p></td>
                         <td align="left"><input name="USERNAME" Title="Insert your uTorrent Username" size="20" value="<?php echo $config->get('USERNAME','UTORRENT')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>uTorrent Password:</p></td>
                         <td align="left"><input name="PASSWORD" Title="Insert your uTorrent Password" size="20" type="password" value="<?php echo $config->get('PASSWORD','UTORRENT')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('UTORRENT');" />
     </div>
     
<!-- jDownloader Settings -->
     <div id="JDOWNLOADER" class="panel"><br><br>
          <h3>jDownloader Settings</h3><a href="http://jdownloader.org/home/index?s=lng_en" target="_blank" Title="Visit jDownloader"><img src="media/Programs/JDownloader.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find jDownloader.</p></td>
                    </tr><tr>
                         <td align="right"><p>jDownloader IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your jDownloader IP Address" size="20" value="<?php echo $config->get('IP','JDOWNLOADER')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>jDownloader Web Port:</p></td>
                     <td align="left"><input name="WEB_PORT" Title="Insert your jDownloader Web Port" size="4" value="<?php echo $config->get('WEB_PORT','JDOWNLOADER')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>jDownloader Remote Port:</p></td>
                         <td align="left"><input name="REMOTE_PORT" Title="Insert your jDownloader Remote Port" size="4" value="<?php echo $config->get('REMOTE_PORT','JDOWNLOADER')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>jDownloader Username:</p></td>
                    <td align="left"><input name="USERNAME" Title="Insert your jDownloader Username" size="20" value="<?php echo $config->get('USERNAME','JDOWNLOADER')?>" /></td>
                    </tr><tr>
                     <td align="right"><p>jDownloader Password:</p></td>
                    <td align="left"><input name="PASSWORD" Title="Insert your jDownloader Password" size="20" type="password" value="<?php echo $config->get('PASSWORD','JDOWNLOADER')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('JDOWNLOADER');" />
          </div>

<!-- Subsonic Settings -->
     <div id="SUBSONIC" class="panel"><br><br>
          <h3>SubSonic Settings</h3><a href="http://www.subsonic.org/pages/index.jsp" target="_blank" Title="Visit SubSonic"><img src="media/Programs/SubSonic.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find SubSonic.</p></td>
                    </tr><tr>
                         <td align="right"><p>SubSonic IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your SubSonic IP Address" size="20" value="<?php echo $config->get('IP','SUBSONIC')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SubSonic Port:</p></td>
                         <td align="left"><input name="PORT" Title="Insert your SubSonic Port" size="4" value="<?php echo $config->get('PORT','SUBSONIC')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SubSonic Username:</p></td>
                         <td align="left"><input name="USERNAME" Title="Insert your SubSonic Username" size="20" value="<?php echo $config->get('USERNAME','SUBSONIC')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>SubSonic Password:</p></td>
                         <td align="left"><input name="PASSWORD" Title="Insert your SubSonic Password" size="20" type="password" value="<?php echo $config->get('PASSWORD','SUBSONIC')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('SUBSONIC');" />
     </div>

<!-- Headphones Settings -->
    <div id="HEADPHONES" class="panel"><br><br>
          <h3>HeadPhones Settings</h3><a href="https://github.com/rembo10/headphones" target="_blank" Title="Visit HeadPhones"><img src="media/Programs/HeadPhones.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Enter the details where MediaFrontPage will find HeadPhones.</p></td>
                    </tr><tr>
                         <td align="right"><p>HeadPhones IP:</p></td>
                         <td align="left"><input name="IP" Title="Insert your HeadPhones IP Address"  size="20" value="<?php echo $config->get('IP','HEADPHONES')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>HeadPhones Port:</p></td>
                         <td align="left"><input name="PORT" Title="Insert your HeadPhones Port"  size="4" value="<?php echo $config->get('PORT','HEADPHONES')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>HeadPhones Username:</p></td>
                         <td align="left"><input name="USERNAME" Title="Insert your HeadPhones Username"  size="20" value="<?php echo $config->get('USERNAME','HEADPHONES')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>HeadPhones Password:</p></td>
                         <td align="left"><input name="PASSWORD" Title="Insert your HeadPhones Password"  size="20" type="password" value="<?php echo $config->get('PASSWORD','HEADPHONES')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('HEADPHONES');" />
     </div>                    
     
<!-- Search Settings -->
     <div id="SEARCH" class="panel"><br><br>
          <h3>Search Widget Settings</h3><img src="media/Programs/search.png">
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Here you can specify your prefered Search criteria.</p></td>
                    </tr><tr>
                         <td align="right"><p>Preferred Index Site:</p></td>
                         <td align="left"><p><input type="radio" Title="Tick to Enable NZBMatrix" name="preferred_site" value="1" <?php echo ($config->get('preferred_site','SEARCH')=="1")?'CHECKED':'';?> />NZB Matrix 
<input type="radio" Title="Tick to Enable NZB.SU" name="preferred_site" value="2" <?php echo ($config->get('preferred_site','SEARCH')=="2")?'CHECKED':'';?> />NZB.SU</p></td>
                    </tr><tr>
                         <td align="right"><p>Preferred Category:</p></td>
                         <td align="left"><input name="preferred_categories" Title="This denotes which Category you want to search by default from your Preferred Provider, this is likely to change to a Drop Box" size="20" value="<?php echo $config->get('preferred_categories','SEARCH')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>NZB Matrix Username:</p></td>
                         <td align="left"><input name="NZBMATRIX_USERNAME" Title="Insert your NZBMatrix Username" size="20" value="<?php echo $config->get('NZBMATRIX_USERNAME','SEARCH')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>NZB Matrix API:</p></td>
                         <td align="left"><input name="NZBMATRIX_API" Title="Insert your NZBMatrix API" type="password" size="40" value="<?php echo $config->get('NZBMATRIX_API','SEARCH')?>" /><a href="http://nzbmatrix.com/account.php"><img src="media/question.png" height="20px"></a></td>
                    </tr><tr>
                         <td align="right"><p>NZB.SU API:</p></td>
                         <td align="left"><Input name="NZBSU_API" Title="Insert your NZB.SU API" type="password" size="40" value="<?php echo $config->get('NZBSU_API','SEARCH')?>" /><a href="http://nzb.su/profile"><img src="media/question.png" height="20px"></a></td>
                    </tr><tr>
                     <td align="right"><p>NZB.SU Download Code:</p></td>
                         <td align="left"><input name="NZB_DL" Title="Insert your NZB.SU Download Code" type="password" size="40" value="<?php echo $config->get('NZB_DL','SEARCH')?>" /><a href="http://nzb.su/rss"><img src="media/question.png" height="20px"></a></td>
                    </tr>
               </table>
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('SEARCH');" />
     </div>

<!-- Search Settings -->
     <div id="TRAKT" class="panel"><br><br>
          <h3>Trakt.tv Settings</h3><a href="http://www.trakt.tv" target="_blank" Title="Visit TrakT"><img src="media/Programs/Trakt.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Here you can specify your trakt.tv details.</p></td>
                    </tr><tr>
                         <td align="right"><p>trakt Username:</p></td>
                         <td align="left"><input name="TRAKT_USERNAME" Title="Insert your trakt.tv Username" size="20" value="<?php echo $config->get('TRAKT_USERNAME','TRAKT')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>trakt Password:</p></td>
                         <td align="left"><input name="TRAKT_PASSWORD" Title="Insert your trakt.tv Password" type="password" size="20" value="<?php echo $config->get('TRAKT_PASSWORD','TRAKT')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>trakt API:</p></td>
                    <td align="left"><input name="TRAKT_API" type="password" Title="Insert your trakt.tv API"  ize="40" value="<?php echo $config->get('TRAKT_API','TRAKT')?>" /><a href="http://trakt.tv/settings/api"><img src="media/question.png" height="20px"></a></td>
                    </tr>
               </table>
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('TRAKT');" />
     </div>

<!-- ShareThe.TV Settings -->
     <div id="SHARETHETV" class="panel"><br><br>
          <h3>ShareThe.TV Settings</h3><a href="http://www.sharethe.tv" target="_blank" Title="Visit ShareThe.TV"><img src="media/Programs/ShareTheTV.png"></a>
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Here you can specify your ShareThe.TV details.</p></td>
                    </tr><tr>
                         <td align="right"><p>ShareThe.TV Username:</td>
                         <td align="left"><input name="SHARETHETV_USERNAME" Title="Insert your ShareThe.TV Username" size="20" value="<?php echo $config->get('SHARETHETV_USERNAME','SHARETHETV')?>" />&nbsp;&nbsp;<font size='1'>Must be all lowercase.</font></td>
                    </tr><tr>
                         <td align="right"><p>ShareThe.TV Password:</p></td>
                         <td align="left"><input name="SHARETHETV_PASSWORD" Title="Insert your ShareThe.TV Password" type="password" size="20" value="<?php echo $config->get('SHARETHETV_PASSWORD','SHARETHETV')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('SHARETHETV');" />
     </div>                    
     
<!-- Navigation Bar Settings -->                   
     <div id="NAVBAR" class="panel"><br><br>
          <h3>Navigation Links</h3>
               <table id='table_nav'>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Here are the Navigation Links you see at the top of your page. You can add or remove them depending on the programs you use. All the programs MFP supports are loaded by default, unfortunately, no new programs can be added manually. To request a program to be supported by MediaFrontPage, make a request at <a href="http://forum.xbmc.org/showthread.php?t=83304" target="_blank">MediaFrontPage's Support Forum</a>.</p></td>
                    </tr><tr>
                         <td>Title</td>
                         <td>URL</td>
                    </tr>
<?php
          $x = $config->get('NAVBAR');
     foreach ($x as $title=>$url){
           echo "<tr>
                          <td><input size='13' Title='Navigation Label' name='TITLE' value='".str_ireplace('_', ' ', $title)."'/></td>
                         <td><input name='VALUE' Title='Navigation URL - programs.php?p= IS needed'  size='30' value='$url'/></td>
                </tr>";
          }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('nav', 13, 30);" />
          <input type="button" value="-" Title="Remove the Last Row" onClick="removeRowToTable('nav');" />
               <br />
               <br />
          <input type="button" value="Save" Title="Save these Settings" onClick="updateAlternative('NAVBAR');setTimeout(top.frames['nav'].location.reload(), 5000);" />
     </div>

<!-- Sub Navigation Settings -->
     <div id="SUBNAV" class="panel"><br><br>
          <h3>Sub Navigation Links</h3>
               <table id='table_subnav'>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Here are the Sub Navigation Links you see at the bottom of your page. You can add or remove any site you like. Simply give it a Title and a URL and it will show up on the Footer at the bottom of MediaFrontPage. At the moment, you cannot remove them at will, you can only remove the last entry.</p></td>
                    </tr><tr>
                         <td>Title</td>
                         <td>URL</td>
                    </tr>
<?php
           $x = $config->get('SUBNAV');
     foreach ($x as $title=>$url){
          echo "<tr>
                    <td><input size='13' Title='Sub Navigation Label' name='TITLE' value='".str_ireplace('_', ' ', $title)."'/></td>
                    <td><input name='VALUE' Title='Sub Navigation URL' size='30' value='$url'/></td>
                </tr>";
           }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('subnav', 13, 30);" />
          <input type="button" value="-" Title="Remove the Last Row" onClick="removeRowToTable('subnav');" />
               <br />
               <br />
          <input type="button" value="Save" Title="Save these Settings" onClick="updateAlternative('SUBNAV');setTimeout(top.frames['nav'].location.reload(), 5000);" />
     </div>
     
<!-- Hard Drive Settings -->
     <div id="HDD" class="panel"><br><br>
          <h3>Hard Drives Settings</h3>
               <table id='table_hdd'>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">This is the part of MediaFrontPage that finds your Hard Drives. It does not matter what system it is running on, but you need to know where your media is stored on your HDD's. Examples have been added to show you how to add your own. Remove them all and add your own.</p></td>
                    </tr><tr>
                         <td>Title</td>
                         <td>Path</td>
                    </tr>
<?php
          $x = $config->get('HDD');
     foreach ($x as $title=>$url){
          echo "<tr>
               <td><input size='20' Title='Hard Drive Title' name='TITLE' value='".str_ireplace('_', ' ', $title)."'/></td>
               <td><input name ='VALUE' Title='Direct Path to Hard Drive' size='20' value='$url'/></td>
               </tr>";
          }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('hdd', 20, 20);" />
          <input type="button" value="-" Title="Remove the Last Row" onClick="removeRowToTable('hdd');" />
               <br />
               <br />
          <input type="button" value="Save" Title="Save these Settings" onClick="updateAlternative('HDD');" />
     </div>
     
<!-- Search Settings -->
     <div id="MESSAGE" class="panel"><br><br>
          <h3>XBMC Instances for Message Widget</h3>
               <table id="table_msg">
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Do you have multiple instance of XBMC with different IP Addresses/Port Numbers. IE - The Kids room or Kitchen? If so, the Message Widget can send customized messages to these machine. IE - "Turn it off" or "Cup of Coffee please".</p></td>
                    </tr><tr>
                         <td>Title</td>
                         <td>URL</td>
                    </tr>
<?php
          $x = $config->get('MESSAGE');
     foreach ($x as $title=>$url){
          echo "<tr>
               <td><input size='10' Title='XBMC Name' name='TITLE' value='".str_ireplace('_', ' ', $title)."'/></td>
               <td><input size='40' Title='XBMC IP Address & Port' name='VALUE' value='$url'/></td>
               </tr>";
          }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('msg', 10, 40);" />
          <input type="button" value="-" Title="Remove the Last Row" onClick="removeRowToTable('msg');" />
               <br />
               <br />
          <input type="button" value="Save" Title="Save these Settings" onClick="updateAlternative('MESSAGE');" />
     </div>
     
<!-- Security Settings -->
     <div id="SECURITY" class="panel"><br><br>
          <h3>Security Settings</h3>
               <table>
                    <tr>
                         <td align="center" colspan="2"><p align="justify" style="width: 500px;">Worried someone could mess up your settings or interfere with your MediaFrontPage?</p></td>
                    </tr><tr>
                         <td align="right"><p>MediaFrontPage Authentication:</p></td>
                         <td align="left"><p><input type="checkbox" Title="Tick to Enable" name="PASSWORD_PROTECTED" <?php echo ($config->get('PASSWORD_PROTECTED','SECURITY') == "true")?'CHECKED':'';?> /></p></td>
                    </tr><tr>
                         <td align="right"><p>MediaFrontPage Username:</p></td>
                         <td align="left"><input name="USERNAME" size="20" Title="Insert your MediaFrontPage Username" value="<?php echo $config->get('USERNAME','SECURITY')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>MediaFrontPage Password:</p></td>
                         <td align="left"><input name="PASSWORD" size="20" Title="Insert your MediaFrontPage Password" type="password" value="<?php echo $config->get('PASSWORD','SECURITY')?>" /></td>
                    </tr><tr>
                         <td align="right"><p>MediaFrontPage Secured with API:</p></td>
                         <td align="left"><p><input type="checkbox" Title="Tick to Enable" name="mfpsecured" <?php echo ($config->get('mfpsecured','SECURITY') == "true")?'CHECKED':''; ?>></p></td>
                    </tr><tr>
                         <td align="right"><p>MediaFrontPage API Key:</p></td>
                         <td align="left"><input name="mfpapikey" Title="Type an API for MediaFrontPage - You can make this up" type="password" size="20" value="<?php echo $config->get('mfpapikey','SECURITY')?>" /></td>
                    </tr>
               </table>
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('SECURITY');" />
     </div>

<!-- CSS Modification Settings -->
     <div id="MODS" class="panel"><br><br>
               <h3>CSS Modifications:</h3>
                         <table border="0" cellpadding="0" cellspacing="10">
                              <tr>
                                   <td align="center" colspan="4"><p align="justify" style="width: 500px;">These are 'user created' CSS modifications submitted by some of our users. These change mainly the look and colors of MediaFrontPage. If your confident enough with CSS and want to contribute your own modification, submit it to us on the <a href="http://forum.xbmc.org/showthread.php?t=83304" target="_blank">MediaFrontPage Support Thread</a>.</p></td>
                              </tr><tr>
                                   <td><img class="widget" src="media/examples/lightheme.jpg" height="120px" /></td>
                                   <td><img class="widget" src="media/examples/hernadito.jpg" height="120px" /></td>
                                   <td><img class="widget" src="media/examples/dpickles.jpg" height="120px" /></td>
                                   <td><img src="media/examples/black_modern_glass.jpg" height="120" class="widget" /></td>
                              </tr><tr>
                                   <td><p><input Title="Tick to Enable Light Theme" type="radio" name="ENABLED" value="lighttheme" <?php echo ($config->get('ENABLED','MODS') == "lighttheme")?'CHECKED':'';?> />Light Theme</p></td>
                                   <td><p><input Title="Tick to Enable Hernandito Theme" type="radio" name="ENABLED" value="hernandito" <?php echo ($config->get('ENABLED','MODS') == "hernandito")?'CHECKED':''; ?> />Hernandito's Theme</p></td>
                                   <td><p><input Title="Tick to Enable DPickles Theme" type="radio" name="ENABLED" value="dpickles" <?php echo ($config->get('ENABLED','MODS') == "dpickles")?'CHECKED':'';?> />DPickles Theme</p></td>
                                   <td><p><input Title="Tick to Enable Black Modern Glass Theme" type="radio" name="ENABLED" value="black_modern_glass" <?php echo ($config->get('ENABLED','MODS') == "black_modern_glass")?'CHECKED':'';?> />Black Modern Glass Theme</p></td>
                              </tr><tr>
                                   <td><img src="media/examples/space6.jpg" height="120" class="widget" /></td>
                                   <td><img class="widget" src="media/examples/minimal-posters.jpg" height="120px" /></td>
                                   <td><img class="widget" src="media/examples/minimal-banners.jpg" height="120px" /></td>
                                   <td><img src="media/examples/original.jpg" height="120" class="widget" /></td>
                              </tr><tr>
                                   <td><p><input Title="Tick to Enable Space 6 Theme" type="radio" name="ENABLED" value="space6" <?php echo ($config->get('ENABLED','MODS') == "space6")?'CHECKED':'';?> />Space 6 Theme</p></td>
                                   <td><p><input Title="Tick to Enable Coming Episodes Minimal POSTER Theme" type="radio" name="ENABLED" value="comingepisodes-minimal-poster" <?php echo ($config->get('ENABLED','MODS') == "comingepisodes-minimal-poster")?'CHECKED':'';?> />Minimal Posters</p></td>
                                   <td><p><input Title="Tick to Enable Coming Episodes Minimal BANNER Theme" type="radio" name="ENABLED" value="comingepisodes-minimal-banner" <?php echo ($config->get('ENABLED','MODS') == "comingepisodes-minimal-banner")?'CHECKED':'';?> />Minimal Banners</p></td>
                                   <td><p><input Title="Tick to Disable all Themes" type="radio" name="ENABLED" value="" <?php echo ($config->get('ENABLED','MODS') == "")?'CHECKED':''; ?> />OFF</p></td>
                              </tr><tr>
                                   <td>&nbsp;</td>
                            <td colspan="2"><p><input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('MODS');" /></p></td>
                                   <td>&nbsp;</td>
                              </tr>
                         </table>
          </div>

<!-- RSS Settings -->
     <div id="RSS" class="panel"><br><br>
          <h3>RSS Feeds</h3>
               <table id="table_rss">
                              <tr>
                                   <td align="center" colspan="2"><p align="justify" style="width: 500px;">We also added an RSS Feed from the most popular NZB Sites so you can instantly grab an NZB from their Feeds and load it straight to SabNZBd+ with no other user intervention. The default/shown RSS is the Repository of MediaFrontPage so End Users can keep up with new commits as they happen.</p></td>
                              </tr><tr>
                         <td>Title</td>
                         <td>URL</td>
                    </tr>
<?php
          $x = $config->get('RSS');
     foreach ($x as $title=>$url){
          echo "<tr>
                    <td><input size='40' Title='RSS Site Name' name='TITLE' value='".urldecode(str_ireplace('_', ' ', $title))."'/></td>
                    <td><input size='80' Title='Direct RSS Feed URL' name='VALUE' value='$url'/></td>
               </tr>";
               }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('rss', 40, 80);" />
          <input type="button" value="-" Title="Remove the Last Row" onClick="removeRowToTable('rss');" />
               <br />
               <br />
          <input type="button" value="Save" Title="Save these Settings" onClick="updateAlternative('RSS');" />
     </div>
     
<!-- Control Settings -->    
    <div id="CONTROL" class="panel"><br><br>
          <h3>Control XBMC Settings</h3>
               <table id="table_control">
                    <tr>
                         <td align="center" colspan="2"><p align="justify" style="width: 500px;">These commands are JSON API controls that directly communicate with the computer that MediaFrontPage is installed on. They can be removed, but as of yet, no more exist to add.</p></td>
                    </tr><tr>
                         <td>Title</td>
                         <td>URL</td>
                    </tr>
<?php
          $x = $config->get('CONTROL');
     foreach ($x as $title=>$url){
          echo "<tr>
                    <td><input size='40' Title='Control Label' name='TITLE' value='".urldecode(str_ireplace('_', ' ', $title))."'/></td>
                    <td><input size='80' Title='Control Function' name='VALUE' value='$url'/></td>
               </tr>";
               }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('control', 40, 80);" />
          <input type="button" value="-" Title="Remove the Last Row" onClick="removeRowToTable('control');" />
               <br />
               <br />
          <input type="button" value="Save" Title="Save these Settings" onClick="updateAlternative('CONTROL');" />
     </div>
     </div>
</div>
</div>
</div>
</center>
<?php 
}
     include "footer.php";
?>
</body>
</html>