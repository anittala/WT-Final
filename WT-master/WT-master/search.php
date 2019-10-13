<?php

session_start();
include_once 'includes/dbconn.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SHOWTIME</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="links.css">
	<script type="text/javascript" src="2.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
		<div class="logo1">
		

			<script type="text/javascript">
				function searchsub(str){
					if (str.length==0) {
				    document.getElementById("livesearch").innerHTML="";
				    document.getElementById("livesearch").style.border="0px";
				    return;
				  }
				  if (window.XMLHttpRequest) {
				    // code for IE7+, Firefox, Chrome, Opera, Safari
				    xmlhttp=new XMLHttpRequest();
				  } else {  // code for IE6, IE5
				    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				  xmlhttp.onreadystatechange=function() {
				    if (this.readyState==4 && this.status==200) {
				      document.getElementById("livesearch").innerHTML=this.responseText;
				      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
				    }
				  }
				  xmlhttp.open("GET","search.php?q="+str,true);
				  xmlhttp.send();
				}
			</script>

			
			
		</div> 		
	</header>



<div class="article">
	<?php

	$q = $_REQUEST["q"];

	if(isset($q))
		{
			$search = mysqli_real_escape_string($conn, $q);
			$sql = "SELECT * FROM shows WHERE sh_name LIKE '%$search%' ";
			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			echo "There are ".$queryResult." results!";

			if($queryResult > 0)
			{
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<a href='show.php?title=".$row['sh_name']."&release=".$row['sh_release']."'><div class='article-box'>
					<h3>".$row['sh_name']."</h3><br>
					</div></a>"	;

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