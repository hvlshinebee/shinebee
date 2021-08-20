
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

				<?php include 'topheader.php'; 
				//session_start();
									
							//		if(isset($_SESSION['user_email']))
								//	{
                                    $user =$_SERVER['REMOTE_ADDR'];
								//	}
								//	else
								//	{
								//		echo '<script> alert("Please login to proceed further")</script>';
								//		header("Location:z_upload_and_practice.php"); 
								//	}
								?>	
                <!-- Page content-->
				<br/>
                <div class="container-fluid">
                    <div class="row" width="100%" height="600px">
					
					<br/>
						<span style="text-align:center"><h2>Workbook Upload</h2></span>
						<br/>
						<div class="row">
							<form class="form" action="z_upload_and_see.php" method="post" enctype="multipart/form-data" >
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
