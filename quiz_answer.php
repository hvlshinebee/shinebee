
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
					
					$quiz_id = $_POST['quiz_id'];
					//$user = 'Manish';
					
					$sql_attempt = "select max(attempt_id) as max_attempt from quiz_answer where user_id='$user' and quiz_id=$quiz_id";
					
					//echo $sql_attempt;
					$result_attempt = mysqli_query($connection, $sql_attempt);

					$current_attempt = 0;
					
					while ($row_attempt = mysqli_fetch_assoc($result_attempt))
					{
						$current_attempt = $row_attempt['max_attempt'];
					}
					
					$next_attempt = $current_attempt + 1;
					
					
					$answer_1 = $_POST['answer_1'];
					$answer_2 = $_POST['answer_2'];
					$answer_3 = $_POST['answer_3'];
					$answer_4 = $_POST['answer_4'];
					$answer_5 = $_POST['answer_5'];
					$answer_6 = $_POST['answer_6'];
					$answer_7 = $_POST['answer_7'];
					$answer_8 = $_POST['answer_8'];
					$answer_9 = $_POST['answer_9'];
					$answer_10 = $_POST['answer_10'];
					
					$question_1 = $_POST['question_1'];
					$question_2 = $_POST['question_2'];
					$question_3 = $_POST['question_3'];
					$question_4 = $_POST['question_4'];
					$question_5 = $_POST['question_5'];
					$question_6 = $_POST['question_6'];
					$question_7 = $_POST['question_7'];
					$question_8 = $_POST['question_8'];
					$question_9 = $_POST['question_9'];
					$question_10 = $_POST['question_10'];
					
					$correct_answer_1 = $_POST['correct_answer_1'];
					$correct_answer_2 = $_POST['correct_answer_2'];
					$correct_answer_3 = $_POST['correct_answer_3'];
					$correct_answer_4 = $_POST['correct_answer_4'];
					$correct_answer_5 = $_POST['correct_answer_5'];
					$correct_answer_6 = $_POST['correct_answer_6'];
					$correct_answer_7 = $_POST['correct_answer_7'];
					$correct_answer_8 = $_POST['correct_answer_8'];
					$correct_answer_9 = $_POST['correct_answer_9'];
					$correct_answer_10 = $_POST['correct_answer_10'];
					
					
					$mythinking = $_POST['mythinking'];
					$mynotes = $_POST['mynotes'];
					
					$sql_insert_mythinking = "insert into quiz_notes(user_id,quiz_id,attempt_id,mythinking, mynotes) values ('$user', $quiz_id, $next_attempt, '$mythinking', '$mynotes')";
					
					//echo $sql_insert_mythinking;
					
					mysqli_query($connection, $sql_insert_mythinking);
					
					/*
					echo 'answer_1='.$answer_1.'<br/>';
					echo 'answer_2='.$answer_2.'<br/>';
					echo 'answer_3='.$answer_3.'<br/>';
					echo 'answer_4='.$answer_4.'<br/>';
					echo 'answer_5='.$answer_5.'<br/>';
					echo 'answer_6='.$answer_6.'<br/>';
					echo 'answer_7='.$answer_7.'<br/>';
					echo 'answer_8='.$answer_8.'<br/>';
					echo 'answer_9='.$answer_9.'<br/>';
					echo 'answer_10='.$answer_10.'<br/>';
					*/
					
					$sql_insert1 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 1, $quiz_id,'$answer_1','$correct_answer_1', $next_attempt)";
					$sql_insert2 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 2, $quiz_id,'$answer_2','$correct_answer_2', $next_attempt)";
					$sql_insert3 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 3, $quiz_id,'$answer_3','$correct_answer_3', $next_attempt)";
					$sql_insert4 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 4, $quiz_id,'$answer_4','$correct_answer_4', $next_attempt)";
					$sql_insert5 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 5, $quiz_id,'$answer_5','$correct_answer_5', $next_attempt)";
					$sql_insert6 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 6, $quiz_id,'$answer_6','$correct_answer_6', $next_attempt)";
					$sql_insert7 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 7, $quiz_id,'$answer_7','$correct_answer_7', $next_attempt)";
					$sql_insert8 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 8, $quiz_id,'$answer_8','$correct_answer_8', $next_attempt)";
					$sql_insert9 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 9, $quiz_id,'$answer_9','$correct_answer_9', $next_attempt)";
					$sql_insert10 = "insert into quiz_answer(user_id,question_number,quiz_id,attempted_option,correct_option, attempt_id) values ('$user', 10, $quiz_id,'$answer_10','$correct_answer_10', $next_attempt)";
					
					mysqli_query($connection, $sql_insert1);
					mysqli_query($connection, $sql_insert2);
					mysqli_query($connection, $sql_insert3);
					mysqli_query($connection, $sql_insert4);
					mysqli_query($connection, $sql_insert5);
					mysqli_query($connection, $sql_insert6);
					mysqli_query($connection, $sql_insert7);
					mysqli_query($connection, $sql_insert8);
					mysqli_query($connection, $sql_insert9);
					mysqli_query($connection, $sql_insert10);
					
					echo '<h2>Quiz Report</h2>';
					
					$sql_join = "select quiz_questions.correct_option as correct_option, quiz_questions.question as question, 
					quiz_questions.question_number as question_number, quiz_questions.quiz_id as quiz_id, quiz_questions.option1 
					 as option1, quiz_questions.option2 as option2, quiz_questions.option3 as option3, 
					 quiz_questions.option4 as option4, quiz_answer.attempted_option as attempted_option from quiz_answer
					 join quiz_questions on quiz_questions.question_number = quiz_answer.question_number and
					 quiz_questions.quiz_id = quiz_answer.quiz_id where 
					 quiz_answer.user_id='$user' and quiz_answer.attempt_id=$next_attempt limit 10";
					
					//echo "sql_join=".$sql_join."<br/>";
					

					$result_join = mysqli_query($connection, $sql_join);
					
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



