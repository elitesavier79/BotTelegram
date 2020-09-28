<?php

    include_once('config/database.php');
    $database = new database();
    $connect = $database->koneksi();

    $token = '1387784353:AAEPKgmFrNLQygEMEe44lcSat3JZVNTXSe0';
    
    $url = 'https://api.telegram.org/bot'.$token;
    
    $telegram = json_decode(file_get_contents("php://input"), TRUE);

    $chatId = $telegram['message']['chat']['id'];
    
    $message = $telegram['message']['text'];
    
    
    $str = '';
    if($message == 'Halo'){
        $str = 'Selamat Datang di ZavetraStore silakan ketik Produk untuk melihat produk per item';
    }
     else if($message == 'Produk') {
        $stmt = $connect->prepare("SELECT * FROM barang");
        $stmt ->execute();
        $barang = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($barang AS $row){
            $str .= $row['produk'] . "\n";
        }
         $str .= "\n";
         $str .= 'Silakan ketik Harga untuk melihat harga per item';   
    }

    else if($message == 'Harga') {
        $stmt = $connect->prepare("SELECT * FROM barang");
        $stmt ->execute();
        $barang = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($barang AS $row){
            $str .= $row['produk'] . "\n";

            $arrHarga = json_decode($row['harga'], true);
            foreach($arrHarga AS $ukuran => $harga){
                       $str.= $ukuran . ' = ' . number_format($harga) . "\n";
            }
            $str .= "\n";
        }
    }

    $reply = urlencode($str);
    file_get_contents($url . '/sendmessage?chat_id=' . $chatId . '&text=' . $reply);