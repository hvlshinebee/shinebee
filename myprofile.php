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
            <!-- Sidebar-->
                <!-- Top navigation-->
          
				<?php 
					include 'topheader.php';
				?>
                <!-- Page content-->
                <div class="container-fluid" style="background-color:#243550">
                    <div class="row" style="margin-top:0px">
						<div class="col-sm-3" style="margin-top:8px">
							<div >
								<a class="btn btn-primary btn-block p-3" href="pt_last_year.html">PT Last Year Question</a>
								<a class="btn btn-primary btn-block p-3" href="training_and_mind_quiz.php">Training Mind Quiz</a>
								<a class="btn btn-primary btn-block p-3" href="upload_and_practise.php">Upload and Practise</a>
								<a class="btn btn-primary btn-block p-3" href="mynotes.html">My Notes</a>
								<a class="btn btn-primary btn-block p-3" href="workbook.php">Workbook</a>
							</div>
						</div>
						
						<div class="col-sm-3" style="margin-top:8px">
							<br/>
							<br/>
							<a class="btn btn-info p-3" href="mynotes.html">My Notes</a><br/>
						</div>
						<div class="col-sm-3" style="margin-top:8px">
							<br/>
							<br/>
							<a class="btn btn-info p-3" href="quiz_list.php">My Quizes</a><br/>
						</div>
						<div class="col-sm-3">
							<br/>
							<br/>
							<a class="btn btn-info p-3" href="upload_list.php">My Uploads</a><br/>
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
		<?php 
					include 'footer.html';
				?>
    </body>
</html>
