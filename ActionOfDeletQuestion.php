<?php


$questionIDFS =  $_GET["questionIDFS"];

	$connection = mysql_connect("172.16.44.4", "tie", "")
or die("Fehler im System");

mysql_select_db("java8_evaluation")
or die("Verbindung nicht möglich");


$abfrage = "DELETE questions  FROM questions WHERE id=$questionIDFS";
$ergebnis = mysql_query($abfrage);  


$abfrage1 = "DELETE answer  FROM answer WHERE QuestionsIDFS=$questionIDFS";
$ergebnis1 = mysql_query($abfrage1);  


mysql_close($connection);
		header("Location:index.php"); 
?>