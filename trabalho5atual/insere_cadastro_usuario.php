<?php
session_start();
include 'conecta_bd.php';
if (isset($_POST['nome'])) {
    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conn, trim($_POST['senha']));

    $sql = "SELECT senha from usuario where email = '{$email}'";
    
    $rows = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rows) > 0) {
        echo "<script>
                alert('Já existe o email cadastrado!');
                window.location.href='cadastro_usuario.html';
            </script>";
    }
    else{
    // consulta sql para inserir um novo valor com a senha criptografada
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nome, email, senha)
VALUES ('$nome', '$email', '$senha_hash')";


    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Novo cadastro realizado com sucesso!');
                window.location.href='login.html';
            </script>";
    } else {
        "<script>
                alert('Não foi possível concluir o cadastro!');
                window.location.href='cadastro_usuario.html';
            </script>";
    }
}
}
echo "<form action='logout.php' method='POST'>";
echo "</form>";

