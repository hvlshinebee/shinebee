<?php

	session_start(); 
	include 'database.php';

	$isLoginUser = $_SESSION['user_email'];
	$user_id = $_SESSION['user_id'];
	// echo $user_id; die;

	$question_id = $_GET['question_id'];
	$question_type = $_GET['question_type'];
	

	if(!empty($isLoginUser)){
		if(!empty($question_id) && !empty($question_type)){

			$response['status'] = true;
			$response['data'] =[];
			 $sql = "select question_comments.comment, user_list.user_name from question_comments join user_list on user_list.id = question_comments.user_id where user_id=user_id and question_id=$question_id and question_type='$question_type'";

			 $result = mysqli_query($connection, $sql);
			 $resultRows = mysqli_num_rows($result);
			 if($resultRows >0){
			 	while ($row_result = mysqli_fetch_assoc($result))
				{
					$response['data'][] =$row_result;
					$response ['status'] = true;
				}
			 }
			 echo json_encode($response);
		}else{

			echo "Requird fields cannot be empty!";
		}
	}else{
		if(!empty($question_id) && !empty($question_type)){

			$response['status'] = true;
			$response['data'] =[];
			 $sql = "select question_comments.comment, user_list.user_name from question_comments join user_list on user_list.id = question_comments.user_id where question_id=$question_id and question_type='$question_type'";

			 $result = mysqli_query($connection, $sql);
			 $resultRows = mysqli_num_rows($result);
			 if($resultRows >0){
			 	while ($row_result = mysqli_fetch_assoc($result))
				{
					$response['data'][] =$row_result;
					$response ['status'] = true;
				}
			 }
			 echo json_encode($response);
		}else{

			echo "Requird fields cannot be empty!";
		}
	}
	
?>