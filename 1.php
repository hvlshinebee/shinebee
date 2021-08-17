<?php
	$servername = "localhost";
	$username = "hvlias";
	$password = "hvlias@123";
	$db = "db1";
	$connection = mysqli_connect($servername, $username, $password,$db);
	
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	
	    echo "came here";
        $sql = "select * from prelims_questions";

        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result))
        {
			
            $question = $row['question'];
            $option1 = $row['option1'];
            $option2 = $row['option2'];
			$option3 = $row['option3'];
            $option4 = $row['option4'];
            $correct_option = $row['correct_option'];
			$answer_description = $row['answer_description'];
            $year = $row['year'];
            $tags = $row['tags'];
			$topic = $row['topic'];
            $question_type = $row['question_type'];
            
			echo $question."<br/> <br/>";
			echo $option1."<br/>";
			echo $option2."<br/>";
			echo $option3."<br/>";
			
			echo $option4."<br/>";
        }
	
?>