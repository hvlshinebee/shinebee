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
    <body class="bg-light">

<?php
	include 'topheader.php';
?>

<div class="container-fluid">

	<br/>
	
	<h2>Login Page</h2><br/>
	
	<form class="form" action="login.php" method="post">
	<div class="row">
		<div class="col-sm-3">
			<?php 
				session_start(); 
				if(isset($_SESSION['user_email']))
				{
					echo '<br/><h1 style="color:green">You have already logged in from '.$_SESSION['user_email'].' <h1><br/><br/>';
					
					echo '<a href="index.php" class="btn btn-primary">Go to Home Page</a>';
				}
				else
				{
					echo 'Email Id: <input type="email" name="user_email" class="form-control"><br/>';
			
					echo 'Password: <input type="password" name="user_password" class="form-control"><br/><br/>';
					
					echo 'If you do not have account then: <a href="register.php">Register here</a><br/><br/>';
				}
			?>
			
		</div>
		
		<div class="col-sm-3">
			
		</div>
		
		<div class="col-sm-3">
			
		</div>
		
		<div class="col-sm-3">
			
		</div>
		
		
	</div>
	
	<div class="row">
		<div class="col-sm-3">
			<?php
				if(isset($_SESSION['user_email']))
				{
					
				}
				else
				{
					echo '<input type="Submit" name="submit" value="Submit" class="btn btn-primary">';
				}
			?>
			
		</div>
	</div>
	
	</form>
</div>

<?php		
			if(isset($_POST['submit']))
			{
				
				$servername = "localhost";
				$username = "hvlias";
				$password = "hvlias@123";
				$db = "db1";
				$connection = mysqli_connect($servername, $username, $password,$db);
								
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				$user_email = $_POST['user_email'];
				$user_password = $_POST['user_password'];
				
				if(empty($user_email) || empty($user_password))
				{
					echo "Please fill all the details";
				}
				else
				{
					
					$quiz_notes_sql = "select * from user_list where user_email='$user_email'";
				
					$result_quiz_sql = mysqli_query($connection, $quiz_notes_sql);
					
					$password = "";
					
					while ($row_result = mysqli_fetch_assoc($result_quiz_sql))
					{
						$password = $row_result['user_password'];
						$user_id = $row_result['id'];
					}
					
					if(empty($password))
					{
						echo '<br/><h1 style="color:green">You have not registered. Please Register <h1><br/><br/>';
						echo '<a href="register.php" class="btn btn-primary">Register</a><br/>';
					}
					else
					{
						//create a session 
						
						if($password == $user_password)
						{
							session_start(); 
							$_SESSION['user_email'] = $user_email;
								$_SESSION['user_id'] = $user_id;
							
							header("Location:pt_yearwise.php"); 
						}
						else
						{
							echo '<br/><h1 style="color:red">You have entered wrong password <h1><br/><br/>';
						}
							
					}
					
				}	
			}
			echo "<br/>";
			
			
			echo "<br/>";
	
			echo "<br/>";

			include 'footer.html';
		
?>
				    </body>
</html>