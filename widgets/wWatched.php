<?php
$wdgtWatched = array("name" => "Site Widgets", "type" => "inline", "function" => "widgetWatched();");
$wIndex["wWatched"] = $wdgtWatched;

function widgetWatched() {
require "config.php";
	echo "<div align='left'><a href='http://sharethe.tv/".$SHARETHETV_USERNAME."' target='_blank'><img src='http://sharethe.tv/".$SHARETHETV_USERNAME."/widget' style='opacity:0.4;filter:alpha(opacity=40);-moz-border-radius:8px;-webkit-border-radius:8px;' onMouseOver='this.style.opacity=1;this.filters.alpha.opacity=100' onMouseOut='this.style.opacity=0.4;this.filters.alpha.opacity=40'></a></div><div align='right'><a href='http://trakt.tv/user/".$TRAKT_USERNAME."'><img src='http://trakt.tv/user/".$TRAKT_USERNAME."/widget' target='_blank' style='opacity:0.4;filter:alpha(opacity=40);-moz-border-radius:8px;-webkit-border-radius:8px;' onMouseOver='this.style.opacity=1;this.filters.alpha.opacity=100' onMouseOut='this.style.opacity=0.4;this.filters.alpha.opacity=40'></a></div>";
}
?>