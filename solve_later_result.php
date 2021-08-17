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
				
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				
				$x = 1;
					
				$file_id = $_POST['file_id'];

				$result2 = mysqli_query($connection, "SELECT MAX(file_id) FROM upload_answer ");
                $row = mysqli_fetch_array($result2);
              	
				$new_file_id= $row[0]+1;	
				
				$_SESSION['file_id'] = $new_file_id;


				while($x <= 100) 
				{
				   
					$answer = $_POST['answer_'.$x] ?? NULL;
                    
                    if($answer != NULL){ 
					$sql = "update upload_answer set answer_opted = '$answer' WHERE question_number=$x AND answer_opted='E' ";
                    $insertUpdateResult = mysqli_query($connection, $sql);
                    }
					$x++;
				}
				
				/*
				if(isset($_POST['mythinking']))
				{
					$mythinking = $_POST['mythinking'];
					$mynotes = $_POST['mynotes'];
					
					$filename = $_POST['filename'];
					
					$insert_sql = "update user_upload_and_practise set mythinking = '$mythinking', mynotes = '$mynotes' where user_id='$user' and filename='$filename'";
		
					$insertUpdateResult = mysqli_query($connection, $insert_sql);
					
					if (empty($mynotes))
					{
						
					}
					else
					{
					echo '<div class="row">';
						echo '<div class="col-sm-12">';
							echo '<div class="jumbotron jumbotron-fluid text-center">';
								echo '<span align="center">';
									echo '<h2>My Notes</h2><br/><br/>';
									echo $mynotes;
								echo '</span>';	

								echo '<span align="left">';
									echo $tags;
								echo '</span>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
					}
					
					if (empty($mythinking))
					{
						
					}
					else
					{
					echo '<div class="row">';
						echo '<div class="col-sm-12">';
							echo '<div class="jumbotron jumbotron-fluid text-center">';
								echo '<span align="center">';
								    echo '<h2>My Thinking</h2><br/><br/>';
									echo $mythinking;
								echo '</span>';	

								echo '<span align="left">';
									echo $tags;
								echo '</span>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
					}
				}
				
			*/

			echo "<br/>";
			
			?>

			<div class="container-fluid">
                    <div class="row" width="100%" height="600px">
					
						<span style="text-align:center; color:green"><h2>Congratulations!! you have submitted your response</h2></span> <br/>
						<span style="text-align:center"><h2>Now Upload You answer sheet and compare</h2></span>
						<br/>
						<input type="hidden" name="file_id" value="<?php echo $file_id; ?>" />
						<br/>
						<div class="row">
							<form class="form" action="solve_later_update_result.php" method="post" enctype="multipart/form-data" >
								<div class="col-sm-3">
								<input type="file" name="photo" id="fileSelect" class="form-control">
								</div>
								<div class="col-sm-3">
								<input type="submit" name="submit" value="Upload" class="btn btn-primary">
								</div>
							</form>
							
						</div>
					</div>
					<br/>
                </div>

			<?php
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";

			include 'footer.html';
		
?>
				    </body>
</html>