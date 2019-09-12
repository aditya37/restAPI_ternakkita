<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_POST['username'])){

      $username  = $_POST['username'];
      $password  = $_POST['password'];
      $date      = date('Y-m-d');
      $id        = acak(16);

      $api      = new apihandler();
      $register = $api->customerRegister($id,$username,$password,"Vendor",$date);
      print_r($register);
  }else{
    echo json_encode(array("message" => "Field Masih Ada Yang Kosong"));
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

?>
