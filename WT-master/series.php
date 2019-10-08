<?php

include_once 'header.php';

?>
<article class="article">
	<?php

	$sql = "SELECT * FROM shows WHERE sh_type='TV Series';";
	$result = mysqli_query($conn, $sql);
	$queryResults = mysqli_num_rows($result);
	if ($queryResults > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<a href='show.php?title=".$row['sh_name']."&release=".$row['sh_release']."'><div class='article-box'>
				<h3>".$row['sh_name']."</h3>
				<p>".$row['sh_release']."</p>
				<p>".$row['sh_dur']."</p>
				<p>".$row['sh_story']."</p>
				<p>".$row['sh_cast']."</p>
				<p>".$row['sh_awards']."</p>
				</div></a>"	;
		}
	}
	
?>
</article>



<?php

include_once 'footer.php'

?>