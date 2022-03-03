<?php
session_start();
include 'conecta_bd.php';
if(isset($_SESSION['usuario'])){
if (isset($_GET['id'])) {
    $sql = "SELECT imagem FROM atelies where id = $_GET[id]";
    $imagem = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "Delete FROM atelies WHERE id='$_GET[id]'";
    if (mysqli_query($conn, $sql)) {
        unlink("upload/".$imagem['imagem']);
        echo "<script>
                alert('O produto foi apagado com sucesso!');
                window.location.href='../lista_tabela.php';
            </script>";
    } else {
        echo "<script>
                alert('Erro ao apagar o produto!');
                window.location.href='../lista_tabela.php';
            </script>";
    }
}
    mysqli_close($conn);
} else{
    echo "<script>
    alert('Só é permitido apagar produtos para usuários logados!');
    window.location.href='login.html';
</script>";
}
?>