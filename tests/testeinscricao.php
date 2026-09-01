<?php

require_once __DIR__ . '/../model/inscricao.php';
require_once __DIR__ . '/../service/inscricoeservice.php';

try {
    $inscricao = new inscricao(
        1,
        1
    );

    $service = new inscricoeservice();

    if ($service->cadastrar($inscricao)) {
        echo "Inscrição cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar inscrição.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
