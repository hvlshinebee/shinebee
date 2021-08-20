
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
    
	<style>
		

		.rad-input {
		  position: absolute;
		  left: 0;
		  top: 0;
		  width: 1px;
		  height: 1px;
		  opacity: 0;
		  z-index: -1;
		}
		
		.rad-design-correct {
		  width: 22px;
		  height: 22px;
		  border-radius: 100px;
		
		  background: linear-gradient(to right bottom, #36ff65, #00b029);
		  position: relative;
		}
		
		.rad-design-correct::before {
		  content: '';
		
		  display: inline-block;
		  width: inherit;
		  height: inherit;
		  border-radius: inherit;
		
		  background-color: #babdbf;
		
		  transform: scale(1.1);
		  transition: .5s;
		}


		.rad-input:checked+.rad-design-correct::before {
		  transform: scale(0);
		}
		.rad-design-incorrect {
		  width: 22px;
		  height: 22px;
		  border-radius: 100px;
		
		  background: linear-gradient(to right bottom, #ff3b3e, #b80608);
		  position: relative;
		}
		
		.rad-design-incorrect::before {
		  content: '';
		
		  display: inline-block;
		  width: inherit;
		  height: inherit;
		  border-radius: inherit;
		
		  background-color: #babdbf;
		
		  transform: scale(1.1);
		  transition: .5s;
		}
		.rad-input:checked+.rad-design-incorrect::before {
		  transform: scale(0);
		}
		
		.rad-input:checked~.rad-text {
		  color: hsl(0, 0%, 40%);
		}
		
		.rad-label {
		  display: flex;
		  align-items: center;
		
		  border-radius: 100px;
		  cursor: pointer;
		  transition: .5s;
		}
		
		.rad-label:hover,
		.rad-label:focus-within {
		  background: hsla(0, 0%, 80%, .14);
		}
		
		</style>
    
    
    <body class="bg-light">

<?php
	//echo "Uploading..";
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
	
	$last_id = "";
	$servername = "localhost";
	$username = "hvlias";
	$password = "hvlias@123";
	$db = "db1";
	$connection = mysqli_connect($servername, $username, $password,$db);
	
	$file_id = $_SESSION['file_id'];

	$sql = "select * from upload_answer where file_id=$file_id";

	//$user = 'Manish'; //take it from session
	
	$result = mysqli_query($connection, $sql);

	if(isset($_FILES["photo"]))
	{
		$filename = $_FILES["photo"]["name"];
		$filetype = $_FILES["photo"]["type"];
		$filesize = $_FILES["photo"]["size"];
		
		$targetfolder = "answer_upload/";
		
		//$user = 'Manish';

		$targetfolder = $targetfolder . basename( $_FILES['photo']['name']) ;

		$filename = basename( $_FILES['photo']['name']) ;
 
		
		$file_id = $_SESSION['file_id'];

		#echo 'file_id ->'. $file_id;

		if(move_uploaded_file($_FILES['photo']['tmp_name'], $targetfolder))
		{
			//echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
			
			$path = "https://www.shineb.in/".$targetfolder;
			
				$servername = "localhost";
				$username = "hvlias";
				$password = "hvlias@123";
				$db = "db1";
				$connection = mysqli_connect($servername, $username, $password,$db);
				
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				
			$insert_sql = "insert into user_upload_and_practise_answer_file(file_id, filename, path) VALUES ('$file_id', '$filename', '$path')";
		
			$insertUpdateResult = mysqli_query($connection, $insert_sql);
			
			//header("Location: $link");
			
			
			?>
			
			<div class="container-fluid">
			
					<form class="form" action="upload_and_insert_result.php" method="post">
                    <div class="row">
						<input type="hidden" name="file_id" value="<?php echo $file_id; ?>" />
						<br/>

						<span style="text-align:center"><h2>Upload Answer</h2></span>
						<br/>
						<br/>
						
						
						
						
						
						
						<div class="col-sm-3" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
						
						<div class="row">
								<div class="col-sm-2">
									Q No
								</div>

								<div class="col-sm-3">
									Answer Opted
								</div>
								<div class="col-sm-3">
									Correct
								</div>
								<div class="col-sm-2">
									Incorrect
								</div>
								<div class="col-sm-2">
									
								</div>
							</div>
							<?php 
								
								$x = 1;

								while($x <= 100) 
								{
									  echo '<div class="row">';
										echo '<div class="col-sm-2">';
												echo $x.') ';
										echo ' </div>';
										$sql = "select answer_opted from upload_answer where question_number=$x";

	//$user = 'Manish'; //take it from session
	
										$result = mysqli_query($connection, $sql);
										while ($row = mysqli_fetch_assoc($result))
										{
											
										$answer_opted =  $row['answer_opted'];
										}

										echo '<div class="col-sm-4">';
											echo $answer_opted;
										echo '</div>';
									
								    	echo '<div class="col-sm-2"> <label class="rad-label">';
											echo '<input type="radio" class="rad-input"  id="option'.$x.'" name="answer_'.$x.'" value="Correct">';
										echo ' <div class="rad-design-correct"></div> </label>  </div>';
										
										echo '<div class="col-sm-2"> <label class="rad-label">';
											echo '<input type="radio" class="rad-input"  id="option'.$x.'" name="answer_'.$x.'" value="Incorrect">';
										echo ' <div class="rad-design-incorrect"></div>  </label>  </div>';
										echo '<div class="col-sm-2">';
											
										echo '</div>';
									echo '</div>';
									$x++;
								}
							
							
							?>
						</div>
						<div class="col-sm-9" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
						
						
						<iframe src="<?php echo $path; ?>"
   width="100%" height="600"> </iframe>
							
							
   <input type="text" name="filename" class="form-control" value="<?php echo $filename; ?>">
						</div>
			

						
					</div>
					<br/>
					<div class="row">
					<div class="col-sm-3">
							Marks for correct answer<input type="number" class="form-control" name="full_marks"  step="any">
						</div>

						<div class="col-sm-3">
							Negative Marks Wrong question<input type="number" class="form-control" name="negative_marks"  step="any">
						</div>	
						<div class="col-sm-3">
			
						</div>
						
						<div class="col-sm-3">	
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</div>

					<br/>
					<br/>
					<br/>
					</form>
                </div>
				    </body>
</html>
			<?php	
				include 'footer.html';
		}
		else {
			echo "Problem uploading file";
		}
		

	}
?>