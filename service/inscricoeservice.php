<?php

require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../model/inscricao.php';

class inscricoeservice
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = conexao::conectar();
    }

    public function cadastrar(inscricao $inscricao)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO inscricao
            (participante_id_participante, atividades_id_atividades)
            VALUES (?, ?)"
        );

        $participanteId = $inscricao->getParticipanteId();
        $atividadeId = $inscricao->getAtividadeId();

        $sql->bind_param(
            "ii",
            $participanteId,
            $atividadeId
        );

        return $sql->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM inscricao";
        $resultado = $this->conexao->query($sql);

        return $resultado->fetch_all(
            MYSQLI_ASSOC
        );
    }

    public function cancelar($id_inscricao)
    {
        $sql = $this->conexao->prepare(
            "UPDATE inscricao
            SET status = 'cancelada'
            WHERE id_inscricao = ?"
        );

        $sql->bind_param("i", $id_inscricao);

        return $sql->execute();
    }
}
