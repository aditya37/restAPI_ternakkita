<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_POST['firstName'])){
      $file_path = "photo/";

      $api      = new apihandler();

      $data = array(
        'firstName' => $_POST['firstName'],
        'lastName'  => $_POST['lastName'],
        'birth'     => $_POST['birth'],
        'gender'    => $_POST['gender'],
        'phone'     => $_POST['phone'],
        'imgFrmDevice'=> $_POST['locationImg'],
        'id_login'  => $_POST['id_login']
      );
        $file_path = $file_path . basename($_FILES['uploaded_file']['name']);
        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
          $idData = acak(16);
          $register = $api->customerData($idData,$data['firstName'],$data['lastName'],$data['birth'],$data['gender'],$data['phone'],$data['imgFrmDevice'],"customer/".$file_path,$data['id_login']);
          print_r($register);

        }else{
          $respone = json_encode(array("message" => "Gagal Upload","success" => "0","result" => array()));
          echo $respone;
        }
  }else{
    $response = json_encode(array("message" => "Field Kosong","success" => "0","result"   => array()));
    echo $respone;
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
