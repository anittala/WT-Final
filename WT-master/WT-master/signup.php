<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div class="signupbox">
        <img src="https://i.pinimg.com/originals/0b/50/30/0b5030fa1af3490323a23a71d3b89839.png" class="img">
        <h1>Signup</h1>
        <form action="includes/signupdb.php" method="POST">
            <p>Username</p>
            <input type="text" name="user_name" placeholder="Enter username" required>   <!--  VARCHAR -->
            <p>First Name</p>
            <input type="text" name="user_first" placeholder="Enter first name" required>     <!-- CHAR -->
            <p>Last Name</p>
            <input type="text" name="user_last" placeholder="Enter last name" required>   <!-- CHAR -->
            <p>Email</p>
            <input type="email" name="user_email" placeholder="Enter email" required>      <!-- VARCHAR -->
            <p>Password</p>
            <input type="password" name="user_password" placeholder="Password" required>   <!-- VARCHAR -->
            <button value="submit" name="submit" type="submit">SUBMIT</button><br>
            <a href="mainpage.php">Do you have an account?</a><br />
            <a href="mainpage.php">Back to Home Page</a>
        </form>
    </div>

</body>
</html>