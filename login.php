<html>
	<head>
	<title>MediaFrontPage - Login</title>
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/front.css" />
	<link rel="stylesheet" type="text/css" href="css/static_widget.css" />
	<link href="css/settings.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
 	<script>
 	// Stop chrome's autocomplete from making your input fields that nasty yellow. Yuck.
		if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0)
			{
				var _interval = window.setInterval(function ()
			{
				var autofills = $('input:-webkit-autofill');
		if (autofills.length > 0)
			{
				window.clearInterval(_interval); // stop polling
				autofills.each(function()
            {
				var clone = $(this).clone(true, true);
				$(this).after(clone).remove();
				});
			}
		}, 200);
	}
 	</script>
 	<style>
		input:-webkit-autofill {
			color: #2a2a2a !important;
		}
 	</style>
</head>
<?php
	if (file_exists('firstrun.php')){
			header('Location: servercheck.php');
} 
?>
<body><center><br><br><br>
	<form action="auth.php" method="post">
		<table class="widget" width="259" cellpadding="0" cellspacing="0" id="1">
			<tr style="cursor: move;">
				<td align="center" colspan="2" height="25"><div class="widget-head">MediaFrontPage Authentication</div></td>
			</tr><tr>
				<td align="right"><br>Username:</td>
				<td align="center"><br><input type="text" name="user" size="15"></td>
			</tr><tr>
				<td align="right">Password:</td>
				<td align="center"><input type="password" name="password" size="15"></td>
			</tr><tr>
				<td align="center" colspan="2">&nbsp;</td>
			</tr><tr>
				<td align="center" colspan="2"><input type="submit" value="Log in"><br><br></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>