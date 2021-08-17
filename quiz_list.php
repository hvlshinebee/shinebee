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
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		
		


    </head>
    <body>
            <!-- Sidebar-->
            <?php include 'topheader.php'; ?>

		<hr>
		
		
		
		<br/>
		<hr>
		<div class="container-fluid">
		
			<span style="text-align:center"><h2>My Training and Mind Quiz</h2></span>
			<br/>
			<div class="row">
				<div class="col-sm-4">
					<h2>Level 1</h2>
					<br/>
					
					<?php 
						session_start();
						
						$user = "";
						
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
											
							if($connection === false)
							{
								die("ERROR: Could not connect. " . mysqli_connect_error());
							}
						
							$sqlAllQuiz = "SELECT distinct quiz_answer.quiz_id as quiz_id, quiz_questions.quiz_upload_date as quiz_upload_date FROM quiz_answer join quiz_questions on quiz_answer.quiz_id = quiz_questions.quiz_id where user_id='$user' and quiz_questions.quiz_level=1";
										
							$resultAllquestion = mysqli_query($connection, $sqlAllQuiz);
											
							while ($rowAll = mysqli_fetch_assoc($resultAllquestion))
							{
								$quiz_id_all = $rowAll['quiz_id'];
								$quiz_upload_date = $rowAll['quiz_upload_date'];
											
								echo '<a href="quiz_list_info.php?id='.$quiz_id_all.'" class="btn btn-primary" id="'.$quiz_id_all.'" style="margin-bottom:2px;">'.$quiz_upload_date.'</a><br/>';
							}
						
					?>	
				</div>
			
				<div class="col-sm-4">
					<h2>Level 2</h2>
					<br/>
					<?php 
						session_start();
						
						$user = "";
						
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
								
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
							$sqlAllQuiz = "SELECT distinct quiz_answer.quiz_id as quiz_id, quiz_questions.quiz_upload_date as quiz_upload_date FROM quiz_answer join quiz_questions on quiz_answer.quiz_id = quiz_questions.quiz_id where user_id='$user' and quiz_questions.quiz_level=2";
										
							$resultAllquestion = mysqli_query($connection, $sqlAllQuiz);
											
							while ($rowAll = mysqli_fetch_assoc($resultAllquestion))
							{
								$quiz_id_all = $rowAll['quiz_id'];
								$quiz_upload_date = $rowAll['quiz_upload_date'];
											
								echo '<a href="quiz_list_info.php?id='.$quiz_id_all.'" class="btn btn-primary" id="'.$quiz_id_all.'" style="margin-bottom:2px;">'.$quiz_upload_date.'</a><br/>';
							}
						
					?>	
						
				</div>
			
				<div class="col-sm-4">
					<h2>Level 3</h2>
					<br/>
					<?php 
						session_start();
						
						$user = "";
						
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
								
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
							$sqlAllQuiz = "SELECT distinct quiz_answer.quiz_id as quiz_id, quiz_questions.quiz_upload_date as quiz_upload_date FROM quiz_answer join quiz_questions on quiz_answer.quiz_id = quiz_questions.quiz_id where user_id='$user' and quiz_questions.quiz_level=3";
										
							$resultAllquestion = mysqli_query($connection, $sqlAllQuiz);
											
							while ($rowAll = mysqli_fetch_assoc($resultAllquestion))
							{
								$quiz_id_all = $rowAll['quiz_id'];
								$quiz_upload_date = $rowAll['quiz_upload_date'];
											
								echo '<a href="quiz_list_info.php?id='.$quiz_id_all.'" class="btn btn-primary" id="'.$quiz_id_all.'" style="margin-bottom:2px;">'.$quiz_upload_date.'</a><br/>';
							}
						
					?>	
						
				</div>
			</div>
		</div>
		
		<br/>
		<hr>

		
		
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme 
        <script src="js/scripts.js"></script> JS-->
		
		<br/>
		<br/>
		
		<hr>
		
		<br/>

		<?php include 'footer.html'; ?>
    </body>
</html>
