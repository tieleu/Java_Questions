<!DOCTYPE html>
<html>
<head>
<?php include("header.php");  ?>
		<link rel="stylesheet" href="css/css.css">
	<meta charset="UTF-8">
	<title>JAVA QUIZ</title>
</head>
<body>
<div>
	<div align="center" class="inline">	
			<div class="accordion-contentCreate floatLeft">
<p>thats a test</p>
				<details>
					<summary>Create Questions with Checkbox</summary>	
					  <hr>
					<form class="form-horizontal" action="ActionOfSetQuest.php" method="POST">

					  <div class="form-group">
					    <div class="col-sm-10">
					    <label>Question Declaration</label>
					      <input  required="true" name="questionDecleration" class="form-control"  placeholder="">
					    </div>
					  </div>
					  <hr>

					  <div class="form-group">
					    <div class="col-sm-10">
					    <label>Some more Informations</label>
							<textarea required="true" name="information" rows="3"  class="form-control" placeholder=""></textarea>
					    </div>
					  </div>
	   				  <div class="form-group">
					    <div class="col-sm-10">
					     		 <input required="true" name="questions" type="textbox" class="form-control"  placeholder="Question">
					    </div>
					  </div>
					    <hr>

					  <div class="form-group">
					    <div class="col-sm-10">
					     		 <input required="true" name="answer1" type="textbox" class="form-control"  placeholder="Answer">
					    </div>
		            	<label><input  name="check"  value="1" type="radio"> is true</label> 
					  </div>	

					  <div class="form-group">
					  	<div class="col-sm-10">
					      	 <input required="true"  name="answer2" type="textbox" class="form-control"  placeholder="Answer">
						</div>
				        <label class="checkboxOfCreateAQuestion"><input name="check1"  value="1"  type="radio"> is true</label>  	
					  </div>

					  <div class="form-group">
					    <div class="col-sm-10">
					      <input required="true"  name="answer3" type="textbox" class="form-control"  placeholder="Answer">
					    </div>
					      	<label class="checkboxOfCreateAQuestion"><input  value="1" name="check2" type="radio"> is true</label> 
					  </div>

					  <div class="form-group">
					    <div class="col-sm-10">
					      <input required="true" name="answer4" type="textbox" class="form-control"  placeholder="Answer">
					    </div>
					    	<label class="checkboxOfCreateAQuestion"><input  name="check3" value="1" type="radio"> is true</label> 
					  </div>

					  <div class="form-group">
					    <div class="col-sm-10">
					  <input name="answer5" required="true" type="textbox" class="form-control" placeholder="Answer">
					    </div>
					       	<label class="checkboxOfCreateAQuestion"><input  value="1" name="check4" type="radio"> is true</label> 
					  </div>
					<hr>
					  <div class="form-group">
					    <div class="col-sm-10">
					    <label>Declaration</label>
					         <textarea required="true"  name="declaration" rows="2"  class="form-control" placeholder=""></textarea>
					    </div>
					  </div>	
					  <div align="right">				  				  					  					  
				<input id="submit" type="submit" value="Send"> <br>
				</div>			
					</form>
				</details>
			</div>
			<div class="accordion-contentCreate floatRight" >
				<details>
					<summary>Create Questions with Inputfield</summary>	
					  <hr>
					<form class="form-horizontal" action="ActionOfSetQuest.php" method="POST">

					  <div class="form-group">
					    <div class="col-sm-10">
					    <label>Question Declaration</label>
					      <input  required="true" name="questionDecleration" class="form-control"  placeholder="">
					    </div>
					  </div>
					  <hr>

					  <div class="form-group">
					    <div class="col-sm-10">
					    <label>Some more Informations</label>
							<textarea required="true"  rows="3"  class="form-control" placeholder=""></textarea>
					    </div>
					  </div>
					  <hr>
				  <div class="form-group">
					    <div class="col-sm-10">
					      <input required="true" class="form-control"   placeholder="Question">
					    </div>
					  </div>
					  <hr>
					  <div class="form-group">
					    <div class="col-sm-10">
					     		 <input required="true" type="textbox" class="form-control"  placeholder="Answer">
					    </div>
					  </div>	
					    <hr>				

					  <div class="form-group">
					    <div class="col-sm-10">
					    <label>Declaration</label>
					         <textarea required="true"  rows="3"  class="form-control" placeholder=""></textarea>
					    </div>
					  </div>					  				  					  					  
					  <div align="right">				  				  					  					  
				<input required="true" id="submit" type="submit" value="Send"> <br>
				</div>		
					</form>
				</details>

			</div>
		</div>
</div>
</body>
</html>
