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
			<?php include 'topheader.html'; ?>
                <!-- Page content-->

		<hr>
		<?php 
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				
				$servername = "localhost";
				$username = "hvlias";
				$password = "hvlias@123";
				$db = "db1";
				$connection = mysqli_connect($servername, $username, $password,$db);
				
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				$workbook_sql = "select * from workbook order by id desc limit 3";
		
		//echo "next_question_sql=".$next_question_sql."<br/>";
		
				$result_next_question_sql = mysqli_query($connection, $workbook_sql);
		
				$row_count = mysqli_num_rows($result_next_question_sql);
				if ($row_count>0)
				{	$x = 1;
					while ($row_result = mysqli_fetch_assoc($result_next_question_sql))
					{
						$link = $row_result['path'];
						if($x == $id)
						{
							header("Location: $link");
							exit();
						}
						$x++;
					}
				}
				else
				{
					
				}
			}
		?>

		<div class="container-fluid">
		
			<span style="text-align:center"><h2>Workbook Downloads</h2></span>
			<br/>
			<div class="row">
			<?php 	
			
				$servername = "localhost";
				$username = "hvlias";
				$password = "hvlias@123";
				$db = "db1";
				$connection = mysqli_connect($servername, $username, $password,$db);
				
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				$workbook_sql = "select * from workbook order by id desc limit 3";
		
		//echo "next_question_sql=".$next_question_sql."<br/>";
		
				$result_next_question_sql = mysqli_query($connection, $workbook_sql);
		
				$row_count = mysqli_num_rows($result_next_question_sql);
				if ($row_count>0)
				{	$x = 1;
					while ($row_result = mysqli_fetch_assoc($result_next_question_sql))
					{
						$link = $row_result['path'];
						
						echo '<div class="col-sm-4">';
							echo '<div class="jumbotron jumbotron-fluid text-center">';
								echo '<a class="btn btn-primary p-3" href="'.$link.'">Workbook '.$x.'</a>';
							echo '</div>	';
						echo '</div>';
						
						$x++;
					}
				}
				else
				{
					
				}
			?>
			
				
			</div>
			
			
			
		</div>
		<br/>
		<hr>

        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme 
        <script src="js/scripts.js"></script> JS-->

<?php include 'footer.html'; ?>
    </body>
</html>
