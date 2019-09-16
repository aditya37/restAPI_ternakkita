<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_POST['firstName'])){

      $data = array(
        'firstName' => $_POST['firstName'],
        'lastName'  => $_POST['lastName'],
        'birth'     => $_POST['birth'],
        'gender'    => $_POST['gender'],
        'phone'     => $_POST['phone'],
        'photo'     => $_POST['photo'],
        'id_login'  => $_POST['id_login']
      );

      $idData = acak(16);
      $api      = new apihandler();
      $register = $api->userData($idData,$data['firstName'],$data['lastName'],$data['birth'],$data['gender'],$data['phone'],$actualpath,$data['id_login']);
      var_dump($register);

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
