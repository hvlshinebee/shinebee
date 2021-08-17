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
					$sql = "select * from prelims_questions where status='0' or status='' ";
					//todo after testing done then where status='0' or status='' 
					//echo $sql;
					$result = mysqli_query($connection, $sql);
					while ($row = mysqli_fetch_assoc($result))
					{	
						$topic = $row['topic'];
						$year = $row['year'];
						$question_number = $row['question_number'];
						$question_type = $row['question_type'];
						
						$tags = $row['tags'];
						
						$topics = explode(",",$topic);

						foreach ($topics as $oneTopic)
						{
							$sqlCheck1 = "select * from topic_question_pt where topic='$oneTopic' and question_year='$year' and question_number=$question_number";
							$result1 = mysqli_query($connection, $sqlCheck1);
		
							$row_nums1 = mysqli_num_rows($result1);
							if ($row_nums1>0)
							{
								
							}
							else
							{
								$sqlTopic = "insert into topic_question_pt(topic, question_year, question_number) VALUES ('$oneTopic', '$year', $question_number)";
								$insertUpdateResult1 = mysqli_query($connection, $sqlTopic);
							}
							
							
						}
						
						$question_types = explode(",",$question_type);

						foreach ($question_types as $one_question_types)
						{
							$sqlCheck2 = "select * from question_type_pt where question_type='$one_question_types' and question_year='$year' and question_number=$question_number";
							$result2 = mysqli_query($connection, $sqlCheck2);
		
							$row_nums2 = mysqli_num_rows($result2);
							if ($row_nums2>0)
							{
								
							}
							else
							{
								$sqlQuestionType = "insert into question_type_pt(question_type, question_year, question_number) VALUES ('$one_question_types', '$year', $question_number)";
								$insertUpdateResult2 = mysqli_query($connection, $sqlQuestionType);
							}
							
						}
						
						$sqlStatusUpdate = "update prelims_questions set status='1' where year='$year' and question_number=$question_number";
						$insertUpdateResult3 = mysqli_query($connection, $sqlStatusUpdate);
						
						//updatig tags
						$tags_values = explode(",",$tags);
						
						echo $tags.'<br/>';
						foreach ($tags_values as $oneTag)
						{
							$sqlCheck3 = "select * from tags_question_pt where topic='$oneTag' and question_year='$year' and question_number=$question_number";
							$result3 = mysqli_query($connection, $sqlCheck3);
		
							echo $sqlCheck3.'<br/>';
														
		
							$row_nums3 = mysqli_num_rows($result3);
							
							echo $row_nums3.'<br/>';
							if ($row_nums3>0)
							{
								
							}
							else
							{
								$sqlTags = "insert into tags_question_pt(tag, question_year, question_number) VALUES ('$oneTag', '$year', $question_number)";
								$insertUpdateResult4 = mysqli_query($connection, $sqlTags);
								
								echo $sqlTags.'<br/>';
								
							}
							
						}
						
					}
					echo "Success";
				?>  
            </div>
		
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme 
        <script src="js/scripts.js"></script> JS-->
		
		<br/>
		<br/>

    </body>
</html>
