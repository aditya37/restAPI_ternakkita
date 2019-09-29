<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_POST['judul'])){

          $data = array(
            "idProduct"  => acak(16),
            "judul"      => $_POST['judul'],
            "dateCreate" => $_POST['dateCreate'],
            "dateUpdate" => $_POST['dateUpdate'],
            "status"     => $_POST['status'],
            "id_login"   => $_POST['id_login']);

            $api = new apihandler();

            $addProduct = $api->addProduct(
            $data['idProduct'],
            $data['judul'],
            $data['dateCreate'],
            $data['dateUpdate'],
            $data['status'],
            $data['id_login']);

           print_r($addProduct);
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
