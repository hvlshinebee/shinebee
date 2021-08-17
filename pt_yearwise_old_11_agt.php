<?php
/*	session_start();
									
	if(isset($_SESSION['user_email']))
	{
		$user = $_SESSION['user_email'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please login to proceed further');</script>";
		header("Location:login.php"); 
	}
	*/
	$servername = "localhost";
	$username = "hvlias";
	$password = "hvlias@123";
	$db = "db1";
	$connection = mysqli_connect($servername, $username, $password,$db);
	
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
        $sql = "select * from prelims_questions order by year desc, question_number asc limit 1";

		//$user = 'Manish'; //take it from session
		
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result))
        {
			
            $question = $row['question'];
            $option1 = $row['option1'];
            $option2 = $row['option2'];
			$option3 = $row['option3'];
            $option4 = $row['option4'];
            $correct_option = $row['correct_option'];
			$answer_description = $row['answer_description'];
            $question_year = $row['year'];
			$question_number = $row['question_number'];
            $tags = $row['tags'];
			$topic = $row['topic'];
            $question_type = $row['question_type'];
			
        }
		
		$user_next_question_sql = "select * from prelims_questions_answer where year='$question_year' and user_id='$user' and question_number=$question_number";
		
		//echo $user_next_question_sql.'<br/>';
		$user_result_next_question_sql = mysqli_query($connection, $user_next_question_sql);
		$user_row_result_next_question_sql = mysqli_num_rows($user_result_next_question_sql);
			
		$tags_present = "";
		$mythinking_present = "";
		$mynotes_present = "";
			
			//echo "user_next_question_sql=".$user_next_question_sql."<br/>";
			
			//echo $user_row_result_next_question_sql.'<br/>';
			
		if ($user_row_result_next_question_sql>0)
		{
			while ($user_row_result = mysqli_fetch_assoc($user_result_next_question_sql))
			{
				$tags_present = $user_row_result['tags'];
				$mythinking_present = $user_row_result['mythinking'];
				$mynotes_present = $user_row_result['mynotes'];
			}
		}
	
	//echo $mynotes_present.'<br/>';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shinebee</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		<link href="css/footer.css" rel="stylesheet" />
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script src="https://cdn.tiny.cloud/1/ft9c9ta4cebofv813g1y700hzehggo1ajs0u3akdy6lw0fz1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
    tinymce.init({
      selector: '#fdg'
    });
  </script>
		
		<script>
		$.ajaxSetup({
			timeout: 10000
		});

			$(document).ready(function(){
				$("#nextButton").click(function(){
					
					var dataToSend = {year : document.getElementById('question_year').innerHTML,
					question_number: document.getElementById('question_number').innerHTML,
					tags: document.getElementById('tags_value').value,
					mynotes: document.getElementById('mynotes').value,
					user: document.getElementById('user').innerHTML,
					mythinking: document.getElementById('mythinking').value};
					//alert(document.getElementById('mythinking').value);
					
					$.post("pt_question_answer.php", dataToSend, function(data)
					{
						var pasedData = JSON.parse(data);
						//console.log(data);
						var isNextAvailable = pasedData.is_next_available;
					
						//alert(JSON.stringify(pasedData));
						if(isNextAvailable === "true")
						{
							if(pasedData.usercomment!= "")
						{
								var usercomment = pasedData.usercomment;
								var i, len, text;
								for (i = 0, len = usercomment.length, text = ""; i < len; i++) {
								text +="User Name:"+usercomment[i].user +"<br>Comment:"+ usercomment[i].mythinking_present + "<br>";
								}
								document.getElementById("ucomment").innerHTML = text;
						}
							document.getElementById("question_year").innerHTML = pasedData.question_year;
							document.getElementById("question_number").innerHTML = pasedData.question_number;
							document.getElementById("question").innerHTML = pasedData.question_number.concat(".) ", pasedData.question);
							document.getElementById("option1").innerHTML = "A) ".concat(pasedData.option1);
							document.getElementById("option2").innerHTML = "B) ".concat(pasedData.option2);
							document.getElementById("option3").innerHTML = "C) ".concat(pasedData.option3);
							document.getElementById("option4").innerHTML = "D) ".concat(pasedData.option4);
							document.getElementById("correct_option").innerHTML = "Answer Option : ".concat(pasedData.correct_option);
							document.getElementById("answer_description").innerHTML = pasedData.answer_description;
							document.getElementById("question_type").innerHTML = "Question type: ".concat(pasedData.question_type);
							document.getElementById("topic").innerHTML = "Topic: ".concat(pasedData.topic);
					
							document.getElementById("tags_value").value = pasedData.tags_value;
							document.getElementById("mynotes").value = pasedData.mynotes;
							document.getElementById("mythinking").value = pasedData.mythinking;
							document.getElementById("previousButton").disabled = false;
							
							document.getElementById(pasedData.question_year.concat("_", pasedData.question_number)).className = "btn btn-warning";
						
							//highlight question_number button on the left
						}
						else
						{
							//disable next button
							document.getElementById("question_year").innerHTML = pasedData.question_year;
							document.getElementById("question_number").innerHTML = parseInt(pasedData.question_number)+1;
							document.getElementById("question").innerHTML = pasedData.error;
							document.getElementById("option1").innerHTML = "";
							document.getElementById("option2").innerHTML = "";
							document.getElementById("option3").innerHTML = "";
							document.getElementById("option4").innerHTML = "";
							document.getElementById("correct_option").innerHTML = "";
							document.getElementById("answer_description").innerHTML = "";
							document.getElementById("question_type").innerHTML = "";
							document.getElementById("topic").innerHTML = "";
					
							document.getElementById("tags_value").value = "";
							document.getElementById("mynotes").value = "";
							document.getElementById("mythinking").value = "";
							
							document.getElementById("nextButton").disabled = true;
						}
						
					});
				});
			});
		</script>

		<script>
		$.ajaxSetup({
			timeout: 10000
		});
			$(document).ready(function(){
				$("#previousButton").click(function(){
					
					var dataToSend = {year : document.getElementById('question_year').innerHTML,
					question_number: document.getElementById('question_number').innerHTML,
					tags: document.getElementById('tags_value').value,
					mynotes: document.getElementById('mynotes').value,
					user: document.getElementById('user').innerHTML,
					mythinking: document.getElementById('mythinking').value};
					//alert(document.getElementById('mythinking').value.concat(document.getElementById('question_year').innerHTML).concat(document.getElementById('question_number').innerHTML));
					
					$.post("pt_question_answer_previous.php", dataToSend, function(data)
					{
						var pasedData = JSON.parse(data);
						//console.log(data);
						var isNextAvailable = pasedData.is_next_available;
					
						//alert(JSON.stringify(pasedData));
						if(isNextAvailable === "true")
						{
							if(pasedData.usercomment!= "")
						{
								var usercomment = pasedData.usercomment;
								var i, len, text;
								for (i = 0, len = usercomment.length, text = ""; i < len; i++) {
								text +="User Name:"+usercomment[i].user +"<br>Comment:"+ usercomment[i].mythinking_present + "<br>";
								}
								document.getElementById("ucomment").innerHTML = text;
						}
							document.getElementById("question_year").innerHTML = pasedData.question_year;
							document.getElementById("question_number").innerHTML = pasedData.question_number;
							document.getElementById("question").innerHTML = pasedData.question_number.concat(".) ", pasedData.question);
							document.getElementById("option1").innerHTML = "A) ".concat(pasedData.option1);
							document.getElementById("option2").innerHTML = "B) ".concat(pasedData.option2);
							document.getElementById("option3").innerHTML = "C) ".concat(pasedData.option3);
							document.getElementById("option4").innerHTML = "D) ".concat(pasedData.option4);
							document.getElementById("correct_option").innerHTML = "Answer Option : ".concat(pasedData.correct_option);
							document.getElementById("answer_description").innerHTML = pasedData.answer_description;
							document.getElementById("question_type").innerHTML = "Question type: ".concat(pasedData.question_type);
							document.getElementById("topic").innerHTML = "Topic: ".concat(pasedData.topic);
					
							document.getElementById("tags_value").value = pasedData.tags_value;
							document.getElementById("mynotes").value = pasedData.mynotes;
							document.getElementById("mythinking").value = pasedData.mythinking;
							
							document.getElementById(pasedData.question_year.concat("_", pasedData.question_number)).className = "btn btn-warning";
							
							document.getElementById("nextButton").disabled = false;
						
							//highlight question_number button on the left
						}
						else
						{
							//disable previous button
							document.getElementById("question_year").innerHTML = pasedData.question_year;
							document.getElementById("question_number").innerHTML = parseInt(pasedData.question_number)-1;
							document.getElementById("question").innerHTML = pasedData.error;
							document.getElementById("option1").innerHTML = "";
							document.getElementById("option2").innerHTML = "";
							document.getElementById("option3").innerHTML = "";
							document.getElementById("option4").innerHTML = "";
							document.getElementById("correct_option").innerHTML = "";
							document.getElementById("answer_description").innerHTML = "";
							document.getElementById("question_type").innerHTML = "";
							document.getElementById("topic").innerHTML = "";
							
							document.getElementById("tags_value").value = "";
							document.getElementById("mynotes").value = "";
							document.getElementById("mythinking").value = "";
							
							document.getElementById("previousButton").disabled = true;
						}
						
					});
				});
			});
		</script>


		<!-- this is for left buttons -->
		<script>
		$.ajaxSetup({
			timeout: 10000
		});
			$(document).ready(function(){
				$(".question_button").click(function(){
					
					var year_id = this.id;
					var fields = year_id.split('_');

					var year_button = fields[0];
					var question_id_button = fields[1];
					
					var dataToSend = {year : document.getElementById('question_year').innerHTML,
					question_number: document.getElementById('question_number').innerHTML,
					tags: document.getElementById('tags_value').value,
					mynotes: document.getElementById('mynotes').value,
					mythinking: document.getElementById('mythinking').value,
					user: document.getElementById('user').innerHTML,
					year_to_get:year_button,
					question_number_to_get:question_id_button};
					
					
					//alert(document.getElementById('mythinking').value.concat(document.getElementById('question_year').innerHTML).concat(document.getElementById('question_number').innerHTML));
					
					$.post("pt_question_answer_left_button.php", dataToSend, function(data)
					{
						var pasedData = JSON.parse(data);
						//console.log(data);
						var isNextAvailable = pasedData.is_next_available;
					
						//alert(JSON.stringify(pasedData));
						if(isNextAvailable === "true")
							{
							if(pasedData.usercomment!= "")
						{
								var usercomment = pasedData.usercomment;
								var i, len, text;
								for (i = 0, len = usercomment.length, text = ""; i < len; i++) {
								text +="User Name:"+usercomment[i].user +"<br>Comment:"+ usercomment[i].mythinking_present + "<br>";
								}
								document.getElementById("ucomment").innerHTML = text;
						}
							document.getElementById("question_year").innerHTML = pasedData.question_year;
							document.getElementById("question_number").innerHTML = pasedData.question_number;
							document.getElementById("question").innerHTML = pasedData.question_number.concat(".) ", pasedData.question);
							document.getElementById("option1").innerHTML = "A) ".concat(pasedData.option1);
							document.getElementById("option2").innerHTML = "B) ".concat(pasedData.option2);
							document.getElementById("option3").innerHTML = "C) ".concat(pasedData.option3);
							document.getElementById("option4").innerHTML = "D) ".concat(pasedData.option4);
							document.getElementById("correct_option").innerHTML = "Answer Option : ".concat(pasedData.correct_option);
							document.getElementById("answer_description").innerHTML = pasedData.answer_description;
							document.getElementById("question_type").innerHTML = "Question type: ".concat(pasedData.question_type);
							document.getElementById("topic").innerHTML = "Topic: ".concat(pasedData.topic);
					
							document.getElementById("tags_value").value = pasedData.tags_value;
							document.getElementById("mynotes").value = pasedData.mynotes;
							document.getElementById("mythinking").value = pasedData.mythinking;
							
							document.getElementById(pasedData.question_year.concat("_", pasedData.question_number)).className = "btn btn-warning";
							
							document.getElementById("nextButton").disabled = false;
						
							//highlight question_number button on the left
						}
						else
						{
							//disable previous button
							document.getElementById("question_year").innerHTML = pasedData.question_year;
							document.getElementById("question_number").innerHTML = parseInt(pasedData.question_number)-1;
							document.getElementById("question").innerHTML = pasedData.error;
							document.getElementById("option1").innerHTML = "";
							document.getElementById("option2").innerHTML = "";
							document.getElementById("option3").innerHTML = "";
							document.getElementById("option4").innerHTML = "";
							document.getElementById("correct_option").innerHTML = "";
							document.getElementById("answer_description").innerHTML = "";
							document.getElementById("question_type").innerHTML = "";
							document.getElementById("topic").innerHTML = "";
					
							document.getElementById("tags_value").value = "";
							document.getElementById("mynotes").value = "";
							document.getElementById("mythinking").value = "";
							
							document.getElementById("previousButton").disabled = true;
						}
						
						if(question_id_button === "1")
						{
							document.getElementById("previousButton").disabled = true;
						}
						else
						{
							document.getElementById("previousButton").disabled = false;
						}
						
					});
				});
			});
		</script>
    </head>
    <body>

			<?php include 'topheader.php'; ?>
                <!-- Page content-->
				<br/>
                <div class="container-fluid">
                    <div class="row">
						<div class="col-sm-2" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
							
							<?php 
								$sql_year = "select * from prelims_question_number order by year desc";
								$result_year = mysqli_query($connection, $sql_year);	
								
								$is_first = "true";
								
								while ($row_year = mysqli_fetch_assoc($result_year))
								{
									$year = $row_year['year'];
									$number_of_question = $row_year['number_of_question'];
									
									$tag = "#year".$year;
									$tag2 = "year".$year;

									echo '<div class="row" style="margin-bottom:3px">';
									echo '<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="'.$tag.'" aria-expanded="true" aria-controls="'.$tag2.'">'.$year.'</button>';
									echo '<div class="collapse" id="'.$tag2.'">';

									for ($x = 1; $x <= $number_of_question; $x++) 
									{
										$year_question_num = $year."_".$x;
										
										if($is_first == "true")
										{
											echo '<button id="'.$year_question_num.'" class="btn btn-warning question_button">'.$x.'</button><br/>';
											$is_first = "false";
										}
										else
										{
											echo '<button id="'.$year_question_num.'" class="btn btn-primary question_button">'.$x.'</button><br/>';
										}
									}
									
									echo '</div>';
									echo '</div>';
								}
							?>
							
						</div>
						
						<div class="col-sm-7" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
						<h4 style="text-align:center">Question</h4>
							<div class="row" style="background-color: #f5eaea; border-radius:5px;">
							
							<div class="col-sm-1 my-auto">
								<button type="button" class="btn btn-primary float-left" name="Previous" value="Previous" id="previousButton" <?php echo "disabled"; ?> ><</button>
							</div>
							<div class="col-sm-10" style="background-color: #fff4f4">
							<p id="user" hidden><?php echo $user;?></p>
							<p id="question_number" hidden><?php echo $question_number;?></p>
							<p id="question_year" hidden><?php echo $question_year;?></p>
							<p id="question" style="color:black"><?php echo $question_number.". ".$question."<br/>"; ?></p>
							<p id="option1" style="color:black"><?php echo "A) ".$option1; ?></p>
							<p id="option2" style="color:black"><?php echo "B) ".$option2; ?></p>
							<p id="option3" style="color:black"><?php echo "C) ".$option3; ?></p>
							<p id="option4" style="color:black"><?php echo "D) ".$option4; ?></p>
							</div>

							<div class="col-sm-1 my-auto">
								<button type="button" class="btn btn-primary float-right" name="Next" value="Next" id="nextButton">></button>
							</div>
							
							</div>
							<br/>
							
							<div class="row">
								<div class="col-sm-4">
									<p>The answer will be submitted automatically on switching to another question</p>
								</div>
								
								<div class="col-sm-4 text-center">
									<button type="button" class="btn btn-info btn-lg" data-toggle="collapse" data-target="#answerCollapse" aria-expanded="false" aria-controls="answerCollapse">View Answer</button>
								</div>

								<div class="col-sm-4">
									
								</div>
							</div>
							
							<div id="answerCollapse" class="collapse" style="margin-top:5px">
								<div>
									<h4 class="modal-title" style="color:black" id="correct_option"><?php echo "Answer Option : ".$correct_option;?></h4> <br/>
									<p style="color:black" id="answer_description"> <?php echo $answer_description; ?> </p>
								</div>
							</div>
									
							<br/>
							<br/>
							<hr>
							<b class="float-left" id="topic"><?php echo "Topic: ".$topic; ?></b>
							<b class="float-right" id="question_type"><?php echo "Question Type: ".$question_type; ?></b>
							<br/>
							<hr>
							
							Tags: <span id="internal_tags"><?php echo $tags ; ?></span> <input class="form-control" id="tags_value" <?php echo 'value="'.$tags_present.'"' ; ?> type="text"/><br/>
							Problem Solving Strategy:
							<?php 
								echo "Strategy";
							?>
						</div>
						
						<div class="col-sm-3" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
							<div class="row" style="margin-bottom:3px">
							<div id="ucomment">
							<?php
							
							$user_question_sql = "select * from prelims_questions_answer where year='$question_year' and question_number=$question_number";
							$user_resul_tuser_questionsql = mysqli_query($connection, $user_question_sql);
							$row_result_next_question_sql = mysqli_num_rows($user_resul_tuser_questionsql);
							$arrayrow=array();
							while ($mrow_result = mysqli_fetch_assoc($user_resul_tuser_questionsql))
							{
							if($mrow_result['mythinking']!=''){
							echo "user id: ".$mrow_result['user_id'];
							echo "<br>Comment: ".$mrow_result['mythinking'];
							echo "<br>";
							}
							}
							?>
							
							</div>
								<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#thinking" aria-expanded="true" aria-controls="thinking">Your Comments </button>
								<br/>
								<div class="collapse" id="thinking" style="margin-top:3px">
									<textarea class="form-control" rows="10" cols="30" id="mythinking"></textarea><?php echo $mythinking_present; ?><br/>
								</div>
							</div>
							
							<div class="row" style="margin-bottom:3px">
								<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#mynotesUpper" aria-expanded="true" aria-controls="mynotesUpper">Make Notes</button>
								<br/>
								<div class="collapse" id="mynotesUpper" style="margin-top:3px">
									<textarea class="form-control" rows="10" cols="30" id="mynotes"><?php echo $mynotes_present; ?></textarea> <br/>
								</div>
							</div>
						</div>

					</div>
					<br/>
					<div class="row">
						<div class="col-sm-2">
							
						</div>
				
						
						<div class="col-sm-2">
							
						</div>
					</div>
                </div>
		
		
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme 
        <script src="js/scripts.js"></script> JS-->
		
		<br/>
		<br/>
		
		<hr>
		
		<br/>
		<br/>
		
		<?php include 'footer.html'; ?>
    </body>
</html>
