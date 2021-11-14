<?php
include 'connection.php';

function query(string $table, int $id){
    return "delete from `$table` where id = '$id'";
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $table = $_GET['table'];

    if($table == 1){
        $table = 'usuarios';
        $result = mysqli_query($con, query($table, $id));
    } elseif($table == 2){
        $table = 'tarefas';
        $result = mysqli_query($con, query($table, $id));
    }

    if ($result) {
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}  
?>