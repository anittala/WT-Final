<?php

include_once 'includes/signupdb.php';

$sql = "SELECT * FROM signup WHERE user_name='user_name' AND user_first='$user_first'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$userid = $row['user_name'];
		$sql = "INSERT INTO profileimgs (userid, status) VALUES ('$userid', 1)";
		mysqli_query($conn, $sql);
		header("Location: ../profile.php");
		
	}
	# code...
}

$