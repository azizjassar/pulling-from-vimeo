<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>HowTo pull XML data from vimeo using PHP</title>
	<meta name="description" content="HowTo pull XML data from vimeo using PHP" /> 
	<meta name="keywords" content="PHP, XML, Vimeo" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />
	<link rel="shortcut icon" href="http://wideline-studio.com/sites/default/files/clean_960gs_favicon.png">
	<link rel="apple-touch-icon" href="http://wideline-studio.com/sites/default/files/clean_960gs_favicon.png">
	<link rel="stylesheet" href="css/style.css" />
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper">
		<h1>HowTo pull data from vimeo using PHP</h1>
		<?php 
			include ('VimeoData.php'); 
			$video = new VimeoData('49318684');
			$video->printVideoBlock();
		?>
	</div>
</body>
</html>