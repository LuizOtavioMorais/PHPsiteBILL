<?php
//DELETE PRONTO
if (isset($_POST['id-input'])){

    //CONEXÃO COM BANCO DE DADOS
    $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");

    $dados=[
            'id' => $_POST['id-input']
    ];

    $sqldelete =  "DELETE FROM usuarios WHERE ID = :id";
    $stmt = $PDO->prepare($sqldelete);
    $stmt->execute($dados);
    if ($stmt->rowCount() > 0) {
        echo "Registro deletado com sucesso.";
    } else {
        echo "Erro ao deletar o registro.";
    }
} else {
    echo "ID não foi enviado.";

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICIO</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
<h1>Deletar</h1>
<main>
<form action="Delete.php" method="post">
    <label for="id">Digite o ID:</label>
    <input type="int" id="id" name="id-input"> <br>


                    <input type="submit" value="Deletar" id="enviar"> <br>
</form>
    </main>
<section>
    <h1> Gerenciamento do banco </h1> <br>
    <a href= "Create.php"> <button><h1>Create</h1></button> </a>
    <a href= "Read.php"> <button><h1>Read</h1></button> </a>
    <a href= "Update.php"> <button><h1>Update</h1></button> </a>
    <a href= "Delete.php"> <button><h1>Delete</h1></button> </a>
    </section>

<footer><h6>Feita pelo Luizindomau</h6></footer>
</body>
</html>
