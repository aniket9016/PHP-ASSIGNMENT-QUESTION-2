<?php include('db.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Blog Post</title>
</head>

<body>
    <h1>Create a New Post</h1>

    <form action="create.php" method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="5" cols="40" required></textarea><br><br>

        <input type="submit" name="submit" value="Create Post">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];

        $sql = "INSERT INTO posts (title, author, content) VALUES ('$title', '$author', '$content')";

        if ($conn->query($sql) === TRUE) {
            echo "New post created successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <br><br>
    <a href="index.php">Back to Blog</a>
</body>

</html>