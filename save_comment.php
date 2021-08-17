<?php

	session_start(); 
	include 'database.php';

	$isLoginUser = $_SESSION['user_email'];
	$user_id = $_SESSION['user_id'];
	// echo $user_id; die;
	$comment = $_POST['comment'];
	$question_id = $_POST['question_id'];
	$question_type = $_POST['question_type'];
	

	if(!empty($isLoginUser)){
		if(!empty($comment) && !empty($question_id) && !empty($question_type)){

			
			$insert_sql = "insert into question_comments(user_id, question_id, question_type, comment) VALUES ($user_id, $question_id, '$question_type', '$comment')";

			// echo $insert_sql; die;
		
			$insertComment = mysqli_query($connection, $insert_sql);
			echo "Success";
		}else{

			echo "Requird fields cannot be empty!";
		}
	}else{
		echo "Unauthorized access!";
	}
	
?>