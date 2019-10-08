<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_POST['idCustomer'])){

          $data = array(
            "idTransaction"       => acak(16),
            "idCustomer"          => $_POST['idCustomer'],
            "idProduct"           => $_POST['idProduct'],
            "startTransaction"    => $_POST['startTransaction'],
            "endTransaction"      => $_POST['endTransaction'],
            "statusTransaction"   => $_POST['statusTransaction']);

            $api = new apihandler();

            $addTransaction = $api->addTransaction(
            $data['idTransaction'],
            $data['idCustomer'],
            $data['idProduct'],
            $data['startTransaction'],
            $data['endTransaction'],
            $data['statusTransaction']);

           print_r($addTransaction);
  }else{
          $response = json_encode(array(
            "success" => "0",
            "message" => "Ooops!!"
          ));
          echo $response;
  }

  function acak($panjang){

      $karakter= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $string = '';

      for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
      }
      return $string;
  }
