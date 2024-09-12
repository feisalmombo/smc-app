<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership - SMC</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Social Media Campaigns Ltd.</h1>
        <nav>
            <a href="index.html">Home</a> |
            <a href="how-parents-can-help.html">How Parents Can Help</a> |
            <a href="livestreaming.html">Livestreaming</a> |
            <a href="contact.html">Contact</a> |
            <a href="legislation-and-guidance.html">Legislation and Guidance</a> |
            <a href="membership.php">Membership</a>
        </nav>
    </header>
    
    <?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
			header("Location: dashboard.php"); 
            }else{
				echo "<div class='form'><h3>Email/Password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
    <main>
        <h2>Login</h2>
        <p>Become a member of SMC to access exclusive content and resources on online safety.</p>
        <form name="membership" action="" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit">Login</button>

        </form>
        <p>Already a member? <a href="membership.php">Register</a></p>
    </main>

    <footer>
        <p>&copy; 2024 Social Media Campaigns Ltd.</p>
    </footer>

<?php } ?>
</body>
</html>

