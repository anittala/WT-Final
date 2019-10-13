<?php

session_start();

if(isset($_POST['submit']))
{
	include 'dbconn.php';

	$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
	$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

	//error handling

	//check if empty
	if(empty($user_name) || empty($user_password))
	{
		header("Location: ../mainpage.php?login=empty");
		exit();

	}else{
		//checking username
		$sql = "SELECT * FROM signup WHERE user_name='$user_name' OR user_email='$user_name '";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if($resultcheck < 1)//no results
		{
			header("Location: ../mainpage.php?login=reserror");
			exit();
		}
		else
		 {
			if($row = mysqli_fetch_assoc($result))
			{
				//dehashing password
				$hashedPwdCheck = password_verify($user_password, $row['user_password']);
				if($hashedPwdCheck == false)
				{
					header("Location: ../mainpage.php?login=paserror");
					exit();
				}
				elseif ($hashedPwdCheck == true){
					//login the user here
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['user_first'] = $row['user_first'];
					$_SESSION['user_last'] = $row['user_last'];
					$_SESSION['user_email'] = $row['user_email'];
					header("Location: ../mainpage.php?login=success");
					exit();					
				}
			}
		}
	}
	
}else{
		header("Location: ../mainpage.php?login=wrongbut");
		exit();
	}