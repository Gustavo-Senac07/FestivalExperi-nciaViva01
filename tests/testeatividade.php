<?php

require_once __DIR__ . '/../model/atividades.php';
require_once __DIR__ . '/../service/atividadeservice.php';

try {
    $atividade = new atividade(
        "Demonstrações Culinárias",
        "Varias demonstrações e conceitos culinários básicos",
        "2026-09-02 12:00:00",
        25
    );

    $service = new atividadeservice();

    if ($service->cadastrar($atividade))
    {
        echo "Participante cadastrado com sucesso!";
    }

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}