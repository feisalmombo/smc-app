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
            <a href="dashboard.php">Dashboard</a> |
            <a href="viewusers.php">Users</a> |
            <a href="posts.php">Posts</a> |
            <a href="logout.php">Logout</a>
            
        </nav>
    </header>
    
    <?php
require('db.php');

//  Prepare the SQL query to select userID from the users table
$query2 = "SELECT userID, CONCAT(first_name, ' ', surname) AS full_name FROM users";

// Execute the query
$result2 = mysqli_query($con, $query2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userID = stripslashes($_POST['userID']);
    $userID = mysqli_real_escape_string($con, $userID);

    $title = stripslashes($_POST['title']);
    $title = mysqli_real_escape_string($con, $title);

    $content = stripslashes($_POST['content']);
    $content = mysqli_real_escape_string($con, $content);

    $imageURL = stripslashes($_POST['imageURL']);
    $imageURL = mysqli_real_escape_string($con, $imageURL);

    // Insert post into the database
    $query = "INSERT INTO posts (userID, title, content, imageURL) VALUES ('$userID', '$title', '$content', '$imageURL')";

    if (mysqli_query($con, $query)) {
        echo "Post created successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
    <main>
        <h2>Add Post</h2>    | <a href="posts.php">View Posts</a> 
        <p>Create a post to a SMC platform to access exclusive content and resources on online safety.</p>


        <form method="POST" action="createpost.php" enctype="multipart/form-data">
            <label for="userID">Select User:</label><br>
                <select name="userID" id="userID" required>
                    <?php
                    // Check if the query returns any rows
                    if (mysqli_num_rows($result2) > 0) {
                        // Fetch each row and populate the dropdown menu  userID 
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo "<option value='" . $row['userID'] . "'>" . $row['full_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No users found</option>";
                    }
                    ?>
                </select><br><br>

        <label for="title">Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label for="content">Content:</label><br>
        <textarea name="content" required></textarea><br><br>

        <label for="imageURL">Image URL:</label><br>
        <input type="text" name="imageURL"><br><br>

        <button type="submit">Create Post</button>
    </form>
    </main>

    <footer>
        <p>&copy; 2024 Social Media Campaigns Ltd.</p>
    </footer>
</body>
</html>

