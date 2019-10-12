<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

if(isset($_GET['idCustomer'])){

  $idCustomer = $_GET['idCustomer'];
  $id_product = $_GET['idProduct'];

  $api = new apihandler();
  $getData = $api->get_data_add_transaction($id_product,$idCustomer);
  print_r($getData);
  //var_dump($api);
}else{
  $response = json_encode(array(
    "success" => "0",
    "message" => "Ooops!!"
  ));
  echo $response;
}
