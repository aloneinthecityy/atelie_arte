<?php
session_start();
$conn = mysqli_connect("localhost", "root", "");
// Verifica se conseguiu a conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Consulta sql que irá criar banco de dados
$sql = "CREATE DATABASE trabalho5";
if (mysqli_query($conn, $sql)) {
    echo "Base de dados criada com sucesso";
} else {
    echo "Erro ao criar a base de dados: " . mysqli_error($conn);
}

mysqli_close($conn);

?>