<?php
$msgsucesso = '';
//NESSE EXERCICIO EU IREI FAZER UM SITE COM UM BANCO DE DADOS FUNCIONAL COM EXCLUSSAO ADICÃO ETC (CRUD)

//SELECIONANDO O QUE CHEGA
if (isset($_POST['email-input']) && isset($_POST['senha-input']) && isset($_POST['nome-input'])) {
    if (!empty($_POST['email-input']) && !empty ($_POST['senha-input']) && !empty($_POST['nome-input'])) {
        $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
        //REFERENCIAMENTO DE DADOS
        $dados = [
        'nome' => $_POST['nome-input'],
        'email' => $_POST['email-input'],
        'senha' => sha1($_POST['senha-input'])
        ];
        //CONEXAO COM O BANCO
        $sql = "INSERT INTO usuarios (id,nome,email,senha) VALUES (NULL,:nome,:email,sha1(:senha))";
        $resultado = $PDO->prepare($sql);
        $resultado->execute($dados);
        $msgsucesso = "Cadastro realizado com sucesso!";
}
    else {
        $msgsucesso = "Preencha todos os campos!";
    }

}
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
<h1>BANCO DE DADOS FUNCIONAL</h1>
<p> <?php echo $msgsucesso; ?> </p>
<main>
<form action="Create.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome-input"> <br>

    <label for="email">Email:</label>
    <input type="email" id="email-input" name="email-input"> <br>

        <label for="Senha"> Senha: </label>
        <input type="password" id="senha" name="senha-input"> <br>


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

