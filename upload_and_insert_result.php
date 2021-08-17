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
				
				//$user = 'Manish';
				
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				
				$x = 1;
				#echo "<br/><h2>Result of the attempt</h2><br/>";
				
				#echo '<div class="row">';
						
						
						#echo '<div class="col-sm-2">';
							#echo 'Attempted choice';
						#echo '</div>';
					#echo '</div>';
					
				$file_id = $_SESSION['file_id'];

				#echo 'file_id ->'. $file_id. '<br/>';

				$full_marks = $_POST['full_marks'];
				$negative_marks = $_POST['negative_marks'];

				#echo 'negative_marks ->'. $negative_marks. '<br/>';

				#echo 'full_marks ->'. $full_marks. '<br/>';

				$sql_update = "update user_upload_and_practise_answer_file set full_marks=$full_marks, negative_marks=$negative_marks where file_id=$file_id";

				$UpdateResult = mysqli_query($connection, $sql_update);
					
				while($x <= 100) 
				{
					#echo '<div class="row">';
						
						
						#echo '<div class="col-sm-2">';
							#echo $x.') '. $_POST['answer_'.$x];
						#echo '</div>';
					#echo '</div>';
					
					$answer = $_POST['answer_'.$x] ?? NULL;

					if($answer == 'Correct')
						 $is_correct=1;
					else if ($answer == 'Incorrect')	
						 $is_correct=0;
					else 
						 $is_correct=NULL;
						 
					$sql = "update upload_answer set is_correct = $is_correct where file_id =$file_id and question_number = $x";

					$insertUpdateResult = mysqli_query($connection, $sql);

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
				<br/>
                    <div class="row">
						
						<span style="text-align:center"><h2>Marks distribution</h2></span><br/><br/>
						
						<?php 

		$sql = "select * from upload_answer where file_id=$file_id";

		//$user = 'Manish'; //take it from session
		
        $result = mysqli_query($connection, $sql);

        echo "<table border='1' class='table'>
			<tr>
			<th>Question Number</th>
			<th>Answer Opted</th>
			<th>Correct Answer</th>
			<th>Marks Obtaiined</th>
			</tr>";

		$marks = 0;

        while ($row = mysqli_fetch_assoc($result))
        {
			
            $question_number = $row['question_number'];
            $answer_opted =  $row['answer_opted'];
            $is_correct =  $row['is_correct'];

			if($is_correct == 1) 
				$correct_display='Correct';
			else if($is_correct == NULL) 
				$correct_display='Save later / DNA';
			else 
				$correct_display='Incorrect';

            echo "<tr>";
			echo "<td>" . $question_number . "</td>";
			echo "<td>" . $answer_opted . "</td>";
			echo "<td>" . $correct_display . "</td>";

			$marks_obtained = 0;

			if(empty($answer_opted))
			{

			}
		#	else if(empty($is_correct))
		#	{

		#	}
			else if($is_correct == 1)
			{
				$marks_obtained = $full_marks;
				$marks = $marks + $marks_obtained;
			}
			else if($answer_opted == 'E')
			{
				$marks_obtained = 0;
			}
			else if($is_correct == 0)
			{
				$marks_obtained = -1 * $negative_marks;
				$marks = $marks + $marks_obtained;
			}


			echo "<td>" . $marks_obtained . "</td>";

			echo "</tr>";
			
        }

        echo "</table>";

		
        echo "<br/>";
        echo "<br/>";
        echo '<h2>Total Marks Obtained :'.$marks.' </h2>'

		
						?>
						
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