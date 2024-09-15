<?php
include("database/db.php");

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE Tasks SET title = '$title', description = '$description' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    } else {
        $_SESSION['message'] = "Tarea actualizada satisfactoriamente";
        $_SESSION['message_type'] = "info";
        header("Location: index.php");
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (isset($result)) {
        $row = mysqli_fetch_row($result);
        $title = $row[1];
        $description = $row[2];
?>
        <?php include("includes/header.php"); ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form action="edit.php?id=<?= $id ?>" method="POST">
                            <div class="form-group p-2">
                                <label for="title">Titulo</label>
                                <input type="text" name="title" class="form-control" placeholder="Actualiza las tareas" value="<?= $title ?>" autofocus>
                            </div>
                            <div class="form-group p-2">
                                <label for="description">Descripción</label>
                                <textarea type="text" name="description" class="form-control" placeholder="Actualiza la descripción de la tarea" rows="2"><?= $description ?></textarea>
                            </div>
                            <div class="form-group p-2">
                                <input type="submit" class="btn btn-block btn-success block w-100" name="update" value="Actualizar tarea">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
<?php
    }
}
