<link href="/css/footer.css" rel="stylesheet" type="text/css">
<?php 
	include "config.php";
		if(!empty($subnavlink)||!empty($subnavlink_blank)||!empty($subnavselect)){
			echo "<div style=\"width:100%; position: fixed; bottom: 0px;\" id='footer'>";
			echo "<ul>";
		
		if(!empty($subnavlink)){
			foreach( $subnavlink as $navlinklabel => $navlinkpath) {
			echo "<li><a href='programs.php?p=".$navlinkpath."&title=".$navlinklabel."'>".$navlinklabel."</a></li>";
		}
	}
			echo "</ul>";
			echo "</div>";
			echo "</div>";	
	}
?>