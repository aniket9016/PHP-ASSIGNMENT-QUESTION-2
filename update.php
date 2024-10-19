<?php include('db.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Post</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the existing post data before any update
        $sql = "SELECT * FROM posts WHERE id = $id";
        $result = $conn->query($sql);
        $post = $result->fetch_assoc();
    }

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];

        // Update the post
        $sql = "UPDATE posts SET title = '$title', author = '$author', content = '$content' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Post updated successfully!<br>";

            // Fetch the updated data again after the update
            $sql = "SELECT * FROM posts WHERE id = $id";
            $result = $conn->query($sql);
            $post = $result->fetch_assoc();  // Reassign to $post to reflect updated values
        } else {
            echo "Error updating post: " . $conn->error;
        }
    }
    ?>

    <h1>Update Post</h1>
    <form method="POST" action="update.php?id=<?php echo $id; ?>">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?php echo $post['title']; ?>" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" value="<?php echo $post['author']; ?>" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="5" cols="40" required><?php echo $post['content']; ?></textarea><br><br>

        <input type="submit" name="update" value="Update Post">
    </form>

    <br><br>
    <a href="index.php">Back to Blog</a>
</body>

</html>