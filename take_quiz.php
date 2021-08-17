<?php
		
	session_start();
									
	if(isset($_SESSION['user_email']))
	{
		$user = $_SESSION['user_email'];
	}
	else
	{
		echo '<script> alert("Please login to proceed further")</script>';
		header("Location:login.php"); 
	}
	
		$quiz_level = $_GET['quiz_level'];
		$id = $_GET['id'];
		
		$mythinking_present = "";
		$mynotes_present = "";
		
		//find out present thinking for the user of the above quiz.
		//$user = 'Manish'; //take it from session

		if($id == 1)
		{
			$class_button1 = "btn btn-warning";
			$class_button2 = "btn btn-primary";
			$class_button3 = "btn btn-primary";
		}
		if($id == 2)
		{
			$class_button1 = "btn btn-primary";
			$class_button2 = "btn btn-warning";
			$class_button3 = "btn btn-primary";
		}
		
		if($id == 3)
		{
			$class_button1 = "btn btn-primary";
			$class_button2 = "btn btn-primary";
			$class_button3 = "btn btn-warning";
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
		
		<script type="text/javascript">


			function displayTimer() {
					var minutes = document.getElementById('minutes').value;			
				    var timeleft = minutes * 60;
					
					var timeleftMinutes = minutes - 1;
					var timeleftSeconds = minutes * 60 - 1;
					
					var downloadTimer = setInterval(function(){
					timeleft--;
					document.getElementById("showtimer").textContent = timeleft;
					if(timeleft <= 0)
						clearInterval(downloadTimer);
					},1000);
			}
        </script>
		<script type="text/javascript">

			// 10 minutes from now
function displayTimer2() {			
var time_in_minutes = document.getElementById('minutes').value;
var current_time = Date.parse(new Date());
var deadline = new Date(current_time + time_in_minutes*60*1000);

run_clock('showtimer',deadline);
}

function time_remaining(endtime){
	var t = Date.parse(endtime) - Date.parse(new Date());
	var seconds = Math.floor( (t/1000) % 60 );
	var minutes = Math.floor( (t/1000/60) % 60 );
	var hours = Math.floor( (t/(1000*60*60)) % 24 );
	var days = Math.floor( t/(1000*60*60*24) );
	return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
}
function run_clock(id,endtime){
	var clock = document.getElementById(id);
	function update_clock(){
		var t = time_remaining(endtime);
		clock.innerHTML = t.minutes+' : '+t.seconds;
		if(t.total<=0){ clearInterval(timeinterval); }
	}
	update_clock(); // run function once at first to avoid delay
	var timeinterval = setInterval(update_clock,1000);
}

        </script>

    </head>
    <body>

				<?php include 'topheader.php'; ?>
                <!-- Page content-->
				<br/>
                <div class="container-fluid">
				<form class="form" method="post" action="quiz_answer.php">
                    <div class="row">
						<div class="col-sm-2" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
							
							<div class="row" style="margin-bottom:3px">
								<h3>Previous Quiz</h3><br/>
								
								
								<?php 
								
										$servername = "localhost";
										$username = "hvlias";
										$password = "hvlias@123";
										$db = "db1";
										$connection = mysqli_connect($servername, $username, $password,$db);
												
										if($connection === false){
											die("ERROR: Could not connect. " . mysqli_connect_error());
										}
										
									if(isset($_GET['quiz_level']))
									{
										$sqlAllQuiz = "SELECT distinct quiz_id, quiz_upload_date FROM quiz_questions where quiz_level=$quiz_level";
										
										$resultAllquestion = mysqli_query($connection, $sqlAllQuiz);
											
										while ($rowAll = mysqli_fetch_assoc($resultAllquestion))
										{
											$quiz_id_all = $rowAll['quiz_id'];
											$quiz_upload_date = $rowAll['quiz_upload_date'];
											
											echo '<a href="take_quiz.php?id='.$quiz_id_all.'" class="btn btn-primary" id="'.$quiz_id_all.'" style="margin-bottom:2px;">'.$quiz_upload_date.'</a>';
										}
									}
									else
									{
										//find quiz level by id and then do the above
										$id = $_GET['id'];
										
										$quiz_level = "";
										$sql_for_quiz_level = "select quiz_level from quiz_questions where quiz_id=$id";
										$result_for_quiz_level = mysqli_query($connection, $sql_for_quiz_level);
											
										while ($row_result_for_quiz_level = mysqli_fetch_assoc($result_for_quiz_level))
										{
											$quiz_level = $row_result_for_quiz_level['quiz_level'];	
										}
										
										$sqlAllQuiz = "SELECT distinct quiz_id, quiz_upload_date FROM quiz_questions where quiz_level=$quiz_level";
										
										$resultAllquestion = mysqli_query($connection, $sqlAllQuiz);
											
										while ($rowAll = mysqli_fetch_assoc($resultAllquestion))
										{
											$quiz_id_all = $rowAll['quiz_id'];
											$quiz_upload_date = $rowAll['quiz_upload_date'];
											
											echo '<a href="take_quiz.php?id='.$quiz_id_all.'" class="btn btn-primary" id="'.$quiz_id_all.'" style="margin-bottom:2px;">'.$quiz_upload_date.'</a>';
										}
									}
								
								?>
							</div>
						</div>
						
						<div class="col-sm-7" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
						<h4 style="text-align:center">Question</h4>
							<div class="row" style="border-radius:5px;">
								<div class="col-sm-10" style="background-color: #fff4f4">
									<p id="quiz_id" hidden><?php echo $id;?></p>
									
									
									
										
										<?php
												$sql = "";
												
												if(isset($_GET['quiz_level']))
												{
													$sql = "select * from quiz_questions where quiz_level=$quiz_level order by id desc limit 10";
												}
												
												if(isset($_GET['id']))
												{
													$sql = "select * from quiz_questions where quiz_id=$id";
												}
												
												$servername = "localhost";
												$username = "hvlias";
												$password = "hvlias@123";
												$db = "db1";
												$connection = mysqli_connect($servername, $username, $password,$db);
												
											if($connection === false){
												die("ERROR: Could not connect. " . mysqli_connect_error());
											}
											$result = mysqli_query($connection, $sql);
											
											while ($row = mysqli_fetch_assoc($result))
											{
												echo '<div class="jumbotron jumbotron-fluid">';
															
												echo '<div style="margin-left:5px;">';
												
												$question = $row['question'];
												$option1 = $row['option1'];
												$option2 = $row['option2'];
												$option3 = $row['option3'];
												$option4 = $row['option4'];
												$correct_option = $row['correct_option'];
												$answer_description = $row['answer_description'];
												$question_number = $row['question_number'];
												$quiz_id = $row['quiz_id'];
											
 
												echo '<p id="question" style="color:black">'.$question_number.'. '.$question.'<br/></p>';
											
												echo '<input type="radio" id="html'.$question_number.'" name="answer_'.$question_number.'" value="A">';
												echo '<label for="html'.$question_number.'" id="option1" style="color:black"> A) '.$option1.'</label><br>';
											
												echo '<input type="radio" id="css_'.$question_number.'" name="answer_'.$question_number.'" value="B">';
												echo '<label for="css_'.$question_number.'" id="option2" style="color:black"> B) '.$option2.'</label><br>';
											
												echo '<input type="radio" id="javascript'.$question_number.'" name="answer_'.$question_number.'" value="C">';
												echo '<label for="javascript'.$question_number.'" id="option3" style="color:black"> C) '.$option3.'</label><br>';
											
												echo '<input type="radio" id="javascript2'.$question_number.'" name="answer_'.$question_number.'" value="D">';
												echo '<label for="javascript2'.$question_number.'" id="option1" style="color:black"> D) '.$option4.'</label><br>';
											
												echo '<input type="hidden" name="correct_answer_'.$question_number.'" value="'.$correct_option.'">'; 
												echo '<input type="hidden" name="question_'.$question_number.'" value="'.$question_number.'">'; 
												
												echo '</div>';
												echo '</div>';
											}
										?>
										
										<input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
										<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
									

								</div>
								
							</div>
							<br/>
						</div>
						
						<div class="col-sm-3" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
							
							<div class="row" style="margin-bottom:3px">
								<div class="col-sm-5">
									<input type="number" id="minutes" placeholder="Minutes" class="form-control"><br/>
								</div>
								
								<div class="col-sm-5">
									<button id="settimer" type="button" class="btn btn-primary" onClick="displayTimer2()">Set Timer</button>
								</div>

							</div>
							
							
							<div class="row" style="margin-bottom:3px">
								<div class="col-sm-5">
									<p id="showtimer" style="font-size:20px; color:red"></p>
								</div>
							</div>
							
							
							<div class="row" style="margin-bottom:3px">
								<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#thinking" aria-expanded="true" aria-controls="thinking">Your Thinking</button>
								<br/>
								<div class="collapse" id="thinking" style="margin-top:3px">
									<textarea class="form-control" rows="10" cols="30" id="mythinking" name="mythinking"></textarea><?php echo $mythinking_present; ?><br/>
								</div>
							</div>
							
							<div class="row" style="margin-bottom:3px">
								<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#mynotesUpper" aria-expanded="true" aria-controls="mynotesUpper">Make Notes</button>
								<br/>
								<div class="collapse" id="mynotesUpper" style="margin-top:3px">
									<textarea class="form-control" rows="10" cols="30" id="mynotes" name="mynotes"><?php echo $mynotes_present; ?></textarea> <br/>
								</div>
							</div>
						</div>

					</div>
					 </form>
					<br/><br/>
					
					<div class="row" style="margin-bottom:3px">
						<div class="col-sm-4">
							<a class="btn btn-primary" href="take_quiz.php?quiz_level=1">Quiz Level 1</a>
						</div>
						
						<div class="col-sm-4">
							<a class="btn btn-primary" href="take_quiz.php?quiz_level=2">Quiz Level 2</a>
						</div>
						
						<div class="col-sm-4">
							<a class="btn btn-primary" href="take_quiz.php?quiz_level=3">Quiz Level 3</a>
						</div>
					</div>
					<br/><br/>		
                </div>

		
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme 
        <script src="js/scripts.js"></script> JS-->

		
		<?php include 'footer.html'; ?>
    </body>
</html>
