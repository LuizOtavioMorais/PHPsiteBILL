<?php //READ PRONTO ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICIO</title>
    <link rel="stylesheet" href="stylesRead.css">
</head>
<body>
<h1>READ</h1>
<main>
    <form action="Read.php" method="post">

        <input type="submit" value="Exibir Informações" id="exibir" name="exibir-botton"> <br>
    </form>
</main>
<?php
//READ PRONTO
if(isset($_POST["exibir-botton"])) {

    $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");

    $read = $PDO->query("SELECT * FROM usuarios1");
    $listaread = $read->fetchAll();

    if($listaread){
        echo "<div class ='tabelacontainer'>";
        echo "<h2>Dados do Banco de Dados:</h2>";
        echo "<table border='1' id='tabela'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th></tr>";

        foreach($listaread as $usuario){
            echo "<tr>";
            echo "<td>" . $usuario['id'] . "</td>";
            echo "<td>" . $usuario['nome'] . "</td>";
            echo "<td>" . $usuario['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }


}


?>
<section>
    <h1> Gerenciamento do banco </h1> <br>
    <a href="Create.php"><button><h1>Create</h1></button></a>
    <a href="Read.php"><button><h1>Read</h1></button></a>
    <a href="Update.php"><button><h1>Update</h1></button></a>
    <a href="Delete.php"><button><h1>Delete</h1></button></a>
</section>

<footer><h6>Feita pelo Luizindomau</h6></footer>
</body>
</html>


