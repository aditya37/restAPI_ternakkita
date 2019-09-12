<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_POST['username'])){

    $username  = $_POST['username'];
    $password  = $_POST['password'];

    $api = new apihandler();
    $login = $api->customerLogin($username,$password);
    print_r ($login);
  }else{
    $response = json_encode(
        array(
            "Message" => "Masih Ada Field Yang Kosong",
            "Success" => "0",
            "UserLevel"=> "NULL",
            "Result"   => array(),
        ));
        echo $response;
  }
