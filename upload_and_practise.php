
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
<nav class="navbar navbar-expand-lg navbar-bg">
  <div class="container">
	  <a class="navbar-brand" href="https://shineb.in/"><img src="img/shinebee-logo.png" width="150"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"><img src="img/ticon.png"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="https://shineb.in/">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="about-us.php">About Us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="pt_yearwise.php">Prelims Forum</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Contact Us</a>
	      </li>
	      <li class="nav-item dropdown" style="background-color: #343a40 !important;">
								<?php 
									session_start();
									
									if(isset($_SESSION['user_email']))
									{
										$user_email = $_SESSION['user_email'];
										//echo '<a class="nav-link" href="logout.php">Logout</a>';
										
										echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
										  echo $_SESSION['user_email'];
										echo '</a>';
										echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
										  echo '<a class="dropdown-item" href="myprofile.php?user_email='.$_SESSION['user_email'].'">Profile</a>';
										  echo '<a class="dropdown-item" href="#">Setting</a>';
										  echo '<div class="dropdown-divider"></div>';
										  echo '<a class="dropdown-item" href="logout.php">Logout</a>';
										echo '</div>';
									}
									else
									{
										echo '<a class="nav-link" href="login.php">Login</a>';
									}
								?>
								
							</li>
	    </ul>
	  </div>
  </div>
</nav>
			
                <!-- Page content-->
				<br/>
                <div class="container-fluid">
                    <div class="row" width="100%" height="600px">
					
					<br/>
						<span style="text-align:center"><h2>Workbook Upload</h2></span>
						<br/>
						<form class="form" action="upload_and_see.php" method="post" enctype="multipart/form-data" >
						<div class="row">
							
								<div class="col-sm-3">
								<input type="file" name="photo" id="fileSelect" class="form-control">
							</div>
							<div class="col-sm-3">
								<input type="submit" name="submit" value="Upload" class="btn btn-primary">
								</div>
							
							
						</div>
						</form>
					</div>
					<br/>
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
