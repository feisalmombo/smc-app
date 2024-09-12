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
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['surname'])){
		$first_name = stripslashes($_REQUEST['first_name']); // removes backslashes
        $first_name = mysqli_real_escape_string($con,$first_name); //escapes special characters in a string

		$surname = stripslashes($_REQUEST['surname']); // removes backslashes
        $surname = mysqli_real_escape_string($con,$surname); //escapes special characters in a string
        
		$email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);

        $role = stripslashes($_REQUEST['role']);
        $role = mysqli_real_escape_string($con,$role);
        
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
        
        $query = "INSERT into `users` (first_name, surname, email, password, role) VALUES ('$first_name', '$surname', '$email', '".md5($password)."', '$role')";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
    <main>
        <h2>Join Our Community</h2>
        <p>Become a member of SMC to access exclusive content and resources on online safety.</p>
        <form name="membership" action="" method="post">
            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" required><br><br>
            <label for="surname">Surname:</label><br>
            <input type="text" id="surname" name="surname" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="Member">Member</option>
                <option value="Coach">Coach</option>
                <option value="Moderator">Moderator</option>
                <option value="Parent">Parent</option>
            </select><br><br>
            <button type="submit">Register</button>

        </form>
        <p>Already a member? <a href="login.php">Log in</a></p>
    </main>

    <footer>
        <p>&copy; 2024 Social Media Campaigns Ltd.</p>
    </footer>

<?php } ?>
</body>
</html>

