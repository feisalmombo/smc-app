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
    
    <main class="container">
        <h2>Posts</h2>

        <a href="createpost.php">Add post</a>
        <p>Welcome <?php echo $_SESSION['email']; ?>! To SMC to access exclusive content and resources on online safety.</p>

        <table width="100%" border="1" style="border-collapse:collapse;" >
            <thead>
                <tr>
                <!-- <th><strong>S.No</strong></th> -->
                <th><strong>PostID</strong></th>
                <th><strong>UserID</strong></th>
                <th><strong>Title</strong></th>
                <th><strong>Content</strong></th>
                <th><strong>ImageURL</strong></th>
                <th><strong>CreatedAt</strong></th>
                <th><strong>UpdatedAt</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count=1;
                $sel_query="Select * from posts ORDER BY postID asc;";
                $result = mysqli_query($con,$sel_query) or die(mysqli_error($con));
                while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                <!-- <td align="center"><?php echo $count; ?></td> -->
                <td align="center"><?php echo $row["postID"]; ?></td>
                <td align="center"><?php echo $row["userID"]; ?></td>
                <td align="center"><?php echo $row["title"]; ?></td>
                <td align="center"><?php echo $row["content"]; ?></td>
                <td align="center"><?php echo $row["imageURL"]; ?></td>
                <td align="center"><?php echo $row["createdAt"]; ?></td>
                <td align="center"><?php echo $row["updatedAt"]; ?></td>
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


