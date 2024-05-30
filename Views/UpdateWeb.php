<?php
//COMANDO PARA EXIBIR UM VALOR NO CAMPO INPUT (PELO VALUE)
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
$sqlBusca = $PDO->prepare("SELECT * FROM usuarios1 WHERE id = :id");
$sqlBusca->bindParam(':id', $id, PDO::PARAM_INT);
$sqlBusca->execute();
$usuarioPassadoPeloGet = $sqlBusca->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<!--HTML DE EXIBIÇÃO DO SITE-->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio</title>
    <link rel="stylesheet" href="../Styles/stylesUpdate.css">
</head>
<body>
<h1>UPDATE</h1>

<main>

    <form action="../Models/Update.php?id=<?php echo $id ?>"  method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <label for="Nome">Nome do Usuario:</label>
        <input type="text" id="alterar" name="nomenovo-input" value="<?php echo isset($usuarioPassadoPeloGet[0]['nome']) ? $usuarioPassadoPeloGet[0]['nome'] : '';?>"> <br>

        <label for="Email"> Email: </label>
        <input type="email" id="novovalor" name="emailnovo-input" value="<?php echo isset($usuarioPassadoPeloGet[0]['email']) ? $usuarioPassadoPeloGet[0]['email'] : ''?>" > <br>


        <input type="submit" value="Enviar" id="enviar"> <br>
    </form>
</main>

<footer><h6>Feita pelo Luizindomau</h6></footer>
</body>
</html>