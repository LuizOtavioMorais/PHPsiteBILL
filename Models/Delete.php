<?php
require_once '../GlobalFunctions/Validation.php';
class Delete extends Validation
{
    //COMEÇO DO CODIGO DE DELETAR
    public function deletarUsuario()
    {
       try {
           $id= filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT );
           $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
        $sqlDeleteBotao = "DELETE FROM usuarios1 WHERE id = :id";
        $deletar = $PDO->Prepare($sqlDeleteBotao);
        $deletar->bindParam(':id', $id);
                if ($deletar->execute() === true) {
                    header("location: ../Views/CreateWeb.php?id=5");
                    exit();
                }
                else {
                    header("location: ../Views/CreateWeb.php?id=4");
                    exit();
                }
       }
       catch (PDOException $ex){
           header("location: ../Views/CreateWeb.php?id=4");
           exit();
       }
    }
}
//OBJETO E METODO DELETE
$delete = new Delete();
$delete->deletarUsuario();