<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // echo $id,$title,$description;

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);
    // echo $query;

    $_SESSION['message'] = 'Tarea editara correctamente.';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group mb-3">
                    <label class="form-label">Título de la tarea</label>
                    <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualiza el título.">
                </div>
                <div class="form-group mb-3">
                <label class="form-label">Descripción de la tarea</label>
                    <textarea name="description" rows="2" class="form-control" placeholder="Actualiza la descripción."><?php echo $description; ?></textarea>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>