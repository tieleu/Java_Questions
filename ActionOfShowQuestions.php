	<?php  
	$questionNr =  $_GET["questionNr"];

	$connection = mysql_connect("172.16.44.4", "tie", "")
	or die("Fehler im System");

	mysql_select_db("java8_evaluation")
	or die("Verbindung nicht möglich");		

	$abfrage = "SELECT type FROM questions WHERE ID=$questionNr";
	$ergebnis = mysql_query($abfrage);
	while($row = mysql_fetch_object($ergebnis)){	
		$type = $row -> type;								
	}
	if($type == "checkbox"){
		if(isset($_POST['selectedAnswer'])){
			$question = $_POST['selectedAnswer'];	
			foreach ($question as $qu){				
				$eintrag = "UPDATE answer SET Selected_answer = Selected_answer + 1 WHERE ID = $qu";
				$insert = mysql_query($eintrag);
			}
			if(isset($_POST['selectedAnswer'])){
				echo "<h3>Send was successful!</h3><hr>";
				header("Location:evaluation.php?questionNr=$questionNr");
			}else{
				echo "<h3>Something went wrong</h3><br>";
			}
		}else{
			echo "please select an answer";
		}
	}else if($type =="textbox" AND isset($_POST['selectedAnswer'])){
		
		$selectedAnswer = $_POST['selectedAnswer'];

		$eintrag4 = "SELECT * from answer where questionsidfs ='$questionNr' and Answer ='$selectedAnswer' and questionsIDFS = $questionNr ";
		$insert4= mysql_query($eintrag4);

		$insert6= mysql_query($eintrag4);

		if($row1 = mysql_fetch_object($insert4)){

			$trueAnswer =   trim($row1 -> Answer);
			$solution = $row1 -> Solution;
		}

		$trimedSelectedAnswer=  trim($selectedAnswer);
		$trimedTrueAnswer=  trim($trueAnswer);

		if($trimedSelectedAnswer == $trimedTrueAnswer && $solution ==1){

			$eintrag1 = "UPDATE answer SET Selected_answer = Selected_answer + 1 WHERE Answer ='localdatetime' and questionsIDFS = $questionNr ";
			$insert1= mysql_query($eintrag1);
			echo "wrong<br>";
			echo $trimedSelectedAnswer . "<br>" . $trimedTrueAnswer;
		}
		else if($selectedAnswer !=""){
			while($row6 = mysql_fetch_object($insert6)){
				$array = array($row6 -> Answer);		
			}

			if(in_array($selectedAnswer, $array)){

				$eintrag5 = "UPDATE answer SET Selected_answer = Selected_answer + 1 WHERE answer ='$selectedAnswer' and questionsIDFS = $questionNr ";
				$insert5= mysql_query($eintrag5);
			}else {

				$eintrag3 = "INSERT INTO  answer (answer, solution, questionsIDFS, Selected_answer ) values ('$selectedAnswer', 0,'$questionNr', +1)";
				$insert3 = mysql_query($eintrag3);
			}
		}else{

			echo "Lösung eingeben";	
		}
	}		

	echo "<h3>Send was successful!</h3><hr>";
	header("Location:evaluation.php?questionNr=$questionNr");

	mysql_close($connection);

	?>

