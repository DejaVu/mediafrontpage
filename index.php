<?php

//Check for config file and curl
    if (file_exists('firstrun.php') && !file_exists('config.ini')){header('Location: servercheck.php');exit;}

//Authentication check
	require_once('config.php');
		if ($authsecured && (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])) {
        	echo "<script>window.location = 'login.php';</script>";
		exit;
		}

// Redirect if on a mobile browser
//    require_once "m/mobile_device_detect.php";
//        if(mobile_device_detect(true,true,true,true,true,true,true,false,false) ) {
//           echo "<script>window.location = 'm/';</script>";
//        exit();
//        }

	$submenu = false;
	require_once "config.php";
		if(!empty($subnavlink)||!empty($subnavlink_blank)||!empty($subnavselect)){$submenu = true;}

	require_once "functions.php";
	require_once "widgets.php";
	include "nav.php";
    require_once "layoutmiddleman.php";

//turn off warnings
//	$errlevel = error_reporting();
//	error_reporting(E_ALL & ~E_WARNING);
//		if (!include ("layout.php")){

// file was missing so include default theme 
//	require("default-layout.php");
//	}

// Turn on warnings
//	error_reporting($errlevel); 
//	if (empty ($arrLayout)) {
//	require_once("default-layout.php");
//	}
	foreach( $wIndex as $wId => $widget ) {
		renderWidgetHeaders($widget);	
	}
?>
<html>
	<head>
		<title>MediaFrontPage</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<script type="text/javascript" language="javascript" src="js/ajax.js"></script>
		<script type="text/javascript" language="javascript" src="js/popuptext.js"></script>
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>
		<script type="text/javascript" src="js/highslide/highslide.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
		<script type="text/javascript" src="js/prettyPhoto/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" type="text/css" href="js/prettyPhoto/prettyPhoto.css" />
		<script type="text/javascript" src="js/prettyLoader/js/jquery.prettyLoader.js"></script>
		<link rel="stylesheet" type="text/css" href="js/prettyLoader/css/prettyLoader.css" />
		<link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />
		<script type="text/javascript">
			//<![CDATA[
			// override Highslide settings here
			// instead of editing the highslide.js file
			hs.registerOverlay({
			html: '<div class="closebutton" onclick="return hs.close(this)" title="Close"></div>',
			position: 'top right',
			fade: 2 // fading the semi-transparent overlay looks bad in IE
			});
			
			hs.showCredits = false; 
			hs.graphicsDir = 'js/highslide/graphics/';
			//hs.wrapperClassName = 'borderless';
			hs.outlineType = 'outer-glow';
			//hs.outlineType = 'borderless';
			//hs.outlineType = 'rounded-white';
			//hs.outlineType = null;
			//hs.wrapperClassName = 'outer-glow';
			hs.dimmingOpacity = 0.75;
			//]]>
		</script>
		<style type="text/css">
			.highslide-dimming {
				background: black;
			}
			a.highslide {
				border: 0;
			}
		</style>
		<script type="text/javascript">InitPopupBox();</script>
		<!-- START: JQuery Scrollbar for Coming Episodes Widget, Javascript Entries -->
		<link href="css/scrollbar.php" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
		<!-- END: JQuery Scrollbar for Coming Episodes Widget, Javascript Entries -->
		<script type="text/javascript" language="javascript">
			function logout(){
   				var xmlhttp
			   	 if (window.XMLHttpRequest)
    			  {// code for IE7+, Firefox, Chrome, Opera, Safari
		        	xmlhttp=new XMLHttpRequest()
				      } else {// code for IE6, IE5
				        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
			      }
    					xmlhttp.onreadystatechange=function() {
		        if (xmlhttp.readyState==4 && xmlhttp.status==200){
					if(xmlhttp.responseText){
			            window.top.document.location.href = "login.php"
		    		        alert("Logout successful")
			          }
		    	    }
			      }
		    	xmlhttp.open("GET","logout.php",true)
			    xmlhttp.send()
		    	}'
		</script>
	</head>
		<body>
			<div id="main">
			<?php
				foreach ($arrLayout as $sectionId => $widgets) {
					echo "\n\t<ul id=\"".$sectionId."\" class=\"section ui-sortable\">\n";
				foreach ($widgets as $wId => $wAttribute) {
					echo "\t\t<li id=\"".$wId."\" class=\"widget";
				if (!empty($wAttribute["color"])) {
					echo " ".$wAttribute["color"];
				}
				if (!empty($wAttribute["display"])) {
					echo " ".$wAttribute["display"];
				}
				echo "\">";
					echo "\t\t\t<div class=\"widget-head\">";
					echo "\t\t\t\t<h3>".$wAttribute['title']."</h3>\n";
					echo "\t\t\t</div><!-- .widget-head -->\n";
					echo "\t\t\t<div class=\"widget-content\">\n";
				if(empty($wAttribute['params'])) {
					renderWidget($wIndex[$wId]);
				} else {
					renderWidget($wIndex[$wId], $wAttribute['params']);
				}
					echo "\t\t\t</div><!-- .widget-content -->\n";
					echo "\t\t</li><!-- #".$wId." .widget -->\n";
			}
					echo "\t</ul><!-- #".$sectionId." .section -->\n";
		}
		
?>
			</div>
				<!-- #main --> 
		<script type="text/javascript" src="js/jquery.js"></script> 
		<script type="text/javascript" src="js/widget.js"></script> 
				<!-- START: JQuery Scrollbar for Coming Episodes Widget, Javascript Entries --> 
		<script>
			$(window).load(function() {
				mCustomScrollbars();
			}
			);

			function mCustomScrollbars(){
				/* 
				malihu custom scrollbar function parameters: 
				1) scroll type (values: "vertical" or "horizontal")
				2) scroll easing amount (0 for no easing) 
				3) scroll easing type 
				4) extra bottom scrolling space for vertical scroll type only (minimum value: 1)
				5) scrollbar height/width adjustment (values: "auto" or "fixed")
				6) mouse-wheel support (values: "yes" or "no")
				7) scrolling via buttons support (values: "yes" or "no")
				8) buttons scrolling speed (values: 1-20, 1 being the slowest)
				*/
			$("#mcs3_container").mCustomScrollbar("vertical",900,"easeOutCirc",1.05,"auto","yes","no",0); 
			}

				/* function to fix the -10000 pixel limit of jquery.animate */
			$.fx.prototype.cur = function(){
				if ( this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null) ) {
				return this.elem[ this.prop ];
			}
			    var r = parseFloat( jQuery.css( this.elem, this.prop ) );
			    return typeof r == 'undefined' ? 0 : r;
			}
	</script>
	<script src="js/scrollbar.js"></script> 
				<!-- END: JQuery Scrollbar for Coming Episodes Widget, Javascript Entries -->
<?php
	include "footer.php"; 
?>
	</body>
</html>