<!DOCTYPE html>
<html>
<head>
<?php include("header.php");  ?>
	<link rel="stylesheet" href="css/css.css">
	<meta charset="UTF-8">
	<title>Result</title>
</head>
<body>
			<div  class="accordion-content">								
			<h3 id="questionTitle">All Questions: </h3>

			<?php 									
				$connection = mysql_connect("172.16.44.4", "tie", "")
				or die("Fehler im System");

				mysql_select_db("java8_evaluation")
				or die("Verbindung nicht möglich");

				$abfrage = "SELECT ID,Questions, QuestionDefinition, oldQuestion,CategoryIDFK FROM questions";
				$ergebnis = mysql_query($abfrage);
				$i = 1;

				while($row = mysql_fetch_object($ergebnis)){	
			?> 
				<?php if($row ->oldQuestion ==1){ ?>
				<tr>
					<div class="list-group">
					    <a class="list-group-item active" href="evaluation.php?questionNr=<?php echo $row -> ID?> ">
			  		       <h4 class="list-group-item-heading"><?php echo  $row -> QuestionDefinition ?></h4>
					    <p class="list-group-item-text"> <?php echo  $row -> Questions ?></p>				 		     
					  </a>
				</div>
			</tr>
		<?php
			}
		}
			mysql_close($connection);
		?>														
	<br>
	</body>
	</html>
