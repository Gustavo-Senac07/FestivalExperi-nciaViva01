<?php

require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../model/atividades.php';

class atividadeservice
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = conexao::conectar();
    }

    // Cadastrar atividades no banco de dados

    public function cadastrar(atividade $atividade)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO atividade
            (titulo, descricao, data_horario, vagas)
            VALUES (?, ?, ?, ?)"
        );

        $titulo = $atividade->getTitulo();
        $descricao = $atividade->getDescricao();
        $data_horario = $atividade->getData();
        $vagas = $atividade->getVagas();


        $sql->bind_param(
            "ssss",
            $titulo,
            $descricao,
            $data_horario,
            $vagas
        );

        return $sql->execute();
    }   

    // Listar as atividades cadastradas

    public function listar()
    {
        $sql = "SELECT * FROM atividade";
        $resultado = $this->conexao->query($sql);
        return $resultado->fetch_all(
            MYSQLI_ASSOC
        );
    }

    public function buscaporID($id)
    {
        $sql = $this->conexao->prepare(
            "DELETE FROM atividade
            WHERE id_atividade = ?"
        );

        $sql->bind_param(
            "i",
            $id
        );

        return $sql->execute();
    }


}
