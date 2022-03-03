<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Listagem de Usuários</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h2>Listagem dos produtos cadastrados no ateliê</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Nome </th>
                    <th> Descrição </th>
                    <th> imagem </th>
                    <th> Preço </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conecta_bd.php';
                $sql = "SELECT id, nome, descricao, imagem, valor FROM atelies";
                $retorno = mysqli_query($conn, $sql);
                if (mysqli_num_rows($retorno) > 0) {

                    while ($row = mysqli_fetch_assoc($retorno)) {
                        echo "<tr>";
                        echo "<td> $row[id] </td>";
                        echo "<td> $row[nome] </td>";
                        echo "<td> $row[descricao] </td>";
                        echo "<td><img src ='upload/$row[imagem]' alt ='upload/$row[imagem]' style = height=42 width= 50> </td>";
                        echo "<td> $row[valor] </td>";
                        echo "<td><a href='editar.php/?id=$row[id]'>
                        <span class='material-icons'> edit </span>
                        </a></td>";
                        echo "<td><a href='delete.php/?id=$row[id]' >
                         <span class='material-icons'> delete </span></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Não possui dados no banco";
                }
                echo "<a href='cadastro_atelie.php'> adicionar produto </a> <br> <br>";
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>