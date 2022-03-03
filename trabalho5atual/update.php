<?php
include 'conecta_bd.php';
if(isset($_POST['nome'])){
$sql = "SELECT imagem FROM atelies where id = $_GET[id]";
$imagem = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
$descricao = mysqli_real_escape_string($conn, trim($_POST['descricao']));
$valor = mysqli_real_escape_string($conn, trim($_POST['valor']));

$arquivo = $_FILES['imagem'];
$extensao = strtolower(substr($arquivo['name'], -4)); //pega extensão do arquivo
$novo_nome = md5(time()) . $extensao;  //define o novo nome usando hash
$diretorio = "upload/".$novo_nome ; //diretorio para onde vai o arquivo	

$sql = "UPDATE atelies SET nome='$nome',descricao='$descricao', imagem='$novo_nome', valor='$valor' WHERE id='$_GET[id]'";

if (mysqli_query($conn, $sql)) {
    move_uploaded_file($arquivo['tmp_name'], $diretorio);
    unlink("upload/".$imagem['imagem']);
    echo"<script>
            alert('Produto atualizado com sucesso!');
            window.location.href='../lista_tabela.php';
        </script>";
} else {
   echo"<script>
            alert('Erro ao atualizar o produto!');
            window.location.href='../'editar.php/?id=$_GET[id]';
        </script>";
}
mysqli_close($conn);
}
?>