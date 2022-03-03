<?php
include 'conecta_bd.php';


if (isset($_POST['email'])) {
    session_start();
        $_SESSION['usuario'] = $_POST['nome'];
    
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));


    $sql = "SELECT senha, nome from usuario where email = '{$email}'";

    $rows = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($rows);
    
    if (mysqli_num_rows($rows) == 1) {
        if (password_verify($senha, $dados['senha'])) {
            session_start();
            $_SESSION['usuario']= $dados['nome'];
            echo "<script>
                 alert('Não foi encontrado o email digitado!');
                 window.location.href='login.html';
                </script>";
        } else {
            echo "<script>
                    alert('Senha não confere com o cadastro!');
                    window.location.href='login.html';
                </script>";
        }
    } else {
        echo "<script>
        alert('Login realizado com sucesso!');
        window.location.href='logout.php';
    </script>";
}
}
?>
