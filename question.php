<!DOCTYPE html>
<html>
<head>
<?php include("header.php");  ?>
	<link rel="stylesheet" href="css/css.css">
	<meta charset="UTF-8">
	<title>Questions about Java 8</title>
</head>
<body>


<div align="center">
	<div align="left" id="questionForm">
		<?php
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		?>

		<div  class="accordion-contentQuest">
		<div align="center">
		</div>
			<form action="ActionOfShowQuestions.php?questionNr=<?php echo $_GET['question']?>" method="POST"><br>
				<?php 
				$i=1;
				$connection = mysql_connect("172.16.44.4", "tie", "")
				or die("Fehler im System");

				mysql_select_db("java8_evaluation")
				or die("Verbindung nicht möglich");

				$questionNr = $_GET["question"];
				$abfrage = "SELECT ID, questions, information, type FROM questions WHERE ID=$questionNr";
				$ergebnis = mysql_query($abfrage);
				while($row = mysql_fetch_object($ergebnis)){	
					?>
					<label class="navi"><b><?php echo $row -> questions?></b></label><hr>	
					<?php  if($row -> information !="") { ?>						
					<label class="navi"><b><?php echo nl2br($row -> information)?></b></label><hr>

				<?php }?>
					
					<?php $type = $row -> type;								
				}	

				mysql_close($connection);										
				$connection = mysql_connect("172.16.44.4", "tie" ,"")
				or die("Fehler im System");

				mysql_select_db("java8_evaluation")
				or die("Verbindung nicht möglich");

				$questionNr = $_GET["question"];
				$abfrage = "SELECT ID, Answer FROM answer WHERE QuestionsIDFS=$questionNr" ;
				$ergebnis = mysql_query($abfrage);
				while($row = mysql_fetch_object($ergebnis)){ 
					if($type=="checkbox"){	
						?> 
						<label class="navi"><input class="navi"   type="checkbox"	name="selectedAnswer[]" value=<?php echo   $row -> ID ?>> <?php  echo $row -> Answer. "<br>"?> </label>
						<br>
						<?php	
					}else if($type=="textbox"){
						?>
						<label class="navi"><input  class="navi"  type="textbox"	name="selectedAnswer" value="">  </label><br>
						<?php 
						break;
					}
				}
				mysql_close($connection);
				?>					
				<div align="right">
				<br><input  id="submit" type="submit" value="sendIt"> <br>					
			</div>
			</form>					
		</div>
		<form  action="qr_code.php?url=<?php echo $actual_link ?>" method="POST"> 
			<input  id="submit" type="submit" value="Qr-Code"> 
		</form>
</div>

	<div id="centerDivMobile">
	<div class="accordion-content" align="left">						
		<details>
	<summary>
		<h3 id="questionTitle">Questions:</h3>
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
		<h3 id="questionTitle">solved Questions:</h3>
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
	<br>
<br>
</div>
</div>
</body>
</html>
