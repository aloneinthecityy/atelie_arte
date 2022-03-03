<?php
include 'conecta_bd.php';
if(isset($_POST['nome']))
{
    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $descricao = mysqli_real_escape_string($conn, trim($_POST['descricao']));
    $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));

    $arquivo = $_FILES['imagem'];
    $extensao = strtolower(substr($arquivo['name'], -4)); 
    $novo_nome = md5(time()). $extensao; 
    $diretorio = "upload/".$novo_nome ; 
    $sql = "INSERT INTO atelies (nome, descricao, imagem, valor)
    VALUES ('$nome', '$descricao', '$novo_nome', '$valor')";
    
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($arquivo['tmp_name'], $diretorio);

        echo"<script>
                alert('Produto/arte cadastrado no ateliê com sucesso!');
                window.location.href='lista_tabela.php';
            </script>";
    } else {

        echo"<script>
        alert('Erro ao efetuar cadastro, tente novamente.');
        window.location.href='cadastro_usuario.html';
    </script>";
     }
    mysqli_close($conn);

}

?>