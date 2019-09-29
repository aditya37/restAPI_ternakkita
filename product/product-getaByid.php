<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_GET['idProduct'])){

    $data = array("idProduk" => $_GET['idProduct']);

    $api = new apihandler();
    $product = $api->getProduct($data['idProduk']);
    print_r($product);
  }else{
    $response = json_encode(array(
      "success" => "0",
      "message" => "Ooops!!"
    ));
    echo $response;
  }
