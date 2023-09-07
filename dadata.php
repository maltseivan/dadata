<?php
require_once __DIR__ . '/vendor/autoload.php'; // Подключаем библиотеку для работы с dadata

// Через composer подключена библиотека https://github.com/hflabs/dadata-php
// Используйте ее, для написания своего решения
// > ==========================================
// > $token = "Replace with Dadata API key";
// > $secret = "Replace with Dadata secret key";
// > $dadata = new \Dadata\DadataClient($token, $secret);
// > ==========================================

/*echo "Ваше решение";*/

/**
 * Обработем данные и выведем на экран.
 */
function dataParsing(){

    $token = "585db5d0aa9ba73afc8f931574ba315fab9849df";
    $secret = "b110cee63f2374a42ccec2388dc38dc5e8d9e943";
    $dadata = new \Dadata\DadataClient($token, $secret);
    $result = $dadata->clean("name", $_GET['LASTNAME'].' '.$_GET['FIRSTNAME'].' '.$_GET['SECONDNAME']);

    echo json_encode($result);

}

dataParsing();