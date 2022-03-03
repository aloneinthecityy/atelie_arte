<?php
session_start();
include 'conecta_bd.php';

// sql para criar tabela atelie
$sql = "CREATE TABLE atelies (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    imagem VARCHAR(255),
    valor VARCHAR(10) NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    echo "Tabela ateliê criada com sucesso <br>";
} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conn) . "<br>";
}

// sql para criar tabela usuario
$sql = "CREATE TABLE usuario (
    id_usuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    senha VARCHAR(30) NOT NULL,
    email VARCHAR (50) NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
    echo "Tabela usuário criada com sucesso<br>";
} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);

?>