<?php

include('auth.php'); //include auth.php file on all secure pages 
?>
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
            <a href="index.php">Home</a> |
            <a href="how-parents-can-help.html">How Parents Can Help</a> |
            <a href="livestreaming.html">Livestreaming</a> |
            <a href="contact.php">Contact</a> |
            <a href="legislation-and-guidance.html">Legislation and Guidance</a> |
            <a href="viewusers.php"> Users</a> |
            <a href="posts.php"> Posts</a> |
            <a href="logout.php">Logout</a>
            
        </nav>
    </header>
    
    <main>
        <h2>Dashboard</h2>
        <p>Welcome <?php echo $_SESSION['email']; ?>! to SMC to access exclusive content and resources on online safety.</p>
        <p>This is secure area.</p>  Click here to view users<a href="viewusers.php">View Users</a> | <a href="createpost.php">Add Post</a> | <a href="posts.php">View Posts</a>
    </main>

    <footer>
        <p>&copy; 2024 Social Media Campaigns Ltd.</p>
    </footer>
</body>
</html>


