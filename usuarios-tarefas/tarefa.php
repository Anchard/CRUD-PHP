<?php
include 'connection.php';
if (isset($_POST['enviar-tarefa'])) {
    $titulo = $_POST['titulo-tarefa'];
    $fk_usuario = $_POST['fk-nome-usuario'];

    $sql = "select id from `usuarios` where nome = '$fk_usuario'";
    $result = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    $fk_usuario = $row['id'];
    
    $sql = "insert into `tarefas`(titulo, fk_usuario) values('$titulo','$fk_usuario')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        #echo "Data inserted sucessfully";
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Lista de tarefas</title>
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Título da tarefa</label>
                <input type="nome" class="form-control" name="titulo-tarefa">
            </div>
            <div class="mb-3">
                <label class="form-label">Pessoa que irá realizar a tarefa</label>
                <input type="nome" class="form-control" name="fk-nome-usuario">
            </div>
            <button type="submit" class="btn btn-primary" name="enviar-tarefa">Enviar</button>
        </form>
    </div>
</body>

</html>