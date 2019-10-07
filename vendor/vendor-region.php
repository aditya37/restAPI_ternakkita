<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

  if(isset($_POST['provinsi'])){

    $data = array(
      'provinsi'  => $_POST['provinsi'],
      'kabupaten' => $_POST['kabupaten'],
      'kecamatan' => $_POST['kecamatan'],
      'desa'      => $_POST['desa'],
      'alamat'    => $_POST['alamat'],
      'kodepos'   => $_POST['postalcode'],
      'id_login'  => $_POST['id_login']
    );

    $api = new apihandler();

    // Id region
    $id_region = acak(16);
    $region = $api->vendorRegion($id_region,$data['provinsi'],$data['kabupaten'],$data['kecamatan'],$data['desa'],$data['alamat'],$data['kodepos'],$data['id_login']);
    print_r ($region);
  }else{
    $response = json_encode(array("message" => "Field Kosong","success" => "0","result" => array()));
    print_r($response);
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
