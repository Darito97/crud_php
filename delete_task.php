<?php
include("database/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM Tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    } else {
        $_SESSION['message'] = "Tarea eliminada satisfactoriamente";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php");
    }
}
