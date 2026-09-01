<?php

class participante
{
    private $nome;
    private $data_nasc;
    private $email;
    private $telefone;

    public function __construct(
        $nome, $data_nasc, $email, $telefone
    )
    {
        $this->nome = $nome;
        $this->data_nasc = $data_nasc;
        $this->email = $email;
        $this->telefone = $telefone;


    }


    public function getNome() { return $this->nome; }
    public function getNasc() { return $this->data_nasc; }
    public function getEmail() { return $this->email; }
    public function getTelefone() { return $this->telefone; }

}