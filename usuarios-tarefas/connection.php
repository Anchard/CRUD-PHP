<?php

$con = new mysqli('localhost', 'root', '', 'usuarios-tarefas');

if ($con) {
    #echo "Connection succesfull";
} else {
    die(mysqli_error($con));
}
