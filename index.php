<?php include("database/db.php"); ?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 py-2">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?>" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form class="grid gap-3" action="save_task.php" method="POST">
                    <div class="form-group p-2">
                        <input type="text" name="title" class="form-control" placeholder="Titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group p-2">
                        <textarea type="text" name="description" class="form-control" placeholder="Descripción de la tarea" rows="2"></textarea>
                    </div>
                    <div class="form-group p-2">
                        <input type="submit" class="btn btn-block btn-success block w-100" name="save_task" value="Guardar tarea">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 py-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM Tasks;";
                    $result = mysqli_query($conn, $query);
                    if (isset($result)) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>