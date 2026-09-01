<?php

require_once __DIR__ . '/../model/participante.php';
require_once __DIR__ . '/../service/participanteservice.php';

try {
    $participante = new participante(
        "Davi Motta",
        "2005-09-23",
        "davimotta@email.com",
        "32323232"
    );

    $service = new participanteservice();

    if ($service->cadastrar($participante))
    {
        echo "Participante cadastrado com sucesso!";
    }

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}