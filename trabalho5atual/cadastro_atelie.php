<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title> Ateliê de arte </title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['usuario'])){
    echo "<div class='container'>";
    echo    "<h3>Cadastre aqui seu produto ou arte!</h3>";
    echo    "<form method='POST' action='adiciona_atelie.php' enctype='multipart/form-data'>";
    echo        "<div class='form-group'>";
    echo        "<h3> Nome do produto: </h3>";
    echo        "<input type='text' class='form-control' name='nome' required>";
    echo        "</div>";

    echo        "<div class='form-group'>";
    echo        "<h3> Descrição e detalhes: </h3>";
    echo        "<input type='textarea' class='form-control' name='descricao' required>";
    echo        "</div>";

    echo        "<div class='form-group'>";
    echo        "<h3> Insira uma imagem do produto: </h3>";
    echo        "<input type='file' class='form-control' name='imagem' required>";
    echo        "</div>";

        
    echo        "<div class='form-group'>";
    echo        "<h3> Preço do produto: </h3>";
    echo        "<input type='text' class='form-control' name='valor' required>";
    echo        "</div>";
    echo            "</select>";
    echo            "<br></br>";
    echo        "<input class='btn btn-secondary' type='reset' value='Limpar'>";
    echo        "<input class='btn btn-primary' type='submit' name='submit' value='Enviar'>";
    echo    "</form>";
    echo "</div>";
    } else{
        echo "<script>
                    alert('Só é permitido inserir produtos para usuários logados!');
                    window.location.href='login.html';
                </script>";
    }
    ?>
</body>

</html>