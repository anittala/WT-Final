
<?php

include_once 'header.php';

?>
<div class="article">
	<?php
		if(isset($_POST['submit-search']))
		{
			$search = mysqli_real_escape_string($conn, $_POST['search']);
			$sql = "SELECT * FROM shows WHERE sh_name LIKE '%$search%' OR sh_type LIKE '%$search%' OR sh_story LIKE '%$search%' OR sh_cast LIKE '%$search%' OR sh_release LIKE '%$search%'";
			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			echo "There are ".$queryResult." results!";

			if($queryResult > 0)
			{
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<a href='show.php?title=".$row['sh_name']."&release=".$row['sh_release']."'><div class='article-box'>
					<h3>".$row['sh_name']."</h3>
					<p>".$row['sh_release']."</p>
					<p>".$row['sh_dur']."</p>
					<p>".$row['sh_story']."</p>
					<p>".$row['sh_cast']."</p>
					<p>".$row['sh_awards']."</p>
					</div></a>"	;
					# code...
				}

			}else{
				echo "There are no results matching your search..";
			}
		}


	?>
	
</div>
<?php

include_once 'footer.php'

?>