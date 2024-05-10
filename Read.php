<?php

    $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");

    $read = $PDO->query("SELECT * FROM usuarios");
    $listaread = $read->fetchAll();
    var_dump($listaread);





?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICIO</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
<h1>BANCO DE DADOS FUNCIONAL</h1>
<main>
    <form action="Read.php" method="post">

        <input type="submit" value="Exibir Informações" id="enviar"> <br>
    </form>
</main>
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


