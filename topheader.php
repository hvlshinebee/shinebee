<nav class="navbar navbar-expand-lg navbar-bg">
  <div class="container">
	  <a class="navbar-brand" href="index.php"><img src="img/shinebee-logo.png" width="150"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"><img src="img/ticon.png"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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