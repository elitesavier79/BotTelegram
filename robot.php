<?php

    $token = '1387784353:AAEPKgmFrNLQygEMEe44lcSat3JZVNTXSe0';
    
    $url = 'https://api.telegram.org/bot'.$token;
    
    $telegram = json_decode(file_get_contents("php://input"), TRUE);

    $chatId = $telegram['message']['chat']['id'];
    
    $message = $telegram['message']['text'];
    
    
    if($message == 'Halo') {
        $reply =  'selamat datang di ZavetraStore';
        
        file_get_contents($url . '/sendmessage?chat_id=' . $chatId . '&text=' . $reply);
    }