<!DOCTYPE html>
<html>
<head>
		  <meta charset="utf-8">
		  <meta name="author" content="Sally Park">
		  <meta name="description" content="The PHP Search Engine is a lab assignment for the Fall 18 COEN 60 course. This page will allow users to search for documents within a folder using PHP and will return the file name, number of results and execution time of the query.">
		  <title>PHP Search Engine</title>
</head>

<body>
		  <h1>PHP Search Engine</h1>
		  <?php
					 $timer = microtime(true);
					 if (!empty($_GET["query"])){
								$query = $_GET["query"]; 
								$results = array();
								$desc = array();
								$count = 0;

								#check files
								foreach (glob("doc/*.*") as $files){
										  $content = file_get_contents($files);
										  $posincontent = strpos(strtolower($content), $query);
										  $posinname = strpos(strtolower(basename($files)), $query);
										  if ($posincontent!==false || $posinname!==false){
													 $results[$count] = $files;
													 if ($posincontent!==false){
																$desc[$count] = substr($content, $posincontent, $posincontent+200);
													 } else{
																$desc[$count] = substr($content, 0, 200);
													 }
													 $count++;
										  }
								}

								#list results and descriptions
								echo "<ul class=\"docitem\">";
								for ($i=0; $i<$count; $i++){
										  $filename = basename($results[$i]);
										  echo "<li><a href=\"".$results[$i]."\">$filename</a>";
										  echo "<ul>";
										  echo "<li>".$desc[$i]."...";
										  echo "</ul>";
								}
								echo "</ul>";
		  
								//number of results and script execution time
								$numResults = $count;
								$extime = microtime(true) - $timer;
								echo "$numResults results found in $extime seconds";
					 } else{
								
					 }
		  ?>

		  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
		  <div>
					 <input name="query" type="text" value="<?php if (!empty($_GET["query"])){echo $_GET["query"];} ?>"/>
					 <input type="submit" value="Submit"/>
		  </div>
		  </form>
</body>
</html>
