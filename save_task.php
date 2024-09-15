<?php
include("database/db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO Tasks(title, description) VALUES ('$title', '$description');";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    } else {
        $_SESSION['message'] = "Tarea guardada satisfactoriamente";
        $_SESSION['message_type'] = "success";
        header("Location: index.php");
    }
}
