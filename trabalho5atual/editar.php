<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Edição de Produtos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['usuario'])){
    if (isset($_GET['id'])) {
        include 'conecta_bd.php';
        $sql = "SELECT id, nome, descricao, imagem, valor FROM atelies where id = $_GET[id]";
        $produto = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        
    }
    else{
       echo "<script>
        alert('Não há id's, faça o cadastro!');
        window.location.href='../cadastro_atelie.php';
    </script>";
        }
    } else{
        "<script> 
            alert('Você não pode editar este produto pois ainda não fez login!');
            window.location.href='../login.html'
            </script>";
    }
    ?>
    <div class="container">
        <h3>Edição dos dados do Produto</h3>
        <?php
        echo "<form method='POST' action='../update.php/?id=$produto[id]' enctype='multipart/form-data'>";
        ?>
            <div class="form-group">
                <label for="pwd">Nome:</label>
                <?php
                echo "<input type='text' class='form-control' name='nome' value='$produto[nome]' required>";
                ?>
            </div>
            
            <div class="form-group">
                <label for="pwd">Descrição:</label>
                <?php
                echo "<input type='textarea' class='form-control' name='descricao' value='$produto[descricao]' required>";
                ?>
            </div>

            <div class="form-group">
                <label for="pwd">Imagem:</label>
                <input type="file" class="form-control" name="imagem" required>
            </div>

            <div class="form-group">
                <label for="pwd">Preço:</label>
                <?php
                echo "<input type='text' class='form-control' name='valor' value='$produto[valor]' required>";
                ?>
            </div>

            <input class='btn btn-primary' type="submit" name="submit" value="Enviar">
        </form>

    </div>
    
</body>

</html>