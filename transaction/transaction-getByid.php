<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_GET['idCustomer'])){

    $data = array("idCustomer" => $_GET['idCustomer']);

    $api = new apihandler();
    $product = $api->getCustomerTransaction($data['idCustomer']);
    print_r($product);
  }else{
    $response = json_encode(array(
      "success" => "0",
      "message" => "Ooops!!"
    ));
    echo $response;
  }
