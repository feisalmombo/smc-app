<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SMC</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Social Media Campaigns Ltd.</h1>
        <nav>
            <a href="index.php">Home</a> |
            <a href="how-parents-can-help.html">How Parents Can Help</a> |
            <a href="livestreaming.html">Livestreaming</a> |
            <a href="contact.php">Contact</a> |
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
        <h2>Contact Us</h2>
        <p>If you have any questions or need support, please reach out to us:</p>
        <p>Email: support@smc.com</p>
        <p>Phone: +123 456 7890</p>
        <form action="contact.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required></textarea><br><br>
            <button type="submit">Send Message</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Social Media Campaigns Ltd.</p>
    </footer>
<?php } ?>
</body>
</html>

