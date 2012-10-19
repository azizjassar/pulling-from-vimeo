<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>How to get data from Vimeo using PHP</title>
	<meta name="description" content="How to get data from Vimeo using PHP" /> 
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
		<h1>How to get data from Vimeo using PHP</h1>
		<?php 
			include ('VideoData.php'); 
			$video = new VideoData('31683149');
			$video->printVideoBlock();
		?>
		<div>
			<?php $video->printAllProperties(); ?>
		</div>
	</div>
</body>
</html>