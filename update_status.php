<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE task set status = '1' WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        die('Query Failed');
    }

    $_SESSION['message'] = 'Tarea eliminada correctamente.';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}

?>