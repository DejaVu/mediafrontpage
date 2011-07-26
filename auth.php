<?php
	require_once("config.php");
		If (!$authsecured) {
		    echo "<script>window.location = 'index.php';</script>";
	    exit;
}
	if (isset($_POST['user']) && isset($_POST['password'])) {
    	if ($_POST['user']==$authusername && $_POST['password']==$authpassword) {
        	// OK
	        $_SESSION['loggedin'] = true;
    	    echo "<script>window.location = 'index.php';</script>";
        exit;
	} else {
?>
<html>
	<head>
	<title>Media Center</title>
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/front.css" />
	<link rel="stylesheet" type="text/css" href="css/static_widget.css" />
	<link href="css/settings.css" rel="stylesheet" type="text/css">
<body>
	<center>
		<br><br><br>
		<form action="auth.php" method="post">
			<table class="widget" width=259 cellpadding=0 cellspacing=0 id=1>
				<tr style=cursor: move;>
					<td align=center height=25><div class="widget-head">MediaFrontPage Authentication</div></td>
				<tr>
					<td align=center height=25><br>Invalid Username and/or Password.</td>
				<tr>
					<td align=center height=25>&nbsp; &nbsp;</td>
				<tr>
					<td align=center height=25>Please try again.</td>
				<tr>
					<td align=center height=25><input type="button" value="<< Back" onClick="history.go(-1);return false;" /><br><br></td>
			</table>
		</form>
	</center>
<?php
	}
		} else {
    		// not logging in
			echo "<script>window.location = 'login.php';</script>";
		exit;
	}
?>