<?php

class inscricao
{
    private $participante_id_participante;
    private $atividades_id_atividades;

    public function __construct(
        $participante_id_participante,
        $atividades_id_atividades,
    )
    {
        $this->participante_id_participante = $participante_id_participante;
        $this->atividades_id_atividades = $atividades_id_atividades;
    }

    public function getParticipanteId() { return $this->participante_id_participante; }
    public function getAtividadeId() { return $this->atividades_id_atividades; }
}