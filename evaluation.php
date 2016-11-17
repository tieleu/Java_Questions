<!DOCTYPE html>
<html>
<head>
<?php include("header.php");  
?>
	<link rel="stylesheet" href="css/css.css">
	<meta charset="UTF-8">
	<title>Result</title>
</head>
<body>


	<div align="center">
		<div id="accordion-content" align="left">
			<div id="wrapper" align="center">
				<table id="evaluationTable" border="1">
					<?php  					
					$connection = mysql_connect("172.16.44.4", "tie", "")
					or die("Fehler im System");
					mysql_select_db("java8_evaluation")
					or die("Verbindung nicht möglich");
					$questionNr = $_GET['questionNr'];
					
					$abfrage = "SELECT * FROM answer WHERE QuestionsIDFS=$questionNr" ;
					$ergebnis = mysql_query($abfrage);

					$abfrageQuestion = "SELECT * FROM questions WHERE ID =$questionNr" ;
					$ergebnisQuestion = mysql_query($abfrageQuestion);

					echo "<h1 id='questionTitle'>Evaluation </h1>" ;
					while($row1 = mysql_fetch_object($ergebnisQuestion)){
						echo"<tr><th>".$row1 -> Questions ."</th><th>elected Times</th><th>Solution</th> </tr>";

						while($row = mysql_fetch_object($ergebnis)){
							echo"<tr><td>". $row-> Answer ."</td>";

							echo"<td>". $row -> Selected_answer ."</td>";;	

							if($row -> Solution ==1){
								echo "<td id='true'>true </td></tr>";
							}else{
								echo "<td id='false'>false</td></tr>";
							}
						}				
						?>
					</table>
				</div>
				<hr>
				<div id="accordion-content" align="center"><?php
					echo "<h1 id='declaration'>Declaration: </h1>";
					echo $row1 -> declaration; ?>
				</div>
				<?php
			}
			mysql_close($connection); ?>
		</div>
	</div>
</body>
</html>
