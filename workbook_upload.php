<?php
	echo "Uploading..";
	if(isset($_FILES["photo"]))
	{
		$filename = $_FILE["photo"]["name"];
		$filetype = $_FILE["photo"]["type"];
		$filesize = $_FILE["photo"]["size"];
		
		$targetfolder = "upload/";

		$targetfolder = $targetfolder . basename( $_FILES['photo']['name']) ;
 
		
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $targetfolder))
		{
			echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
			
			$path = "https://www.shineb.in/".$targetfolder;
			
			$servername = "localhost";
				$username = "hvlias";
				$password = "hvlias@123";
				$db = "db1";
				$connection = mysqli_connect($servername, $username, $password,$db);
				
				if($connection === false)
				{
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				
			$insert_sql = "insert into workbook(filename, path) VALUES ('$filename', '$path')";
		
			$insertUpdateResult = mysqli_query($connection, $insert_sql);
			
			echo "File has been uploaded successfully";
		}
		else {
			echo "Problem uploading file";
		}
		
		
		/*
		if(file_exists("upload/".$filename))
		{
			echo $filename. " already exists.";
		}
		else
		{
			move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/".$filename);
			
			$path = "https://www.shineb.in/upload/".$filename;
			$insert_sql = "insert into workbook(filename, path) VALUES ('$filename', '$path')";
		
			$insertUpdateResult = mysqli_query($connection, $insert_sql);
			
			echo "File has been uploaded successfully";
		}
		*/
	}
?>