
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

    </head>
    <body>
				<?php include 'topheader.php'; ?>
	
				<div class="container-fluid">
				<?php
				$user = "";
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
					$servername = "localhost";
					$username = "hvlias";
					$password = "hvlias@123";
					$db = "db1";
					$connection = mysqli_connect($servername, $username, $password,$db);
					
					if($connection === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}
					
					$quiz_id = $_GET['id'];
					//$user = 'Manish';
					
					echo '<h2>Quiz Report</h2>';
					
					$sql_join = "select quiz_questions.correct_option as correct_option, quiz_questions.question as question, 
					quiz_questions.question_number as question_number, quiz_questions.quiz_id as quiz_id, quiz_questions.option1 
					 as option1, quiz_questions.option2 as option2, quiz_questions.option3 as option3, 
					 quiz_questions.option4 as option4, quiz_answer.attempted_option as attempted_option, quiz_answer.attempt_id as attempt_id from quiz_answer
					 join quiz_questions on quiz_questions.question_number = quiz_answer.question_number and
					 quiz_questions.quiz_id = quiz_answer.quiz_id where 
					 quiz_answer.user_id='$user' and quiz_questions.quiz_id=$quiz_id order by quiz_answer.attempt_id";
					
					//echo "sql_join=".$sql_join."<br/>";
					

					$result_join = mysqli_query($connection, $sql_join);
					$x = 1;
					
					$attempt = 1;
					echo '<h4>Attempt 1</h4>';
					
					while ($row_join = mysqli_fetch_assoc($result_join))
					{
						$correct_option = $row_join['correct_option'];
						$question = $row_join['question'];
						$question_number = $row_join['question_number'];
						$quiz_id = $row_join['quiz_id'];
						$attempted_option = $row_join['attempted_option'];
						
						$option1 = $row_join['option1'];
						$option2 = $row_join['option2'];
						$option3 = $row_join['option3'];
						$option4 = $row_join['option4'];
						
						echo '<div class="jumbotron jumbotron-fluid">';
						echo '<span style="font-size: 25px; color:blue; margin-left:5px;">'.$question_number.'. '.$question.'</span><br/>';
						echo '<span style="font-size:20px;color:black; margin-left:5px;">A) '. $option1.'</span><br/>';
						echo '<span style="font-size:20px;color:black; margin-left:5px;">B) '. $option2.'</span><br/>';
						echo '<span style="font-size:20px;color:black; margin-left:5px;">C) '. $option3.'</span><br/>';
						echo '<span style="font-size:20px;color:black; margin-left:5px;">D) '. $option4.'</span><br/><br/>';
							
						$color = "green";
						
						if($attempted_option != $correct_option)
						{
							$color = "red";
							
						}
							
						echo '<span style="font-size:20px;color:'.$color.'; margin-left:5px;">Attempted Option: '.$attempted_option.'</span><br/>';
						echo '<span style="font-size:20px;color:green; margin-left:5px;">Correct Option: '.$correct_option.'</span><br/>';
						
							
						echo '</div>';
						
						if(fmod($x, 10) == 0)
						{
							$attempt++;
							echo '<br/>';
							echo '<hr>';
							echo '<br/>';
							echo '<h4>Attempt '.$attempt.'</h4>';
							echo '<br/>';
						}
						
						$x++;
					}
?>
				
            </div>
			
				
		
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme 
        <script src="js/scripts.js"></script> JS-->

		
		<?php include 'footer.html'; ?>
    </body>
</html>



