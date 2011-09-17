<?php 
  include "nav.php";
  require_once "config.php";
    $qs = $_GET['p'];
    $title = (isset($_GET['title'])) ? $_GET['title'] : $qs;
?>
<html style="overflow:none">
  <head>
    <title>MediaFrontPage - <?php echo $title ?></title>
    <link rel="shortcut icon" href="favicon.ico" />
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" type="text/css" href="css/widget.php" />
    <link rel="stylesheet" type="text/css" href="css/front.css" />
    <link rel="stylesheet" type="text/css" href="css/static_widget.css" />
  </head>
<body><br><center>  
  <table width="98%" height="95%" align="center" cellpadding="0" cellspacing="0" class="widget">
    <tr style="cursor: move; ">
      <td align=center colspan=2 height=25>
        <div class="widget-head">
          <div style="position:absolute; float:left; padding:5px;">
            <a href="javascript:parent.programs.history.go(-1)"><img src="media/browseleft.png" style="cursor:pointer;"></a>
            <a href="javascript:parent.programs.history.forward()"><img src="media/browseright.png" style="cursor:pointer;"></a>
            <a href="javascript:parent.programs.history.go(0)"><img src="media/browserefresh.png" style="cursor:pointer;"></div></a>
              <h3><?php echo $title; ?></h3>
          </div>
      </td>
    </tr><tr>
      <td><br><iframe class='widget' src='<?php if ($qs == 'SickBeard') {
                          echo $sickbeardurl;
                      }  elseif($qs == 'CouchPotato') {
                          echo $cp_url;
                      }  elseif($qs == 'SabNZBd') {
                          echo $saburl;
                      }  elseif($qs == 'Transmission') {
                          echo $transmission_web;
                      }  elseif($qs == 'uTorrent') {
                          echo $utorrent_url;
                      }  elseif($qs == 'XBMC') {
                          echo str_replace("/vfs","",$xbmcimgpath);
                      }  elseif($qs == 'HeadPhones') {
                          echo $headphones_url;
                      }  elseif($qs == 'SubSonic') {
                          echo $subsonic_url;
                      }  elseif($qs == 'jDownloader') {
                          echo $jd_weburl;
                      }  elseif($qs == 'AutoMovies') {
                          echo $automovies_url;
                        } else {
                          echo $qs;
                      }?>'; frameborder='0' height='96%' width='98%' scrolling='auto' name='programs'></iframe>
      </td>
    </tr>
  </table>
<?php
  include "footer.php"; 
?>
  </center>
 </body>
</html>