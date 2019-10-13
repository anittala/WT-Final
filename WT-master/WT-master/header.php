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
				<p class="title"><a href="mainpage.php">Showtime</a></p>
			<nav class="right_tokens">
				<ul>
					<?php
								if(isset($_SESSION['user_name']))
								{
									echo $_SESSION['user_name'];
								}
						?>
					<div class="dropdown1">
					 	<a href="movie.php" class="dropbtn1">Movies</a>

					</div>
					<div class="dropdown2">
						<a href="series.php" class="dropbtn2">Web Series</a>

					</div>
					<!-- <div class="dropdown3">
					 	<a href="#" class="dropbtn3">News</a>

					</div> -->
				</ul>
			</nav>
			<nav class="bottom-header">
				<ul>
					<div class="bottom">
						
						<?php
								if(isset($_SESSION['user_name']))
								{
									echo'<div class="logout"><form action="includes/logoutdb.php" method="POST">
									<button type="submit" name="submit">Logout</button>
								</form></div>
								<div  class="profile"><a href="profile.php">Profile</a></div>';
								}
								else{

									echo '<div class="login">
									<form action="includes/logindb.php" method="POST">

										<input type="text" name="user_name" placeholder="Enter username">
										<input type="password" name="user_password" placeholder="Enter Password">
										<button type="submit" name="submit">Log-in</button>
									</form></div>
										<div class="signup"><a href="signup.php">Sign-Up</a></div>';
								}
							?>		
					</div>
				</ul>
			</nav>

			<div class="search">
				<form method="POST" action="search.php">
					<input type="text" name="search" placeholder="Search.." onkeyup="searchsub(this.value)">
					<div id='livesearch'></div>
					<button type="submit" name="submit-search">Search</button>
				</form>
			</div>

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

