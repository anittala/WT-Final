<?php

if(isset($_POST['submit']))
{
	include_once 'dbconn.php';

	$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
	$user_first = mysqli_real_escape_string($conn, $_POST['user_first']);
	$user_last = mysqli_real_escape_string($conn, $_POST['user_last']);
	$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
	$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

	//error handling
	
	//check if empty
	if(empty($user_name) || empty($user_first) || empty($user_last) || empty($user_email) || empty($user_password))
	{
		header("Location: ../signup.php?signup=empty");
		exit();	
	
	} else {
		//check if input valid
		if(!preg_match("/^[a-zA-Z]*$/", $user_first) || !preg_match("/^[a-zA-Z]*$/", $user_last))
		{
			header("Location: ../signup.php?signup=invalid");
			exit();
		}
		else{
			//check if email valid
			if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../signup.php?signup=email_invalid");
				exit();
			}
			else{
				$sql = "SELECT * FROM signup WHERE user_name='$user_name'";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);

				if($resultcheck > 0)
				{
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}
				else{
					//hashing password
					$hashedPwd = password_hash($user_password, PASSWORD_DEFAULT);
					//insert user into db
					$sql = "INSERT INTO signup (user_name,user_first,user_last,user_email,user_password) VALUES ('$user_name', '$user_first', '$user_last', '$user_email', '$hashedPwd');";
					$result = mysqli_query($conn, $sql);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}

}
else{
	header("Location: ../signup.php");
	exit();
}