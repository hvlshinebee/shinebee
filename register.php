<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shinebee</title>
        <!-- Favicon-->
        <link rel="icon" type="image/png" href="img/favicon.png" />
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
	
	<h2>Register yourself</h2><br/>
	
	<form class="form" action="register.php" method="post">
	<div class="row">
		<div class="col-sm-3">
			Name: <input type="text" name="user_name" class="form-control"><br/><br/>
			Email Id: <input type="email" name="user_email" class="form-control"><br/><br/>
			Phone Number: <input type="text" name="user_phone" class="form-control"><br/><br/>
			Choose Password: <input type="password" name="user_password" class="form-control"><br/><br/>
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
			<input type="Submit" name="submit" value="Submit" class="btn btn-primary">
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
				
				$user = 'Manish';
				
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				$user_name = $_POST['user_name'];
				$user_email = $_POST['user_email'];
				$user_phone = $_POST['user_phone'];
				$user_password = $_POST['user_password'];
				
				if(empty($user_name) || empty($user_name) || empty($user_name) || empty($user_name))
				{
					echo "Please fill all the details";
				}
				else
				{
					
					$quiz_notes_sql = "select * from user_list where email_id='$user_email'";
				
					$result_quiz_sql = mysqli_query($connection, $quiz_notes_sql);
					
					$mynotes = "";
					
					while ($row_result = mysqli_fetch_assoc($result_quiz_sql))
					{
						$mynotes = $row_result['mynotes'];
					}
					
					if(empty($mynotes))
					{
						$sql = "insert into user_list(user_name, user_email, user_phone, user_password) values ('$user_name', '$user_email', '$user_phone', '$user_password')";
						mysqli_query($connection, $sql);
						
						echo "You have successfully registered. Please login <br/>";
						echo '<a href="login.php" class="btn btn-primary">login</a>';
					}
					else
					{
						echo "You have already registered. Please try reseting the password <br/>";
						echo '<a href="reset_password.php" class="btn btn-primary">Reset Password</a>';
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