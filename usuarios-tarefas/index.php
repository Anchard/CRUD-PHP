<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="usuario.php" class="text-light">Adicionar usuário</a></button>
        <button class="btn btn-primary my-5"><a href="tarefa.php" class="text-light">Adicionar tarefa</a></button>
        <h2>Tabela de usuários</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from `usuarios`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $nome = $row['nome'];

                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $nome . '</td>
                        </tr>';
                    }
                }
                ?>

                
                <table class="table">
                <h2 class="mt-5">Tabela de tarefas</h2>
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">fk</th>
                            <th scope="col">Título</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "select * from `tarefas`";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $fk_usuario = $row['fk_usuario'];
                                $titulo = $row['titulo'];

                                echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $fk_usuario . '</td>
                                <td>' . $titulo . '</td>
                                </tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>

                <table class="table">
                <h2 class="mt-5">Tabela de usuários e suas tarefas</h2>
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Usuário</th>
                            <th scope="col">Tarefa</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "select usuarios.nome, tarefas.titulo from `tarefas` inner join `usuarios` on usuarios.id = tarefas.fk_usuario order by nome asc";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $nome = $row['nome'];
                                $titulo = $row['titulo'];

                                echo '<tr>
                                <th scope="row">' . $nome . '</th>
                                <td>' . $titulo . '</td>
                                </tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>
    </div>

</body>

</html>