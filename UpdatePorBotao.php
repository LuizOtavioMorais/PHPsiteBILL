<?php

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
$sqlBusca = $PDO->prepare("SELECT * FROM usuarios1 WHERE id = :id");
$sqlBusca->bindParam(':id', $id, PDO::PARAM_INT);
$sqlBusca->execute();
$usuarioPassadoPeloGet = $sqlBusca->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICIO</title>
    <link rel="stylesheet" href="stylesCreate.css">
</head>
<body>
<h1>UPDATE</h1>

<main>

    <form action="/PHPSiteBILL/UpdatePorBotaoSubmit.php?id=<?php echo $id ?>"  method="post">

        <label for="Nome">Nome do Usuario:</label>
        <input type="text" id="alterar" name="nomenovo-input" value="<?php echo isset($usuarioPassadoPeloGet[0]['nome']) ? $usuarioPassadoPeloGet[0]['nome'] : '';?>"> <br>

        <label for="Email"> Email: </label>
        <input type="email" id="novovalor" name="emailnovo-input" value="<?php echo isset($usuarioPassadoPeloGet[0]['email']) ? $usuarioPassadoPeloGet[0]['email'] : ''?>" > <br>


        <input type="submit" value="Enviar" id="enviar"> <br>
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

