<?php

date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/../vendor/autoload.php";

$item = new MB\Cotacao();

$items = $item->simular([
    'plataforma_id' => '63157',
    'plataforma_chave' => '$2y$10$z9CfeFv3Y4rkhbK00zZ8.uLGuoLK4/rpGB8QFRjIkmyJlPmYlFBJy',
    "cep_origem" => "19026460", 
    "cep_destino" => "04707000",
    "servico" => "PAC",
    "peso" => "0.100",
    "altura" => "4",
    "largura" => "10",
    "comprimento" => "10",
]);

\MB\Helper\MBHelper::dump($items);

/*
stdClass Object
(
    [resultado] => stdClass Object
        (
            [sucesso] => true
            [mensagem] => Consulta realizada com sucesso
            [PAC] => stdClass Object
                (
                    [valor] => 16.55
                    [prazo] => 5
                )

        )

)
*/