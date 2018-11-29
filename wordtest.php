<!DOCTYPE html>
<html>
<head>
		  <meta charset="utf-8">
		  <meta name="author" content="Sally Park">
		  <meta name="description" content="GRE word quiz created using HTML, PHP, and Javascript">
		  <title>GRE Word Test</title>
</head>
<body>
<!-- Check using PHP
		  <?php
			#		 if (isset($_POST['guess'])){
			#					if($_POST['answer'] == $_POST['guess']){
			#							  echo "<h1>Correct!</h1>";
			#					} else{
			#							  echo "<h1>Incorrect!</h1>";
			#					}
			#		 }
		  ?>
-->

		  <?php
					 $words=file("words.txt");
					 shuffle($words);
					 $choices=array_slice($words,0,4);
					 list($answer,$part,$defn)=explode("\t", $choices[(rand(0,3))]);
		  ?>

		  <h1><?php print $answer." - ".$part; ?></h1>
		  <form method="wordtest.php" method="post">
					 <?php
								for($i=0; $i<4; $i++){
										  $line = $choices[$i];
										  list($word, $part, $defn) = explode("\t", $line);
										  echo "<input type=\"radio\" name=\"guess\" value=\"$word\">".$defn;
										  echo "<br>";
								}
					 ?>
					 <br>
					 <div>
								<input type="hidden" name="answer" value="<?= $answer ?>" id="ans" />
					 </div>
					 <div>
								<button type="button" id="check">Check answer</button>
								<p id="msg"></p>
					 </div>
					 <input type="submit" id="newtest" value="Another word">
		  </form>

<!--Check using JavaScript-->
		  <script>
					 var checkBtn = document.getElementById("check");
					 var answer = document.getElementById("ans").value;
					 var radios = document.getElementsByTagName("input");
					 var ansMsg = document.getElementById("msg");

					 function answerCheck(){
								for (var i=0; i<radios.length; i++){
										  if (radios[i].type == "radio" && radios[i].checked){
													 if (radios[i].value == answer){
																ansMsg.innerHTML = "Correct!";
													 } else{
																ansMsg.innerHTML = "Incorrect.";
													 }
										  }
								}
					 }

					 checkBtn.onclick = answerCheck;
		  </script>
</body>
</html>
