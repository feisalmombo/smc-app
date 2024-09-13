<?php
require('db.php');
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
            <a href="contact.html">Contact</a> |
            <a href="legislation-and-guidance.html">Legislation and Guidance</a> |
            <a href="dashboard.php">Dashboard</a> |
            <a href="viewusers.php">Users</a> |
            <a href="posts.php">Posts</a> |
            <a href="logout.php">Logout</a>
            
        </nav>
    </header>
    
    <main>
        <h2>Users</h2>
        <p>Welcome <?php echo $_SESSION['email']; ?>! To SMC to access exclusive content and resources on online safety.</p>

        <table width="100%" border="1" style="border-collapse:collapse;" >
            <thead>
                <tr>
                <th><strong>UserID</strong></th>
                <th><strong>First Name</strong></th>
                <th><strong>Surname</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Role</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count=1;
                $sel_query="Select * from users ORDER BY userID asc;";
                $result = mysqli_query($con,$sel_query) or die(mysqli_error($con));
                while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                <td align="center"><?php echo $row["userID"]; ?></td>
                <td align="center"><?php echo $row["first_name"]; ?></td>
                <td align="center"><?php echo $row["surname"]; ?></td>
                <td align="center"><?php echo $row["email"]; ?></td>
                <td align="center"><?php echo $row["role"]; ?></td>
                </tr>
                <?php $count++; } ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Social Media Campaigns Ltd.</p>
    </footer>
</body>
</html>


