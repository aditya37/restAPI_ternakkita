<?php
header('Content-Type: application/json');
include_once("../config/api-handler.php");

if(isset($_POST['price'])){
      $file_path = "photo/";

      $data = array(
        "idDetail" => acak(16),
        "gender"   => $_POST['gender'],
        "type"     => $_POST['type'],
        "berat"    => $_POST['bobot'],
        "harga"    => $_POST['price'],
        "deskripsi"=> $_POST['deskripsi'],
        "catatan"  => $_POST['note'],
        "usia"     => $_POST['age'],
        "idProduct" => $_POST['idProduct'],
      );

      $api = new apihandler();

      $file_path = $file_path . basename($_FILES['uploaded_file']['name']);

      if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        $idDetail = acak(16);
        $addProductDetail = $api->addProductDetail($data['idDetail'],
                                            $data['gender'],
                                            $data['type'],
                                            $data['berat'],
                                            $data['harga'],
                                            $data['deskripsi'],
                                            $data['catatan'],
                                            $data['usia'],
                                            "product/".$file_path,
                                            $data['idProduct']);
        print_r($addProductDetail);
      }else{
        $response = json_encode(array("success" => "0","message" => "Gagal Upload!!"));
        echo $response;
      }

}else{
  $response = json_encode(array("success" => "0","message" => "Ooops!!"));
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
