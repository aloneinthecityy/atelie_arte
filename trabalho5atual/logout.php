<!DOCTYPE html> 

<html lang="PT-BR"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <head> 

        <title> Logout </title> 

        <link rel="stylesheet" type="text/css" href="votacao.css"> 

        <meta charset="utf-8"> 
<?php
session_start();
if(isset($_SESSION['usuario'])){
    echo "Bem vindo(a)" . " " .  $_SESSION['usuario'] . "!" ."<br>";
    echo "<h3> Deseja ver a lista de produtos/artes do ateliê?</h3>";
    echo "<a href='lista_tabela.php'>Lista/inventário do ateliê </a> <br> <br>";
} else {

    echo "<h3> Deseja ver a lista de produtos/artes do ateliê?</h3>";
    echo "<a href='lista_tabela.php'>Lista/inventário do ateliê </a> <br> <br>";

}

?>
<h3>Deseja fazer logout?<h3>
<a href='destroy_session.php'><button>Logout</button></a>
</html>