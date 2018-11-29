<!DOCTYPE html>
<html lang="en">
<head>
		  <meta charset="utf-8">
		  <meta name="author" content="Sally Park">
		  <meta name="description" content= "A Word of the Day webpage is a Fall 18 COEN 60 lab assignment that displays random GRE words with the part of speech and definition of the word and a page hit counter using PHP">
		  <title>Word of the Day</title>
</head>
<body>
		  <h1>Word of the Day</h1>
		  <?php
					 #read file
					 $myfile = file("words.txt");
					 
                     #display random word
					 $j = rand(0, count($myfile)-1);
					 list($word, $part, $defn) = explode("\t", $myfile[$j]);
					 echo "<h1>".$word."</h1>";
					 echo "<p>".$part."<br>".$defn."</p>";


					 #page counter
					 $hits = file_get_contents("hits.txt") + 1;
					 echo "Page has been visited ".$hits." times";
					 file_put_contents("hits.txt", $hits);
		  ?>
		  
</body>
</html>
