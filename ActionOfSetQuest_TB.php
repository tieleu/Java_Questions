<?php						
$connection = mysql_connect("172.16.44.4", "tie", "")
or die("Fehler im System");

mysql_select_db("java8_evaluation")
or die("Verbindung nicht möglich");


if(isset($_POST['questions']) AND isset($_POST['textAnswer'])){

	$question = $_POST['questions'];
	$information = $_POST['information'];
	
	$textAnswer = 	$_POST['textAnswer'];		
	$eintrag = "INSERT INTO  questions (questions, information, type, oldQuestion) values ('$question', '$information','textbox',0)";

	$insert = mysql_query($eintrag);

	$toQuest  = "SELECT max(ID) AS max FROM questions";
	$ergebnis = mysql_query($toQuest);
	while($row = mysql_fetch_object($ergebnis)){	
		$IDFS = $row -> max;
	}
	
	$eintrag = "INSERT INTO  answer (answer, solution, questionsIDFS ) values ('$textAnswer',1,'$IDFS')";
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
