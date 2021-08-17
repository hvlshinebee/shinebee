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
		
			<span style="text-align:center"><h2>Upload List</h2></span>
			<br/>
			<div class="row">
				<div class="col-sm-4">
					
					<br/>
					
					<?php 
						
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
						
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
					
					if($connection === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}
					
					
							$sqlAllQuiz = "SELECT * FROM user_upload_and_practise where user_id='$user'";
										
							$resultAllquestion = mysqli_query($connection, $sqlAllQuiz);

						
														
							echo "<table border='1' class='table'>
							<tr>
							
							<th>Test&nbspId</th>
							<th></th>
							<th>Question Paper</th>
							<th></th>
							<th>Answer Key</th>
							<th></th>
							<th>Marks</th>
							
							<th>Try Again</th>
							<th></th>
							<th> Solve&nbspSee&nbspLater</th>
							<th></th>
							<th>Delete Test</th>
							</tr>";
							$z=0;
							while ($rowAll = mysqli_fetch_assoc($resultAllquestion))
							{	$z++;
								$path = $rowAll['path'];
								$quiz_id_all ="select id from user_upload_and_practise where user_id='$user'";
								$file1 = basename($path);
								
								$id=$rowAll['id'];
								$sqlAllAns = "SELECT * FROM user_upload_and_practise_answer_file where file_id=$id";
								$resultAllanswer = mysqli_query($connection, $sqlAllAns);
								$row_ans = mysqli_fetch_array($resultAllanswer);
								if ( isset($row_ans['path']) ) {
								$path2 = $row_ans['path'];
								$file2 = basename($path2);
								}
								else { 
									$path2="#";
									$file2="Not Available";
								}

								if (isset($row_ans['full_marks']) && isset($row_ans['negative_marks']))
									$marks = $row_ans['full_marks'] - $row_ans['negative_marks'];
								else 
								 	$marks= 0;
								echo "<tr>";
								// echo "<td>" .$z."<td>";
								echo "<td>" .$id."<td>";
								
								
								echo "<td>" .'<a href="'.$path.'" class="btn btn-primary" id="'.$quiz_id_all.'" style="margin-bottom:2px;">'.$file1.'</a><br/>'."<td>";
								echo "<td>" .'<a href="'.$path2.'" class="btn btn-primary" id="'.$quiz_id_all.'" style="margin-bottom:2px;">'.$file2.'</a><br/>'."<td>";
								
								echo "<td>".$marks."</td>";

								//echo "<td>" .'<a href="#" class="btn btn-primary"  style="margin-bottom:2px;">'.'Show&nbspResults'.'</a><br/>'."<td>";
							
								echo "<td>" .'<a href="try_again.php?id='.$id.'" class="btn btn-primary"  style="margin-bottom:2px;">'.'Try&nbspAgain'.'</a><br/>'."<td>";
								
								echo "<td>" .'<div class="col-sm-3"> <a href="solve_later.php?id='.$id.'" class="btn btn-primary"  style="margin-bottom:2px;">'.'Solve&nbspLater'.'</a>'."<td>";
								
								echo "<td>" .'<div class="col-sm-3"> <a href="#" class="btn btn-primary"  style="margin-bottom:2px;">'.'Delete&nbspTest'.'</a>'."<td>";
								
								
								echo "</tr>";
							}
						
							echo "</table>";

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
