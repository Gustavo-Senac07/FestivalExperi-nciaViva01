<?php

class atividade
{
    private $titulo;
    private $descricao;
    private $data_horario;
    private $vagas;

    public function __construct(
        $titulo, $descricao, $data_horario, $vagas
    )
    {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->data_horario = $data_horario;
        $this->vagas = $vagas;
    }

    public function getTitulo() { return $this->titulo; }
    public function getDescricao() { return $this->descricao; }
    public function getData() { return $this->data_horario; }
    public function getVagas() { return $this->vagas; }
}