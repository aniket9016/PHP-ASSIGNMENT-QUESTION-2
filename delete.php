<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the post
    $sql = "DELETE FROM posts WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Post deleted successfully!";
    } else {
        echo "Error deleting post: " . $conn->error;
    }
}
?>

<br>
<a href="index.php">Back to Blog</a>