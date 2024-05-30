<?php

require_once '../GlobalFunctions/Validation.php';

class Update extends Validation
{
    //==================================
    public function filtraDados(): bool
    {
        $email = filter_input(INPUT_POST, "emailnovo-input", FILTER_VALIDATE_EMAIL);
        $nome = filter_input(INPUT_POST, "nomenovo-input", FILTER_SANITIZE_SPECIAL_CHARS);
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        if ($email !== false && $nome !== false && $id !== false) {
            return true;
        } else {
            return false;
        }
    } // @OVERRIDE que VALIDA OS DADOS

    public function verificaVazios(): bool
    {
        $email = !empty($_POST['emailnovo-input']);
        $nome = !empty ($_POST['nomenovo-input']);
        $id = !empty($_GET['id']);
        if ($email && $nome && $id) {
            return true;
        } else {
            return false;
        }
    } // @OVERRIDE que VERIFICA SE OS DADOS TAO VAZIOS

    public function entradaDeDados(): bool
    {
        $email = isset($_POST['emailnovo-input']);
        $id = isset($_GET['id']);
        $nome = isset($_POST['nomenovo-input']);
        if ($email && $id && $nome) {
            return true;
        } else {
            return false;
        }
    } // @OVERRIDE que VERIFICA SE ENTRARAM DADOS
    //==================================
    // COMEÇO DO COMANDO UPDATE
    public function updateDados(){

        try {
            if ($this->entradaDeDados() && $this->verificaVazios() && $this->filtraDados()) {
                $nome = $_POST['nomenovo-input'];
                $id = $_POST['id'];
                $email = $_POST['emailnovo-input'];
                $PDO = new PDO("mysql:host=localhost;dbname=bancoaula", "root", "");
                $sqlUpdate = "UPDATE usuarios1 SET nome = :nome, email = :email WHERE id = :id";
                $update = $PDO->prepare($sqlUpdate);
                $update->bindParam(':nome', $nome);
                $update->bindParam(':email', $email);
                $update->bindParam(':id', $id, PDO::PARAM_INT);
                $status = $update->execute();
                if ($status === true) {
                    header("location: ../Views/CreateWeb.php?id=3");
                    exit();
                } else {
                    header("location: ../Views/CreateWeb.php?id=2");
                    exit();
                }
            } else {
                header("location: ../Views/CreateWeb.php?id=2");
                exit();
            }

        } catch (PDOException $ex) {
            header("location: ../Views/CreateWeb.php?id=2");
            exit();
        }
    }}
// INICIA OBJETO E PUXA METODO UPDATE
    $update = new Update();
    $update->updateDados();

