<!DOCTYPE html>
<html>
<head>
<?php include("header.php");  ?>
	<link rel="stylesheet" href="css/css.css">
</head>
<meta charset="UTF-8">
<title>Questions about Java 8</title>
</head>
<body>
	<div id="centerDivMobile">
	<div align="center" id="questionForm">
	<div class="accordion-contentQuest" align="left">						
		<h3 id="questionTitle">All Questions:</h3>
		<?php 

			$connection = mysql_connect("172.16.44.4", "tie", "")
			or die("Fehler im System");
				
			mysql_select_db("java8_evaluation")
			or die("Verbindung nicht möglich");

			$abfrage = "SELECT ID,Questions, QuestionDefinition, oldQuestion FROM questions";
			$ergebnis = mysql_query($abfrage);
			$i = 1;
			while($row = mysql_fetch_object($ergebnis)){	
				$id = $row -> id;		
			?>
				<div class="list-group">

					<form method="POST" action="ActionOfDeletQuestion.php?questionIDFS=<?php echo  $row -> ID ?>"> <br>
					<div  class="list-group-item active">
					    <h4 class="list-group-item-heading"><?php echo  $row -> QuestionDefinition ?></h4>
					        <p class="list-group-item-text"> <?php echo  $row -> Questions ?></p>	
					</div>
					<div align="right">
						<input type="submit" name="Delet" value="Delet"><br><br>	
						</div>		 		     			 
					</form>	
				</div>
		<?php											
			}
			mysql_close($connection);
		?>
		</div>
		</div>
		</div>
	<br>
</body>
</html>