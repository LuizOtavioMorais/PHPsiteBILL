<?php

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'nomenovo-input', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'emailnovo-input', FILTER_VALIDATE_EMAIL);
if ($id !== false && !empty($nome) && !empty($email)) {

    $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
    $sqlUpdate = "UPDATE usuarios1 SET nome = :nome, email = :email WHERE id = :id";
    $update = $PDO->prepare($sqlUpdate);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':email', $email);
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    if ($update->execute() === true) {
        echo "Usuario atualizado com sucesso";
        Header("location: /PHPSiteBILL/Create.php");
    } else {
        echo "Usuario não encontrado";
        Header("Location: /PHPSiteBILL/Create.php");
    }
} else {
    echo "Prencha todos os campos";
    Header("location: /PHPSiteBILL/Create.php");

}
