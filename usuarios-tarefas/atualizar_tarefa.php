<?php
include 'connection.php';

$id = $_GET['id'];
$sql = "select nome, titulo from `tarefas` inner join `usuarios` on `tarefas`.fk_usuario = `usuarios`.id where `tarefas`.id = '$id'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$titulo = $row['titulo'];
$nome = $row['nome'];


if (isset($_POST['enviar-tarefa'])) {
    $titulo = $_POST['titulo-tarefa'];
    $fk_usuario = $_POST['fk-nome-usuario'];

    $sql = "select id from `usuarios` where nome = '$fk_usuario'";
    $result = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    $fk_usuario = $row['id'];

    $sql = "update `tarefas` set titulo = '$titulo', fk_usuario = '$fk_usuario' where id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:index.php');
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
                <input type="nome" class="form-control" name="titulo-tarefa" value="<?php echo($titulo);?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Pessoa que irá realizar a tarefa</label>
                <input type="nome" class="form-control" name="fk-nome-usuario" value="<?php echo($nome);?>">
            </div>
            <button type="submit" class="btn btn-primary" name="enviar-tarefa">Atualizar</button>
        </form>
    </div>
</body>

</html>