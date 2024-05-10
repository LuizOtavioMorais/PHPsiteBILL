<?php
//UPDATE PRONTO
if (isset($_POST['id-input']) && isset($_POST['alterar-input']) && isset($_POST['novovalor-input'])){
        if (!empty($_POST['id-input']) && !empty($_POST['alterar-input']) && !empty($_POST['novovalor-input'])) {

            //DEFINIÇÃO DE DADOS
            $dados = [
                'id' => $_POST['id-input'],
                'novovalor' => $_POST ['novovalor-input']
            ];

            $alterar = $_POST ['alterar-input'];
            //=====================
            //CONEXÃO E EXECUÇÃO DO CODIGO SQL
            $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
            $sql = "UPDATE usuarios SET $alterar = :novovalor WHERE id = :id";
            $EDITAR = $PDO->prepare($sql);
            $EDITAR->execute($dados);
            $msgValidação = "O usuario foi ATUALIZADO";
            //=====================
        }
        else{
            $msgValidação = "Preencha corretamente todos os campos!";

}}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICIO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>UPDATE</h1>
<p> <?php echo $msgValidação; ?> </p>
<main>

    <form action="Update.php" method="post">
        <label for="Id do usuario">Id do usuario:</label>
        <input type="text" id="id" name="id-input"> <br>

        <label for="Coluna a alterar">Coluna a ser alterada:</label>
        <input type="text" id="alterar" name="alterar-input"> <br>

        <label for="Novo valor"> Novo valor: </label>
        <input type="text" id="novovalor" name="novovalor-input"> <br>


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