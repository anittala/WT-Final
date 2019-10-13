<?php

session_start();
include_once 'includes/dbconn.php';
$id = $_SESSION['user_name'];

if(isset($_POST['submit'])
{
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));


	$allowed = array('jpeg', 'jpg', 'png', 'pdf');

	if(in_array($fileActualExt, $allowed))
	{
		if ($fileError === 0) 
		{
			if ($fileSize < 1000000) 
			{
				$fileNameNew = "profile".$id.".".$fileActualExt;
				$fileDest = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDest);
				$sql = "UPDATE profileimgs SET status=0 WHERE userid='user_name';";
				$result = mysqli_query($conn, $sql);
				header("Location: ../profile.php?uploadsuccess");
			}
			else
			{
				echo "Your file is too big";
			}
			
		}
		else
		{
			echo "There was an error in uploading.";
		}
	}
	else
	{
		echo "You cant upload files of this type";
	}
}

