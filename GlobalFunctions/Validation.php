<?php

class Validation // CLASSE PAI QUE PASSA METODOS DE VERIFICAÇÃO E SEGURANÇA DO BANCO
{
    // VERIFICA SE OS DADOS CORRESPONDEM AOS PEDIDOS E FILTRA ELES
    public function filtraDados(): bool
    {
        $email = filter_input(INPUT_POST, 'email-input', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha-input', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome = filter_input(INPUT_POST, 'nome-input', FILTER_SANITIZE_SPECIAL_CHARS);

        return $email !== false && $senha !== false && $nome !== false;
    }


    // VERIFICA SE HÁ ALGUM CAMPO VAZIO
    protected function verificaVazios(): bool
    {
        return !empty($_POST['email-input']) && !empty($_POST['senha-input']) && !empty($_POST['nome-input']);
    }

    // VERIFICA A ENTRADA DE DADOS
    protected function entradaDeDados(): bool
    {
        return isset($_POST['email-input']) && isset($_POST['senha-input']) && isset($_POST['nome-input']);
    }
}
