<?php
	
	
	$year = $_POST['year'];
	$question_number = $_POST['question_number'];
	$tags = $_POST['tags'];
	$mynotes = $_POST['mynotes'];
	$mythinking = $_POST['mythinking'];
	$question_row_id = $_POST['question_row_id'];
	$topicRequest = $_POST['topic'];
	
	
	/*
	$year = "2019";
	$question_number = 4;
	$tags = "tags";
	$mynotes = "notes";
	$mythinking = "think";
	$question_row_id = 4;
	$topic = 'eco';
	*/
	
	$user = "Manish"; // take it from session
	
	$servername = "localhost";
	$username = "hvlias";
	$password = "hvlias@123";
	$db = "db1";
	$connection = mysqli_connect($servername, $username, $password,$db);
	
	if($connection === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
							
	$insertUpdateResult = false;
	
    $sql = "select * from prelims_questions_answer where user_id='$user' and year='$year' and question_number=$question_number";
	//echo "sql=".$sql."<br/>";
	
    $result = mysqli_query($connection, $sql);
	//echo "result=".$result."<br/>";
	
	$row = mysqli_num_rows($result);
	//echo "row=".$row."<br/>";
	
	
	if ($row>0)
    {
		$update_sql = "update prelims_questions_answer set tags='$tags', mynotes='$mynotes', mythinking='$mythinking' where user_id='$user' and year='$year' and question_number=$question_number";
		//echo "update_sql=".$update_sql."<br/>";
		
		$insertUpdateResult = mysqli_query($connection, $update_sql);
		//echo "insertUpdateResult=".$insertUpdateResult."<br/>";
	}
	else
	{
		$insert_sql = "insert into prelims_questions_answer(user_id, year, question_number, mythinking, mynotes, tags) VALUES ('$user', '$year', $question_number, '$mythinking', '$mynotes', '$tags')";
		//echo "insert_sql=".$insert_sql."<br/>";
		
		$insertUpdateResult = mysqli_query($connection, $insert_sql);
		//echo "insertUpdateResult=".$insertUpdateResult."<br/>";
	}
	
	if($insertUpdateResult)
	{
		$next_question_sql = "select * from prelims_questions where topic like '%$topicRequest%' and id>$question_row_id order by id limit 1";
		
		//echo "next_question_sql=".$next_question_sql."<br/>";
		
		$result_next_question_sql = mysqli_query($connection, $next_question_sql);
		
		$row_result_next_question_sql = mysqli_num_rows($result_next_question_sql);
		if ($row_result_next_question_sql>0)
		{			
			$question = "";
			$option1 = "";
			$option2 = "";
			$option3 = "";
			$option4 = "";
			$correct_option = "";
			$answer_description = "";
			$year = "";
			$question_number = "";
			$tags = "";
			$topic = "";
			$question_type = "";
			
			
			$id = "";
			$question_type = "";
			
			
			while ($row_result = mysqli_fetch_assoc($result_next_question_sql))
			{
				$question = $row_result['question'];
				$option1 = $row_result['option1'];
				$option2 = $row_result['option2'];
				$option3 = $row_result['option3'];
				$option4 = $row_result['option4'];
				$correct_option = $row_result['correct_option'];
				$answer_description = $row_result['answer_description'];
				$year = $row_result['year'];
				$question_number = $row_result['question_number'];
				$tags = $row_result['tags'];
				$topic = $row_result['topic'];
				$question_type = $row_result['question_type'];
				$id = $row_result['id'];
			}
			
			//fetch already saved data for the next question for the user.
			
			$user_next_question_sql = "select * from prelims_questions_answer where year='$year' and user_id='$user' and question_number=$question_number";
			$user_result_next_question_sql = mysqli_query($connection, $user_next_question_sql);
			$user_row_result_next_question_sql = mysqli_num_rows($user_result_next_question_sql);
			
			$tags_present = "";
			$mythinking_present = "";
			$mynotes_present = "";
			
			//echo "user_next_question_sql=".$user_next_question_sql."<br/>";
			
			if ($user_row_result_next_question_sql>0)
			{
				while ($user_row_result = mysqli_fetch_assoc($user_result_next_question_sql))
				{
					$tags_present = $user_row_result['tags'];
					$mythinking_present = $user_row_result['mythinking'];
					$mynotes_present = $user_row_result['mynotes'];
				}
			}
			
			//echo "tags_present=".$tags_present."<br/>";
			//echo "mythinking_present=".$mythinking_present."<br/>";
			//echo "mynotes_present=".$mynotes_present."<br/>";
			
			
			
			$data["is_next_available"] = "true";
			$data["question_year"] = $year;
			$data["question_number"] = $question_number;
			$data["question"] = $question;
			$data["option1"] = $option1;
			$data["option2"] = $option2;
			$data["option3"] = $option3;
			$data["option4"] = $option4;
			$data["correct_option"] = $correct_option;
			$data["answer_description"] = $answer_description;
			$data["question_type"] = $question_type;
			$data["topic"] = $topicRequest;
			$data["tags_value"] = $tags_present;
			$data["mynotes"] = $mynotes_present;
			$data["mythinking"] = $mythinking_present;
			$data["question_row_id"] = $id;
			
			echo json_encode($data);
		}
		else
		{
			$data["is_next_available"] = "false";
			$data["error"] = "No more question available";
			$data["question_year"] = $year;
			$data["question_number"] = $question_number;
			$data["question_row_id"] = $question_row_id;
			$data["topic"] = $topicRequest;
			
			echo json_encode($data);
		}
	}
	else
	{
		//server not responding. Please contact administrator
		$data["is_next_available"] = "false";
		$data["error"] = "Something went wrong";
		$data["question_year"] = $year;
		$data["question_number"] = $question_number;
		$data["question_row_id"] = $question_row_id;
		$data["topic"] = $topicRequest;
		echo json_encode($data);
	}
	
	//make query for next result from prelims question 
	
	//make another quesry for user anwserand populate tags, mynotes, mythinking
	
	//finally make json out of it.
?>