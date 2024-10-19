<?php include('db.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Blog Page</title>
</head>

<body>
    <h1>My Blog</h1>

    <form method="GET" action="index.php">
        <label>Search by Title:</label>
        <input type="text" name="search" placeholder="Search for posts...">
        <input type="submit" value="Search">
    </form>

    <h2>All Posts</h2>
    <?php
    $sql = "SELECT * FROM posts";

    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sql .= " WHERE title LIKE '%$search%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p><strong>Author: " . $row['author'] . "</strong></p>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<a href='update.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
            echo "<hr>";
        }
    } else {
        echo "No posts found.";
    }
    ?>

    <br>
    <a href="create.php">Create New Post</a>
</body>

</html>