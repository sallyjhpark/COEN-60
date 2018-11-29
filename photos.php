<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Sally Park">
	<meta name="description" content="My Photo Album is a lab assignment in the Fall 18 COEN 60 course. The page lists the image files of a folder using PHP">
	<title>My Photo Album</title>
</head>
<body>
	<h1>My Photo Album</h1>
	<ul class="photoitem">
		<?php
			foreach (glob("photo/*.jpg") as $photofile){
				$photoname = basename($photofile);
				$photosize = round((filesize($photofile))/1024);
				print "<li><a href=\"$photofile\">$photoname</a> ($photosize KB)";
			}
		?>
	</ul>
</body>
</html>
