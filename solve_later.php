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

.rad-design-ans {
  width: 22px;
  height: 22px;
  border-radius: 100px;

  background: linear-gradient(to right bottom, #34baf7, #0486c2);
  position: relative;
}

.rad-design-ans::before {
  content: '';

  display: inline-block;
  width: inherit;
  height: inherit;
  border-radius: inherit;

  background-color: #b4b8b0;

  transform: scale(1.1);
  transition: .5s;
}

.rad-input:checked+.rad-design-ans::before {
  transform: scale(0);
}


.rad-design-save {
  width: 22px;
  height: 22px;
  border-radius: 100px;

  background: linear-gradient(to right bottom, #e8821c, #c46404);
  position: relative;
}

.rad-design-save::before {
  content: '';

  display: inline-block;
  width: inherit;
  height: inherit;
  border-radius: inherit;

  background-color: #b4b8b0;

  transform: scale(1.1);
  transition: .5s;
}

.rad-input:checked+.rad-design-save::before {
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
				
	$file_id=$_GET['id'];

	$_SESSION['newfile_id']=$file_id;


  
    $sql = "SELECT * from user_upload_and_practise where id=$file_id ";
	$result= mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $path =  $row['path'];
        $filename = $row['filename'];
    }



    
	//header("Location: $link");
			
			include 'topheader.php';
			?>
			
			<div class="container-fluid">
			
					<form class="form" action="solve_later_result.php" method="post">
                    <div class="row">
						<input type="hidden" name="file_id" value="<?php echo $last_id; ?>" />
						<span style="text-align:center"><h2>Upload and Practise</h2></span>
						<br/>
						
						
						<div class="col-sm-9" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
							<iframe src="<?php echo $path; ?>"
   width="100%" height="600"> </iframe>
							
							<input type="text" name="filename" class="form-control" value="<?php echo $filename; ?>">
						</div>
						
						
						
						<div class="col-sm-3" style="border: 1px solid grey; height: 400px; overflow: scroll; border-radius:3px">
							<div class="row">
								<div class="col-sm-2">
									
								</div>
								<div class="col-sm-2">
									A
								</div>
								<div class="col-sm-2">
									B
								</div>
								<div class="col-sm-2">
									C
								</div>
								<div class="col-sm-2">
									D
								</div>
								<div class="col-sm-2">
									See Later
								</div>
							</div>
							<?php 
								
                                $sql = "SELECT * from upload_answer where file_id=$file_id AND answer_opted='E' ";
                                $result= mysqli_query($connection, $sql);
                              
							//	 echo $sql;
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                    $question_no =  $row['question_number'];
                                   
                              //  }
                               //   $x =$question_no;
								


								//while($x <= 100 ) 
						    	//{    
                                
									
								
								        echo '<div class="row">';
										echo '<div class="col-sm-2">';
												echo $question_no.') ';
										echo ' </div>';
										echo ' <div class="col-sm-2"> <label class="rad-label">';
											echo '<input type="radio" class="rad-input"  id="option'.$question_no.'" name="answer_'.$question_no.'" value="A">';
										echo '<div class="rad-design-ans"></div> </label></div>';
										
										echo '<div class="col-sm-2"><label class="rad-label"> ';
											echo '<input type="radio" class="rad-input" id="option'.$question_no.'" name="answer_'.$question_no.'" value="B">';
										echo '<div class="rad-design-ans"></div> </label> </div> ';
										
										echo '<div class="col-sm-2"> <label class="rad-label">';
											echo '<input type="radio" class="rad-input" id="option'.$question_no.'" name="answer_'.$question_no.'" value="C">';
										echo '<div class="rad-design-ans"></div> </label> </div>';
										
										echo '<div class="col-sm-2"> <label class="rad-label">';
											echo '<input type="radio" class="rad-input"  id="option'.$question_no.'" name="answer_'.$question_no.'" value="D">';
										echo '<div class="rad-design-ans"></div> </label> </div>';
										
										echo '<div class="col-sm-2"> <label class="rad-label">';
											echo '<input type="radio" class="rad-input"  id="option'.$question_no.'" name="answer_'.$question_no.'" value="E">';
										echo '<div class="rad-design-save"></div> </label> </div>';
									echo '</div>';
								//	$x++;
								
							}
							
							
							?>
						</div>

					</div>
					<br/>
					<div class="row">
						<div class="col-sm-9">
							
						</div>
						
						<div class="col-sm-3">	
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</div>
					</form>
                </div>
				    </body>
</html>
			<?php	
				include 'footer.html';
	
		

	
?>