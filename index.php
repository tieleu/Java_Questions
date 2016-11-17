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

		<div class="accordion-content" align="left">						
			<details>
				<summary>
					<h3 id="questionTitle">Questions</h3>
				</summary>
				<?php 
					$connection = mysql_connect("172.16.44.4", "tie", "")
					or die("Fehler im System");
						
					mysql_select_db("java8_evaluation")
					or die("Verbindung nicht möglich");

					$abfrage = "SELECT ID,Questions, QuestionDefinition, oldQuestion FROM questions";
					$ergebnis = mysql_query($abfrage);
					$i = 1;
						
					while($row = mysql_fetch_object($ergebnis)){	
						if($row ->oldQuestion ==0){
				?>
						<div class="list-group">
							<tr>
								<td>
								    <a class="list-group-item active" href="question.php?question=<?php echo $row -> ID?> ">
						  		        <h4 class="list-group-item-heading"><?php echo  $row -> QuestionDefinition ?></h4>
								    	<p class="list-group-item-text"> <?php echo  $row -> Questions ?></p>				 		     
								 		</a>
								</td>
							</tr>
						</div>						
				<?php
					}
				}
				mysql_close($connection);
				?>
				</details>
			</div>	
			<div  class="accordion-content">								
				<details>
				<summary>
					<h3 id="questionTitle">solved Questions</h3>
				</summary>
			<?php 									
				$connection = mysql_connect("172.16.44.4", "tie", "")
				or die("Fehler im System");

				mysql_select_db("java8_evaluation")
				or die("Verbindung nicht möglich");

				$abfrage = "SELECT ID,Questions, QuestionDefinition, oldQuestion FROM questions";
				$ergebnis = mysql_query($abfrage);
				$i = 1;
				while($row = mysql_fetch_object($ergebnis)){	
			?> 
				<?php if($row ->oldQuestion ==1){ ?>
				<tr>
					<div class="list-group">
					    <a class="list-group-item active" href="question.php?question=<?php echo $row -> ID?> ">
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
		</details>															
	</div>
	</div>
	<br>
</body>
</html>
