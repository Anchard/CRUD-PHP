<?php
include 'connection.php';

$id = $_GET['id'];
$sql = "select nome from `usuarios` where id = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$nome = $row['nome'];

if (isset($_POST['enviar-usuario'])) {
    $nome = $_POST['nome-usuario'];

    $sql = "update `usuarios` set nome = '$nome' where id = '$id'";
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
                <label class="form-label">Escreva o nome do usuário</label>
                <input type="nome" class="form-control" name="nome-usuario" value="<?php echo($nome);?>">
            </div>
            <button type="submit" class="btn btn-primary" name="enviar-usuario">Atualizar</button>
        </form>
    </div>
</body>

</html>