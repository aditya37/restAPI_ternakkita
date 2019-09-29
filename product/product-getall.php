<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  $api = new apihandler();
  $product = $api->getallProduct();
  print_r($product);
