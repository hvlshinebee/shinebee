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
            <div class="container-fluid">
                <!-- Top navigation-->
          
				<nav class="navbar navbar-expand-md navbar-dark bg-dark">
					<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link glow" href="#">Shine Bee</a>
							</li>
						</ul>
					</div>
					<div class="mx-auto order-0">
						<a class="navbar-brand mx-auto" href="#">Quick Links</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="#">Subscribe us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Contact Us</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
                <!-- Page content-->
            <div class="container-fluid">
                <?php 
				
					$servername = "localhost";
					$username = "hvlias";
					$password = "hvlias@123";
					$db = "db1";
					
					$user_id = "Manish";
					$connection = mysqli_connect($servername, $username, $password,$db);
					
					if($connection === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}
					$sql = "select * from prelims_questions_answer where user_id='$user_id' order by year desc, question_number asc";
					//echo $sql;
					$result = mysqli_query($connection, $sql);
					while ($row = mysqli_fetch_assoc($result))
					{	
						$question_number = $row['question_number'];
						$year = $row['year'];
						$mynotes = $row['mynotes'];
						$mythinking = $row['mythinking'];
						
						if(empty($mynotes))
						{
							
						}
						else
						{
							echo '<div class="row" style="border: 1px solid black; margin-top:3px;">';
								echo '<div class="row"> ';
									echo '<div class="col-sm-3"> ';
										echo '<b>Question Number :'.$question_number.' </b> ';
									echo '</div> ';
						
									echo '<div class="col-sm-3"> ';
										echo '<b>Year : '.$year.' </b> ';
									echo '</div> ';
						
									echo '<div class="col-sm-3"> ';
										echo '<b>Previous Year PT</b> ';
									echo '</div> ';
									echo '<br/>';
									echo '<br/>';
								echo '</div> ';
					
							echo '<div class="row"> ';
								echo '<div class="col-sm-12"> ';
									echo '<span>'.$mynotes.'</span> ';
								echo '<br/>';
								echo '<br/>';
								echo '</div> ';
							
							echo '</div> ';
							echo '</div> ';
						}
						
					
					
					}
					
				?>  
				
				<button onclick="window.print()">Print</button>
            </div>
		
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme 
        <script src="js/scripts.js"></script> JS-->
		
		<br/>
		<br/>

    </body>
</html>
