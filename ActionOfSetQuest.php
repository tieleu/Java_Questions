<?php						
$connection = mysql_connect("172.16.44.4", "tie", "")
or die("Fehler im System");

mysql_select_db("java8_evaluation")
or die("Verbindung nicht möglich");


if(isset($_POST['questions']) AND isset($_POST['answer1'])AND isset($_POST['answer2'])AND isset($_POST['answer3'])AND isset($_POST['answer4']) AND isset($_POST['answer5'])AND isset($_POST['declaration'])){

	$question = $_POST['questions'];
	$QuestionDefinition = $_POST['questionDecleration'];
	
	$information = $_POST['information'];
	
	$answer1 = 	$_POST['answer1'];
	$answer2 = 	$_POST['answer2'];		
	$answer3 = 	$_POST['answer3'];
	$answer4 = 	$_POST['answer4'];
	$answer5 = 	$_POST['answer5'];	
	$declaration = $_POST['declaration'];

	$check = $_POST['check'];	
	$check1 = $_POST['check1'];
	$check2 = $_POST['check2'];
	$check3 = $_POST['check3'];
	$check4 = $_POST['check4'];

		if($check == ""){
			$check =0;
		}
		
		if($check1 == ""){
			$check1 =0;
		}

		if($check2 == ""){
			$check2 =0;
		}

		if($check3 == ""){
			$check3 =0;
		}

		if($check4 == ""){
			$check4 =0;
		}


	echo $check;


	$eintrag = "INSERT INTO  questions (Questions, information, type, oldQuestion, declaration, QuestionDefinition) values ('$question', '$information','checkbox',0,'$declaration', '$QuestionDefinition')";

	$insert = mysql_query($eintrag);

	$toQuest  = "SELECT max(ID) AS max FROM questions";
	$ergebnis = mysql_query($toQuest);
	while($row = mysql_fetch_object($ergebnis)){	

		$IDFS = $row -> max;

	}


	
	$eintrag = "INSERT INTO  answer (Answer, solution, questionsIDFS) values ('$answer1', '$check','$IDFS')";
	$insert = mysql_query($eintrag);

	$eintrag = "INSERT INTO  answer (Answer, solution, questionsIDFS) values ('$answer2','$check1','$IDFS')";
	$insert = mysql_query($eintrag);	

	$eintrag = "INSERT INTO  answer (Answer, solution, questionsIDFS) values ('$answer3','$check2','$IDFS')";
	$insert = mysql_query($eintrag);

	$eintrag = "INSERT INTO  answer (Answer, solution, questionsIDFS) values ('$answer4','$check3','$IDFS')";
	$insert = mysql_query($eintrag);

	$eintrag = "INSERT INTO  answer (Answer, solution, questionsIDFS) values ('$answer5','$check4','$IDFS')";
	$insert = mysql_query($eintrag);	


	if($insert){
		echo "<h3>Send was successful!</h3><hr>";
		header("Location:index.php"); 
	}else{
		echo "<h3>Something went wrong</h3><br>";
	}
}else{
	echo "Something went Wrong, please try again.";
}


mysql_close($connection);				
?>
