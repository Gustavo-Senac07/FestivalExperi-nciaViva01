<?php

require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../model/participante.php';

class participanteservice
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = conexao::conectar();
    }

    // Cadastrar participantes no banco de dados

    public function cadastrar(participante $participante)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO participante
            (nome, data_nasc, email, telefone)
            VALUES (?, ?, ?, ?)"
        );

        $nome = $participante->getNome();
        $data_nasc = $participante->getNasc();
        $email = $participante->getEmail();
        $telefone = $participante->getTelefone();


        $sql->bind_param(
            "ssss",
            $nome,
            $data_nasc,
            $email,
            $telefone
        );

        return $sql->execute();
    }   

    // Listar os participantes cadastrados

    public function listar()
    {
        $sql = "SELECT * FROM participante";
        $resultado = $this->conexao->query($sql);
        return $resultado->fetch_all(
            MYSQLI_ASSOC
        );
    }

    public function buscaporID($id)
    {
        $sql = $this->conexao->prepare(
            "DELETE FROM participante
            WHERE id_participante = ?"
        );

        $sql->bind_param(
            "i",
            $id
        );

        return $sql->execute();
    }


}
