<?php

include_once 'header.php';

?>
<article class="article">
	<?php

	$title = mysqli_real_escape_string($conn, $_GET['title']);
	$release = mysqli_real_escape_string($conn, $_GET['release']);

	$sql = "SELECT * FROM shows WHERE sh_name='$title' AND sh_release='$release';";
	$result = mysqli_query($conn, $sql);
	$queryResults = mysqli_num_rows($result);
	if ($queryResults > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='article-box'>
				<h3>".$row['sh_name']."</h3>
				<p>".$row['sh_release']."</p>
				<p>".$row['sh_dur']."</p>
				<p>".$row['sh_story']."</p>
				<p>".$row['sh_cast']."</p>
				<p>".$row['sh_awards']."</p>
				</div>"	;

			# code...
		}
		# code...
	}
	
?>
</article>



<?php

include_once 'footer.php'

?>