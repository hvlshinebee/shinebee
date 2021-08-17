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
	session_start(); 
							 
	include 'topheader.html';
?>

<div class="container-fluid">

	<br/>
	
	<h2>Login</h2><br/>
	
	<form class="form" action="login.php" method="post">
	<div class="row">
		<div class="col-sm-3">
			
			Email Id: <input type="email" name="user_email" class="form-control"><br/>
			
			Password: <input type="password" name="user_password" class="form-control"><br/><br/>
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
			
			echo "<br/>";
			
			echo "Session started with ";
			$user_email = $_SESSION['user_email'];
			
			echo 'Session started with '.$user_email;
			//header("Location:index.html");
			
			echo "<br/>";
	
			echo "<br/>";

			include 'footer.html';
		
?>
				    </body>
</html>