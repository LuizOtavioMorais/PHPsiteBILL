<?php

$id= filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT );

if ($id !== false){
    $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
    $sqlDeleteBotao = "DELETE FROM usuarios1 WHERE id = :id";
    $deletar = $PDO->Prepare($sqlDeleteBotao);
    $deletar->bindParam(':id', $id);
    if ($deletar->execute() === true) {
        echo "Usuario deletado com Sucesso";
        Header("location: /PHPSiteBILL/Create.php");
    }
    else {
        echo "Usuario não encontrado";
        Header("location: /PHPSiteBILL/Create.php");
    }
}

else{
    echo "Houve um erro ao deletar o usuario";
    Header("Location /Create.php");
}