<?php
     require 'lib/class.settings.php';require 'lib/class.github.php';
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
     <link rel="stylesheet" type="text/css" href="css/front.css">
     <link rel="stylesheet" type="text/css" href="css/settings.css">
     <link rel="stylesheet" type="text/css" href="css/widget.php">
     <link rel="stylesheet" type="text/css" href="css/static_widget.css">
     <link rel="stylesheet" type="text/css" href="css/footer.css">
     <link rel="stylesheet" type="text/css" href="css/jquery.pnotify.default.css">
     <link rel="stylesheet" type="text/css" href="css/UI/jquery-ui-1.8.14.custom.css">
     <link rel="stylesheet" type="text/css" href="css/tipsy.css"/>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
     <script type="text/javascript" src="js/fisheye-iutil.min.js"></script>
     <script type="text/javascript" src="js/settings.js"></script>
     <script type="text/javascript" src="js/jquery.scrollTo-1.3.3-min.js"></script>
     <script type="text/javascript" src="js/jquery.localscroll-1.2.5-min.js"></script>
     <script type="text/javascript" src="js/jquery.serialScroll-1.2.1-min.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
     <script src="js/jquery.pnotify.js" type="text/javascript"></script>
     <script type='text/javascript' src='js/jquery.tipsy.js'></script>
     <script type='text/javascript'>
     $(function() {
          $('input').tipsy({gravity: 'w', fade: true});
          $('img').tipsy({fade: true, gravity: 's'});     
          $('a').tipsy({fade: true, gravity: 's'});     
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
               <li><a href="#THEMES">CSS Mods</a></li>
               <li><a href="#COLUMNS">Widgets</a></li>
               <li><a href="#HDD">Hard Drives</a></li>
               <li><a href="#MESSAGE">Message Widget</a></li>
               <li><a href="#SECURITY">Security</a></li>
               <li><a href="#RSS">RSS Feeds</a></li>
               <li><a href="#CONTROL">Control Widget</a></li>
          </ul>
<!-- element with overflow applied -->
     <div class="scroll">
<!-- the element that will be scrolled during the effect -->
          <div class="scrollContainer">
               <div id="ABOUT" class="panel">
                    <table>
                       <h3>About MediaFrontPage</h3>
                         <tr><img src="media/mfp.png" width="64" height="64"/></tr>
                              <tr>
                                   <td colspan="2"><p align="justify" style="width: 500px;padding-bottom: 20px;">MediaFrontPage is a HTPC Web Program Organiser. Your HTPC utilises a number of different programs to do certain tasks. What MediaFrontPage does is creates a user specific web page that will be your nerve centre for everything you will need. It was originally created by <a href="programs.php?p=http://forum.xbmc.org/member.php?u=24286&title=Nick8888's XBMC Profile" title="Nick8888's XBMC Profile">Nick8888</a> and has had a fair share of contributors. If you'd like to contribute please consider making a donation or come and join us developing this great tool. <br><br>At the time of writing, MediaFrontPage is maintained mainly by <a href="programs.php?p=http://forum.xbmc.org/member.php?u=68433&title=DejaVu's XBMC Profile" title="DejaVu's XBMC Profile">DejaVu</a> and <a href="programs.php?p=http://forum.xbmc.org/member.php?u=52241&title=Gugahois's XBMC Profile" title="Gugahois's XBMC Profile">Gugahoi</a>.</p>

                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                             <input type="hidden" name="cmd" value="_s-xclick">
                                             <input type="hidden" name="hosted_button_id" value="D2R8MBBL7EFRY">
                                             <input type="image" src="media/donate.png" value="Donate" border="0" name="submit" Title="You know you want to!" alt="PayPal - The safer, easier way to pay online.">
                                             <img border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                                        </form>by<br><img src="media/paypal.png">
                                   </td>
                              </tr><tr align="left">
                                   <td>Homepage</td><td><a href="programs.php?p=http://mediafrontpage.net&title=MediaFrontPage">http://mediafrontpage.net/</a></td>
                              </tr><tr align="left">
                                   <td>Forum</td><td><a href="programs.php?p=http://forum.xbmc.org/showthread.php?t=83304&title=MFP Support">http://forum.xbmc.org/showthread.php?t=83304</a></td>
                              </tr><tr align="left">
                                   <td>Source</td><td><a href="programs.php?p=https://github.com/MediaFrontPage/mediafrontpage&title=Official MediaFrontPage GitHub">https://github.com/MediaFrontPage/mediafrontpage</a></td>
                              </tr><tr align="left">
                                   <td>Bug Tracker</td><td><a href="programs.php?p=http://mediafrontpage.lighthouseapp.com&title=MediaFrontPage Development">http://mediafrontpage.lighthouseapp.com</a></td>
                              </tr><tr align="left">
                                                     <td>Last Updated</td>
                  <td>
                  <?php
                    $github = new GitHub('DejaVu','mediafrontpage');
                    $date   = $github->getInfo();
                    $currentVersion = $config->get('version','ADVANCED');
                    $updateddate = str_replace(array("T","Z"), " ", $date['pushed_at']);
                    echo "<a href='programs.php?p=https://github.com/DejaVu/mediafrontpage/commit/".$currentVersion."&title=Current Commit Details'>Time: ".substr($updateddate,11,20)." Date: ".substr($updateddate,0,10)."</a>";                  ?>
                  </td>
                </tr>
                <tr align="left">
                  <td>Version</td>
                    <?php
                      $commit = $github->getCommits();
                      $commitNo = $commit['0']['sha'];
                      echo "<td><a href='programs.php?p=https://github.com/DejaVu/mediafrontpage/commit/".$currentVersion."&title=Current Commit Details' target='_blank'>".$currentVersion."</a>";
                    ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                  <?php 
                    if($commitNo != $currentVersion){
                          echo "<br><p>There is a <a href='programs.php?p=https://github.com/DejaVu/mediafrontpage/compare/".$currentVersion."...master&title=Compare Current Commit with Master' Title='Display the new changes'>new version available </a>(or else your ahead of the master)</p><br>";
                          echo "<input type='button' value='Update Now' Title='Click To Update' onclick=\"location.href='update.php'\" />";
                     }else{
                          echo "<br><p>You are on the <a href='https://github.com/DejaVu/mediafrontpage/commit/".$currentVersion."' Title='View the latest commit' target='_blank'>current version</a> of MediaFrontPage.";
                              } 
                              ?>
                              </td>
                         </tr>
              </table>
            </div>

<!-- General/Global Settings -->
     <div id="GLOBAL" class="panel">
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
     <div id="PROGRAMS" class="panel">
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
               <table cellspacing="0px" cellpadding="0px">
                    <tr>
                         <td width="80"><div class="zoom"><a href="#XBMC"><img src="media/Programs/XBMC.png" Title="XBMC" style="-moz-transform :scale(0.5);opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#SABNZBD"><img src="media/Programs/SabNZBd.png" Title="SabNZBd+" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#SUBSONIC"><img src="media/Programs/SubSonic.png" Title="Subsonic" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#SICKBEARD"><img src="media/Programs/SickBeard.png" Title="Sick Beard" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#COUCHPOTATO"><img src="media/Programs/CouchPotato.png" Title="Couch Potato" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#HEADPHONES"><img src="media/Programs/HeadPhones.png" Title="Headphones" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#TRANSMISSION"><img src="media/Programs/Transmission.png" Title="Transmission" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#UTORRENT"><img src="media/Programs/uTorrent.png" Title="uTorrent" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                         <td width="80"><div class="zoom"><a href="#JDOWNLOADER"><img src="media/Programs/JDownloader.png" Title="jDownloader" style="opacity:0.4;filter:alpha(opacity=40)" onMouseOver="this.style.opacity=1;this.filters.alpha.opacity=100" onMouseOut="this.style.opacity=0.4;this.filters.alpha.opacity=40" /></a></div></td>
                    </tr><tr>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$XBMC_IP.':'.$XBMC_PORT.'/vfs/special://masterprofile/LCD.xml', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable''>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$SABNZBD_IP.':'.$SABNZBD_PORT.'/static/stylesheets/colorschemes/gold/images/sprite-main.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$SUBSONIC_IP.':'.$SICKBEARD_PORT.'/images/sickbeard_small.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$SICKBEARD_IP.':'.$SICKBEARD_PORT.'/images/sickbeard_small.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$COUCHPOTATO_IP.':'.$COUCHPOTATO_PORT.'/media/images/userscriptPreview.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$HEADPHONES_IP.':'.$HEADPHONES_PORT.'/images/headphoneslogo.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$TRANSMISSION_IP.':'.$TRANSMISSION_PORT.'/images/buttons/toolbar_buttons.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen(''.$utorrent_url.'images/ut.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                         <td width="80" align="center"><?php 
                          if( fopen('http://'.$SICKBEARD_IP.':'.$SICKBEARD_PORT.'/images/sickbeard_small.png', 'r')) {
                                echo "<img src='media/green-tick.png' height='15px' Title='Found.'>" ;
                            } else {
                                echo "<img src='media/red-cross.png' height='15px' Title='Unavailable'>"; } ?></td>
                    </tr><tr>
                         <td align="center" colspan="9" ><p align="justify" style="width: 500px;">Here you can specify a Username / Password / IP Address / Ports for each program individually. These settings <i>will</i> overide the Global Setting.</p></td>
                    </tr><tr>
                         <td align="center" colspan="9"><input type="button" value="Reverse Proxies" Title="Click here to Setup Reverse Proxies" onClick="window.location.href='#WEBROOT'" /></td>
                    </tr>
               </table>
     </div>

<!-- WEBROOT/REVERSE PROXY Settings -->
     <div id="WEBROOT" class="panel">
          <h3>Reverse Proxy Settings</h3><img src="media/Programs/reverse.png">
               <table>
                    <tr>
                         <td colspan="2"><p align="justify" style="width: 500px;">Reverse Proxy changes your programs locations from http://serverip:port to http://serverip/programs. These also need to be edited within some of the programs you use. Further information on this is available from <a href="http://mediafrontpage.lighthouseapp.com/projects/76089/apache-configuration-hints" target="_blank">MediaFrontPage's Development Site</a> as well as more information about what else can be used for.</p></td>
                    </tr><tr>
                         <td align="right"><p>Reverse Proxy:</p></td>
                         <td align="left"><p><input type="checkbox" Title="Tick To Enable" name="ENABLED" <?php echo ($config->get('ENABLED','WEBROOT')=="true")?'CHECKED':'';?>></p></td>
                    </tr><tr>
                         <td align="right"><p>XBMC:</p></td>
                         <td align="left"><input name="XBMC" size="20" Title="Insert XBMC's Webroot" value="<?php echo $config->get('XBMC','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Sickbeard:</p></td>
                         <td align="left"><input name="SICKBEARD" size="20" Title="Insert Sickbeard's Webroot" value="<?php echo $config->get('SICKBEARD','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Couch Potato:</p></td>
                         <td align="left"><input name="COUCHPOTATO" size="20" Title="Insert CouchPotato's Webroot" value="<?php echo $config->get('COUCHPOTATO','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>SabNZBd+:</p></td>
                         <td align="left"><input name="SABNZBD" size="20" Title="Insert SabNZBd+'s Webroot" value="<?php echo $config->get('SABNZBD','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>jDownloader:</p></td>
                         <td align="left"><input name="JDOWNLOADER" size="20" Title="Insert jDownloader's Webroot" value="<?php echo $config->get('JDOWNLOADER','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Transmission:</p></td>
                         <td align="left"><input name="TRANSMISSION" size="20" Title="Insert Transmission's Webroot" value="<?php echo $config->get('TRANSMISSION','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>uTorrent:</p></td>
                         <td align="left"><input name="UTORRENT" size="20" Title="Insert uTorrent's Webroot" value="<?php echo $config->get('UTORRENT','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>Headphones:</p></td>
                         <td align="left"><input name="HEADPHONES" size="20" Title="Insert HeadPhones's Webroot" value="<?php echo $config->get('HEADPHONES','WEBROOT')?>"></td>
                    </tr><tr>
                         <td align="right"><p>SubSonic:</p></td>
                         <td align="left"><input name="SUBSONIC" size="20" Title="Insert SubSonic's Webroot" value="<?php echo $config->get('SUBSONIC','WEBROOT')?>"></td>
                    </tr>
               </table>
          <input type="button" value="Back" onClick="history.go(-1)">
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('WEBROOT');" />
     </div>

<!-- WEBROOT/REVERSE PROXY Settings -->
<!-- XBMC Settings -->
     <div id="XBMC" class="panel">
          <h3>XBMC Settings</h3><a href="http://www.xbmc.org" target="_blank"><img src="media/Programs/XBMC.png" Title="Visit XBMC"></a>
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
     <div id="SICKBEARD" class="panel">
          <h3>SickBeard Settings</h3><a href="http://www.sickbeard.com" target="_blank"><img src="media/Programs/SickBeard.png" Title="Visit SickBeard"></a>
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
     <div id="COUCHPOTATO" class="panel">
          <h3>Couch Potato Settings</h3><a href="http://www.couchpotatoapp.com" target="_blank"><img src="media/Programs/CouchPotato.png" Title="Visit CouchPotato"></a>
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
     <div id="SABNZBD" class="panel">
          <h3>SabNZBd+ Settings</h3><a href="http://sabnzbd.org" target="_blank"><img src="media/Programs/SabNZBd.png" Title="Visit SabNZBd+"></a>
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
     <div id="TRANSMISSION" class="panel">
          <h3>Transmission Settings</h3><a href="http://www.transmissionbt.com" target="_blank"><img src="media/Programs/Transmission.png" Title="Visit Transmission"></a>
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
     <div id="UTORRENT" class="panel">
          <h3>uTorrent Settings</h3><a href="http://www.utorrent.com" target="_blank"><img src="media/Programs/uTorrent.png" Title="Visit uTorrent"></a>
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
     <div id="JDOWNLOADER" class="panel">
          <h3>jDownloader Settings</h3><a href="http://jdownloader.org/home/index?s=lng_en" target="_blank"><img src="media/Programs/JDownloader.png" Title="Visit jDownloader"></a>
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
     <div id="SUBSONIC" class="panel">
          <h3>SubSonic Settings</h3><a href="http://www.subsonic.org/pages/index.jsp" target="_blank"><img src="media/Programs/SubSonic.png" Title="Visit SubSonic"></a>
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
    <div id="HEADPHONES" class="panel">
          <h3>HeadPhones Settings</h3><a href="https://github.com/rembo10/headphones" target="_blank"><img src="media/Programs/HeadPhones.png" Title="Visit HeadPhones"></a>
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
     <div id="SEARCH" class="panel">
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
                         <td align="left"><input name="NZBMATRIX_API" Title="Insert your NZBMatrix API" type="password" size="40" value="<?php echo $config->get('NZBMATRIX_API','SEARCH')?>" /><a href="http://nzbmatrix.com/account.php"><img src="media/question.png" Title="Get your NZBMatrix API" height="20px"></a></td>
                    </tr><tr>
                         <td align="right"><p>NZB.SU API:</p></td>
                         <td align="left"><Input name="NZBSU_API" Title="Insert your NZB.SU API" type="password" size="40" value="<?php echo $config->get('NZBSU_API','SEARCH')?>" /><a href="http://nzb.su/profile"><img src="media/question.png" Title="Get your NZB.su API" height="20px"></a></td>
                    </tr><tr>
                     <td align="right"><p>NZB.SU Download Code:</p></td>
                         <td align="left"><input name="NZB_DL" Title="Insert your NZB.SU Download Code" type="password" size="40" value="<?php echo $config->get('NZB_DL','SEARCH')?>" /><a href="http://nzb.su/rss"><img src="media/question.png" Title="Get your NZB.su Download Code" height="20px"></a></td>
                    </tr>
               </table>
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('SEARCH');" />
     </div>

<!-- Search Settings -->
     <div id="TRAKT" class="panel">
          <h3>Trakt.tv Settings</h3><a href="http://www.trakt.tv" target="_blank"><img src="media/Programs/Trakt.png" Title="Visit TrakT"></a>
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
                    <td align="left"><input name="TRAKT_API" type="password" Title="Insert your trakt.tv API"  ize="40" value="<?php echo $config->get('TRAKT_API','TRAKT')?>" /><a href="http://trakt.tv/settings/api"><img src="media/question.png" Title="Get your trakt API" height="20px"></a></td>
                    </tr>
               </table>
          <input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('TRAKT');" />
     </div>

<!-- ShareThe.TV Settings -->
     <div id="SHARETHETV" class="panel">
          <h3>ShareThe.TV Settings</h3><a href="http://www.sharethe.tv" target="_blank"><img src="media/Programs/ShareTheTV.png" Title="Visit ShareThe.TV"></a>
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
     <div id="NAVBAR" class="panel">
          <h3>Navigation Links</h3><img src="media/Programs/navigation.png">
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
     <div id="SUBNAV" class="panel">
          <h3>Sub Navigation Links</h3><img src="media/Programs/subnav.png">
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
     <div id="HDD" class="panel">
          <h3>Hard Drives Settings</h3><img src="media/Programs/hdd.png">
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
     
<!-- Column Widths -->
<div id="COLUMNS" class="panel">
      <h3>Column Widths</h3><img src="media/Programs/cwidths.png">
              <p align="justify" style="width: 500px;">This is to set the width of each column on the main widget page via a percentage. Do not exceed 100%. For 3 columns, leave column 4 as 0%. If you move to 3 columns make sure you move all widgets out of column 4 before you make the changes.</p>
      
      <table id='table_columns'>
                <tr>
                  <td align="right"><p>Column 1</p></td>
                  <td align="left"><input class="txt" size="2" maxlength="2" name="WIDTH1" size="20" Title="Insert the desired width" value="<?php echo $config->get('WIDTH1','COLUMNS')?>" /></td>
                </tr>
                <tr>
                  <td align="right"><p>Column 2</p></td>
                  <td align="left"><input class="txt" size="2" maxlength="2" name="WIDTH2" size="20" Title="Insert the desired width" value="<?php echo $config->get('WIDTH2','COLUMNS')?>" /></td>
                </tr>
                <tr>
                  <td align="right"><p>Column 3</p></td>

                  <td align="left"><input class="txt" size="2" maxlength="2" name="WIDTH3" size="20" Title="Insert the desired width" value="<?php echo $config->get('WIDTH3','COLUMNS')?>" /></td>

                </tr>
                <tr>
                  <td align="right"><p>Column 4</p></td>
                  <td align="left"><input class="txt" size="2" maxlength="2" name="WIDTH4" size="20" Title="Insert the desired width" value="<?php echo $config->get('WIDTH4','COLUMNS')?>" /></td>
                </tr>
                <tr id="summation">
        <td>&nbsp;</td>
        <td align="right">Sum :</td>
        <td align="center"><span id="sum">0</span></td>
    </tr>
                </table>
              <br />
        
        <input type="button" value="Activate/Deactivate Widgets" Title="Activate/Deactivate Widgets" onClick="window.location.href='#WIDGETS_ON/OFF'" /><br>
        <input type="button" value="Save" Title="Save these Settings" onclick="updateSettings('COLUMNS');" />
        
      <?php 
//if ($sum <= 100) echo 
      
      //"<input type=\"button\" value=\"Save\" //onclick=\"updateSettings('COLUMNS');\" />" ?>
      
<script>
    $(document).ready(function(){
 
        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".txt").each(function() {
 
            $(this).keyup(function(){
                calculateSum();
            });
        });
 
    });
 
    function calculateSum() {
 
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".txt").each(function() {
 
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#sum").html(sum.toFixed(0));
    }
</script>
</div>
     
<!-- Search Settings -->
     <div id="MESSAGE" class="panel">
          <h3>XBMC Instances for Message Widget</h3><img src="media/Programs/message.png">
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
     <div id="SECURITY" class="panel">
          <h3>Security Settings</h3><img src="media/Programs/security.png">
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
     <div id="THEMES" class="panel">
               <h3>CSS Modifications:</h3><img src="media/Programs/cssmod.png">
                         <table>
                              <tr>
                                   <td align="center" colspan="3"><p align="justify" style="width: 500px;">These are 'user created' CSS modifications submitted by some of our users. These change mainly the look and colors of MediaFrontPage. If your confident enough with CSS and want to contribute your own modification, submit it to us on the <a href="http://forum.xbmc.org/showthread.php?t=83304" target="_blank">MediaFrontPage Support Thread</a>.</p></td>
                              </tr><tr>
                                   <td><img class="widget" src="media/examples/lightheme.jpg" height="120px" /></td>
                                   <td><img class="widget" src="media/examples/hernadito.jpg" height="120px" /></td>
                                   <td><img class="widget" src="media/examples/dpickles.jpg" height="120px" /></td>
                              </tr><tr>
                                   <td><p><input Title="Tick to Enable Light Theme" type="radio" name="ENABLED" value="lighttheme" <?php echo ($config->get('ENABLED','THEMES') == "lighttheme")?'CHECKED':'';?> />Light Theme</p></td>
                                   <td><p><input Title="Tick to Enable Hernandito Theme" type="radio" name="ENABLED" value="hernandito" <?php echo ($config->get('ENABLED','THEMES') == "hernandito")?'CHECKED':''; ?> />Hernandito's Theme</p></td>
                                   <td><p><input Title="Tick to Enable DPickles Theme" type="radio" name="ENABLED" value="dpickles" <?php echo ($config->get('ENABLED','THEMES') == "dpickles")?'CHECKED':'';?> />DPickles Theme</p></td>
                              </tr><tr>
                                   <td><img src="media/examples/black_modern_glass.jpg" height="120" class="widget" /></td>
                                   <td><img src="media/examples/space6.jpg" height="120" class="widget" /></td>
                                   <td><img src="media/examples/original.jpg" height="120" class="widget" /></td>
                              </tr><tr>
                                   <td><p><input Title="Tick to Enable Black Modern Glass Theme" type="radio" name="ENABLED" value="black_modern_glass" <?php echo ($config->get('ENABLED','THEMES') == "black_modern_glass")?'CHECKED':'';?> />Black Modern Glass Theme</p></td>
                                   <td><p><input Title="Tick to Enable Space 6 Theme" type="radio" name="ENABLED" value="space6" <?php echo ($config->get('ENABLED','THEMES') == "space6")?'CHECKED':'';?> />Space 6 Theme</p></td>
                                   <td><p><input Title="Tick to Disable all Themes" type="radio" name="ENABLED" value="" <?php echo ($config->get('ENABLED','THEMES') == "")?'CHECKED':''; ?> />OFF</p></td>                                   
                              </tr><tr>
                          
                          
                            <td colspan="3"><input type="button" value="Coming Episode Mods" Title="Click here to Choose Coming Episodes Style" onClick="window.location.href='#WIDGET_MODS'" />
                            <br><br><p><input type="button" value="Save" Title="Save these Settings" onClick="updateSettings('THEMES');" /></p></td>
                              </tr>
                         </table>
          </div>

<!-- Coming Episodes Widget Mods -->

<div id="WIDGET_MODS" class="panel">
            <h3>Widget Modification</h3><img src="media/Programs/cmods.png">
              <p align="justify" style="width: 500px;">Use this to set what view you want for the Coming Episode Widget. One must be true and the other false or both false for default view.</p>
            <table>
                 <tr align="center">
                  <td><img class="widget" src="media/examples/minimal-posters.jpg" height="100px" /></td>
                  <td><img class="widget" src="media/examples/minimal-banners.jpg" height="100px" /></td>
              <td height="100px" width="100px"></td>
              </tr>
              <td align="center">
                    <input type="radio" name="CEVIEW" value="1" <?php echo ($config->get('CEVIEW','WIDGET_MODS') == "1")?'CHECKED':'';?> />
                    <p>Minimal Banner</p>
                  </td>
              <td align="center">
                    <input type="radio" name="CEVIEW" value="2" <?php echo ($config->get('CEVIEW','WIDGET_MODS') == "2")?'CHECKED':'';?> />
                    <p>Minimal Poster</p>
                    </td>
                    <td align="center">
                    <input type="radio" name="CEVIEW" value="3" <?php echo ($config->get('CEVIEW','WIDGET_MODS') == "3")?'CHECKED':'';?> />
                    <p>Off</p>
                    </td>
              </table>
              <input type="button" value="Back" onClick="history.go(-1)">
              <input type="button" Title="Save these Settings" value="Save" onclick="updateSettings('WIDGET_MODS');" />
              </div>

<!-- WIDGETS ON & OFF -->
    <div id="WIDGETS_ON/OFF" class="panel">
      <h3>Widget On/Off</h3><img src="media/Programs/widgets.png">
              <p align="justify" style="width: 500px;">Here is where you can specify which widgets you want to display on the Widget Section of MediaFrontPage.</p>
              <table width="500" border="0">
                <tr>
                  <td align="right" style="white-space: nowrap">Coming Episodes</td>
                  <td><input type="checkbox" name="wComingEpisodes" title="Tick to Enable" <?php echo ($config->get('wComingEpisodes','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">XBMC Library</td>
                  <td><input type="checkbox" name="wXBMCLibrary" title="Tick to Enable" <?php echo ($config->get('wXBMCLibrary','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">Control XBMC</td>
                  <td><input type="checkbox" name="wControl" title="Tick to Enable" <?php echo ($config->get('wControl','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                </tr>
                <tr>
                  <td align="right" style="white-space: nowrap">Recent TV</td>
                  <td><input type="checkbox" name="wRecentTV" title="Tick to Enable" <?php echo ($config->get('wRecentTV','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">Recent Movies</td>
                  <td><input type="checkbox" name="wRecentMovies" title="Tick to Enable" <?php echo ($config->get('wRecentMovies','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">Search</td>
                  <td><input type="checkbox" name="wSearch" title="Tick to Enable" <?php echo ($config->get('wSearch','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                </tr>
                <tr>
                  <td align="right" style="white-space: nowrap">RSS Feeds</td>
                  <td><input type="checkbox" name="wRSS" title="Tick to Enable" <?php echo ($config->get('wRSS','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">Hard Drives</td>
                  <td><input type="checkbox" name="wHardDrives" title="Tick to Enable" <?php echo ($config->get('wHardDrives','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">Now Playing</td>
                  <td><input type="checkbox" name="wNowPlaying" title="Tick to Enable" <?php echo ($config->get('wNowPlaying','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                </tr>
                <tr>
                  <td align="right" style="white-space: nowrap">Transmission</td>
                  <td><input type="checkbox" name="wTransmission" title="Tick to Enable" <?php echo ($config->get('wTransmission','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">SabNZBd</td>
                  <td><input type="checkbox" name="wSabnzbd" title="Tick to Enable" <?php echo ($config->get('wSabnzbd','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">Message</td>
                  <td><input type="checkbox" name="wMessage" title="Tick to Enable" <?php echo ($config->get('wMessage','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                </tr>
                <tr>
                  <td align="right" style="white-space: nowrap">Trakt</td>
                  <td><input type="checkbox" name="wTrakt" title="Tick to Enable" <?php echo ($config->get('wTrakt','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">System</td>
                  <td><input type="checkbox" name="wSystem" title="Tick to Enable" <?php echo ($config->get('wSystem','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap">UPS</td>
                  <td><input type="checkbox" name="wUPS" title="Tick to Enable" <?php echo ($config->get('wUPS','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                </tr>
                <tr>
                  <td align="right" style="white-space: nowrap">jDownloader</td>
                  <td><input type="checkbox" name="wjDownloader" title="Tick to Enable" <?php echo ($config->get('wjDownloader','WIDGETS_ON/OFF') == "true")?'CHECKED':'';?> /></td>
                  <td align="right" style="white-space: nowrap"></td>
                  <td></td>
                  <td align="right" style="white-space: nowrap"></td>
                  <td></td>
              </table><br><br>
                <input type="button" value="Back" onClick="history.go(-1)">
                <input type="button" Title="Save these Settings" value="Save" onClick="updateSettings('WIDGETS_ON/OFF');" />
      </div>  


<!-- RSS Settings -->
     <div id="RSS" class="panel">
          <h3>RSS Feeds</h3><img src="media/Programs/RSS.png">
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
                    <td><input size='30' Title='RSS Site Name' name='TITLE' value='".urldecode(str_ireplace('_', ' ', $title))."'/></td>
                    <td><input size='60' Title='Direct RSS Feed URL' name='VALUE' value='$url'/></td>
               </tr>";
               }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('rss', 30, 60);" />
          <input type="button" value="-" Title="Remove the Last Row" onClick="removeRowToTable('rss');" />
               <br />
               <br />
          <input type="button" value="Save" Title="Save these Settings" onClick="updateAlternative('RSS');" />
     </div>
     
<!-- Control Settings -->    
    <div id="CONTROL" class="panel">
          <h3>Control XBMC Settings</h3><img src="media/Programs/control.png">
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
                    <td><input size='20' Title='Control Label' name='TITLE' value='".urldecode(str_ireplace('_', ' ', $title))."'/></td>
                    <td><input size='20' Title='Control Function' name='VALUE' value='$url'/></td>
               </tr>";
               }
?>
               </table>
          <input type="button" value="+" Title="Add a new Row" onClick="addRowToTable('control', 20, 20);" />
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