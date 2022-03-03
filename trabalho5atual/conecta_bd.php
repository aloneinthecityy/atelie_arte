<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "trabalho5");
// Verifica se conectou certinho com o banco
if (!$conn) {
    die("Falha na conexão com o banco: " . mysqli_connect_error());
}

?>