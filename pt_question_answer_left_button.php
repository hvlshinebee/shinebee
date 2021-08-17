<?php
	
	
	$year = $_POST['year'];
	$question_number = $_POST['question_number'];
	$tags = $_POST['tags'];
	$mynotes = $_POST['mynotes'];
	$mythinking = $_POST['mythinking'];
	$year_to_get= $_POST['year_to_get'];
	$question_number_to_get= $_POST['question_number_to_get'];
	
	
	
	/*
	$year = "2019";
	$question_number = 2;
	$tags = "tags";
	$mynotes = "notes";
	$mythinking = "think";
	$year_to_get= 2020;
	$question_number_to_get= 2;
	*/
	
	
	//$user = "Manish"; // take it from session
	$user = $_POST['user'];
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
		$next_question_sql = "select * from prelims_questions where year='$year_to_get' and question_number=$question_number_to_get";
		
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
			$question_id = "";
				
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
				$question_id = $row_result['id'];
			}
			
			//fetch already saved data for the next question for the user.
			
			$user_next_question_sql = "select * from prelims_questions_answer where year='$year_to_get' and user_id='$user' and question_number=$question_number_to_get";
			$user_result_next_question_sql = mysqli_query($connection, $user_next_question_sql);
			$user_row_result_next_question_sql = mysqli_num_rows($user_result_next_question_sql);
			
			$tags_present = "";
			$mythinking_present = "";
			$mynotes_present = "";
			
			
			if ($user_row_result_next_question_sql>0)
			{
				while ($user_row_result = mysqli_fetch_assoc($user_result_next_question_sql))
				{
					$tags_present = $user_row_result['tags'];
					$mythinking_present = $user_row_result['mythinking'];
					$mynotes_present = $user_row_result['mynotes'];
				}
			}
			$user_question_sql = "select * from prelims_questions_answer where year='$year' and question_number=$question_number";
			$user_resul_tuser_questionsql = mysqli_query($connection, $user_question_sql);
			$row_result_next_question_sql = mysqli_num_rows($user_resul_tuser_questionsql);
			$arrayrow=array();
			while ($mrow_result = mysqli_fetch_assoc($user_resul_tuser_questionsql))
			{
				$rowdata['mythinking_present'] =  $mrow_result['mythinking'];
				$rowdata['user'] =  $mrow_result['user_id'];
				$arrayrow[] = $rowdata;
			}
			$data["usercomment"]=$arrayrow;
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
			$data["topic"] = $topic;
			$data["tags_value"] = $tags_present;
			$data["mynotes"] = $mynotes_present;
			$data["mythinking"] = $mythinking_present;
			$data["question_id"] = $question_id;
			
			echo json_encode($data);
		}
		else
		{
			$data["is_next_available"] = "false";
			$data["error"] = "No more question available";
			$data["question_year"] = $year;
			$data["question_number"] = $question_number;
			$data["question_id"] = $question_id;
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
		$data["question_id"] = $question_id;
		echo json_encode($data);
	}
	
	//make query for next result from prelims question 
	
	//make another quesry for user anwserand populate tags, mynotes, mythinking
	
	//finally make json out of it.
?>