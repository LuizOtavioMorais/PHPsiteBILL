<?php
// PHP QUE CRIA USUARIO APARTIR DA CLASSE CREATE
require_once '../Models/Create.php';

$msgsucesso = '';
$create = new Create();

if (isset($_POST['submit'])) {
    $create->cadastrarDados();
}
$create->msgFeedback();

?>

<!DOCTYPE html>
<!-- HTML DE EXIBIÇÃO DA PAGINA PRINCIPAL DO SITE -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICIO</title>
    <link rel="stylesheet" href="../Styles/stylesCreateAndUpdate.css">
</head>
<body>
<h1>MÉTODO CRUD FUNCIONAL</h1>
<section3>
    <p id="msgsucesso"> <?php echo $msgsucesso; ?> </p>
</section3>
<main>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome-input" required> <br>

        <label for="email">Email:</label>
        <input type="email" id="email-input" name="email-input" required> <br>

        <label for="Senha"> Senha: </label>
        <input type="password" id="senha" name="senha-input" required> <br>

        <input type="submit" name="submit" value="Enviar" id="enviar"> <br>
    </form>
</main>
<!-- LISTA QUE EXIBE USUARIO COM O DELETE E O EDITAR (AMBOS USANDO OS OBJETOS DELETE E UPDATE) -->
<section2 id="listaPermanente">
    <h2>Lista de Usuarios: </h2>
    <hr>
    <?php
    $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
    $sqlExibe = "SELECT * FROM usuarios1";
    $exibido = $PDO->query($sqlExibe);
    $listaDeUsuarios = $exibido->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($listaDeUsuarios as $usuario) {
        echo "<h3> Usuario ID: " . $usuario['id'] . "</h3>";
        echo "<p> Nome: " . $usuario['nome'] . "</p>" . "<br>";
        echo "<p> Email: " .  $usuario['email'] ."</p>". "<br>";
        echo '<a href="../Models/Delete.php?id=' . $usuario['id'] . '" id="delete"><button id="deletebutton">Deletar Usuario</button></a>';
        echo '<a href="../Views/UpdateWeb.php?id=' . $usuario['id'] . '" id="update"><button id="updatebutton">Editar Usuario</button></a>';
        echo "<hr>";
    }
    ?>
</section2>

<footer><h6>Feita pelo Luizindomau</h6></footer>
</body>
</html>
