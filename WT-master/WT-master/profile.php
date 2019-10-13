<?php

include_once 'header.php';

?>

<?php

	$sql = "SELECT * FROM signup";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['user_name'];
			$sqlImg = "SELECT * FROM profileimgs WHERE userid='$user_name'";
			$resultImg = mysqli_query($conn, $sqlImg);
			while ($rowImg = mysqli_fetch_assoc($resultImg)) {
				# code...
				echo "<div class='user-container'>";
				if ($rowImg['status'] == 0) {
					echo "<img src='uploads/profile".$user_name.".jpg?".mt_rand()."'>";
				}else{
					echo "<img src='uploads/profiledefault.jpg'>";
				}
				echo "<p>".$row['user_name']."</p>";
				echo "</div>";
			}
		}
	}else
	{
		echo "No users yet.";
	}

	if (isset($_SESSION['user_name'])) {
		if ($_SESSION['user_name'] == '$user_name') {
			echo "You are logged in";
			# code...
		}
		echo '<article class="article">
				<form action="upload.php" method="POST" enctype="multipart/form-data">
					<input type="file" name="file">
					<button type="submit" name="submit">Upload</button>
					
				</form>
			</article>'	;
		# code...
	}
	else{
		echo "Not logged in";
		include_once 'signuptop.php';
	}

?>


<?php

include_once 'footer.php'

?>