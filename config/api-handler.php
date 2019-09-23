<?php
include_once 'db-config.php';
/*
 File Api Handle => file ini berisi function untuk handling query data dari database dan di tampilkan dengan format JSON
 Note     :
    1. Jangan lupa tulis kapan terakhir anda mendevelop api dan masukan nama function yang terakhir anda coding
    2. Jangan lupa setelah develope atau ngoding update task/progress ke trello kerja Rodi
    3. Jika Developing atau ngoding selesai langsung di upload ke Github

  History (dd-mm-yyyy) => nama_function() :
    1. 11 September 2019

        Customer
      - customerRegister()
        Vendor
      - vendorRegister()
    2. 12 September 2019
      Customer
      - customerLogin()
      Vendor
      - vendorLogin()
    3. 13 September 2019
      - Data user
        membuat function untuk parsing data dari user yang Berdasarkan $id_user

*/
class apihandler extends database{

  public function __construct(){
    parent::__construct();
  }

  /* ==================================================================
  * Customer Handler
  * ==================================================================
  */

  // Customer Register
  public function customerRegister($id,$username,$password,$userLevel,$date){
    // Query Data Berdasarkan username
        $check_user = $this->koneksi->query("SELECT * FROM tbl_userLogin WHERE username='$username'");
    // Mengecek Apakah username yang Diinputkan Apakah Sudah terdaftar apa belum
        if($num_row = $check_user->num_rows > 0){
    // Parsing Data Ke Dalam Format JSON --- Start ---
        $response = json_encode(array(
                        "message" => "Sudah Terdaftar",
                        "success" => "0",
                        "result"   => array(),
                    ));
      // Parsing Data Ke Dalam Format JSON --- Finish ---
        }else{
          $insert_data = $this->koneksi->query("INSERT INTO tbl_userLogin VALUES ('$id','$username','$password','$userLevel','$date')");
          $response = json_encode(array(
                        "message" => "Berhasil Terdaftar",
                        "success" => "1",
                        "result"  => array(
                          "idCustomer" => $id,
                        ),
                    ));
        }
   return $response;
  }

  // Customer Login
  public function customerLogin($username,$password){

    $result = $this->koneksi->query("SELECT * FROM tbl_userLogin WHERE username='$username' AND password='$password'");

    if($result == false){
        return false;
    }
        if ($num_row = $result->num_rows > 0) {

            $data = $result->fetch_array();
            if($data['userLevel'] == "Customer"){

              $resultData = array(
                "idCustomer" => $data['id_login'],
                "username"   => $data['username'],
                "level"      => $data['userLevel']
              );

              $response = json_encode(
                  array(
                      "message"  => "Login Berhasil",
                      "success"  => "1",
                      "userLevel"=> "Customer",
                      "result"   => $resultData,
                  ));
            }else{
              $response = json_encode(
                  array(
                      "message" => "Anda Melakukan Login Dengan Akun Vendor",
                      "success" => "0",
                      "userLevel"=> "NULL",
                      "result"   => array(),
                  ));
            }

        }else{
          $response = json_encode(
              array(
                  "message" => "username Belum Terdaftar",
                  "success" => "0",
                  "userLevel"=> "NULL",
                  "result"   => array(),
              ));
        }
    return $response;
  }

  /* ==================================================================
  *  Vendor Handler
  *  ==================================================================
  */

  //Vendor Register
  public function vendorRegister($id,$username,$password,$userLevel,$date){
    // Query Data Berdasarkan username
        $check_user = $this->koneksi->query("SELECT * FROM tbl_userLogin WHERE username='$username'");
    // Mengecek Apakah username yang Diinputkan Apakah Sudah terdaftar apa belum
        if($num_row = $check_user->num_rows > 0){
    // Parsing Data Ke Dalam Format JSON --- Start ---
        $response = json_encode(array(
                        "message" => "Sudah Terdaftar",
                        "success" => "0",
                        "result"   => array(),
                    ));
      // Parsing Data Ke Dalam Format JSON --- Finish ---
        }else{
          $insert_data = $this->koneksi->query("INSERT INTO tbl_userLogin VALUES ('$id','$username','$password','$userLevel','$date')");
          $response = json_encode(array(
                        "message" => "Berhasil Terdaftar",
                        "success" => "1",
                        "result"   => array(),
                    ));
        }
   return $response;
  }

  // Vendor login
  public function vendorLogin($username,$password){

    $result = $this->koneksi->query("SELECT * FROM tbl_userLogin WHERE username='$username' AND password='$password'");

    if($result == false){
        return false;
    }
        if ($num_row = $result->num_rows > 0) {

            $data = $result->fetch_array();

            if($data['userLevel'] == "Vendor"){

              $resultData = array(
                "idCustomer" => $data['id_login'],
                "username"   => $data['username'],
                "level"      => $data['userLevel']
              );

              $response = json_encode(
                  array(
                      "message"  => "Login Berhasil",
                      "success"  => "1",
                      "userLevel"=> "Vendor",
                      "user"   => $resultData,
                  ));
            }elseif($data['userLevel'] == "Customer"){
              $response = json_encode(
                  array(
                      "message"  => "user Terdaftar Sebagai Customer",
                      "success"  => "0",
                      "userLevel"=> "NULL",
                      "user"   => array(),
                  ));
            }

        }else{
          $response = json_encode(
              array(
                  "message" => "username Belum Terdaftar",
                  "success" => "0",
                  "userLevel"=> "NULL",
                  "result"   => array(),
              ));
        }
    return $response;
  }

  /* ==================================================================
  *  Vendor & Customer Data Handler
  *  ==================================================================
  */

  // vendor Data
  public function userData($id_data,$firstName,$lastName,$birth,$gender,$phone,$locationImg,$profilePhoto,$id_user){
      $checkData = $this->koneksi->query("SELECT * FROM tbl_userData WHERE id_login='$id_user'");

      if($checkData == false){
        return false;
      }

        if($num_row = $checkData->num_rows > 0){
          // check Apakah Sudah mengisi data diri
              $response = json_encode(array(
                              "message" => "Data Diri Sudah Terisi",
                              "success" => "0",
                          ));
        }else{

          // jika data diri masih kosong maka perintah insert data di eksekusi
          $insert_data = $this->koneksi->query("INSERT INTO tbl_userData VALUES ('$id_data','$firstName','$lastName','$birth','$gender','$phone','$locationImg','$profilePhoto','$id_user')");
          // respone jika sudah Berhasi input data
          $response = json_encode(array(
                        "message" => "Berhasil",
                        "success" => "1"));
        }

        return $response;
  }

  // Vendor Region
  public function regionData($idRegion,$wilayah1,$wilayah2,$wilayah3,$wilayah4,$address,$postalcode,$id_user){
    $checkData = $this->koneksi->query("SELECT * FROM tbl_userRegion WHERE id_login='$id_user'");

    if($checkData == false){
      return false;
    }

      if($num_row = $checkData->num_rows > 0){
        // check Apakah Sudah mengisi data diri
            $response = json_encode(array(
                            "message" => "Data Region Sudah Terisi",
                            "success" => "0"
                        ));
      }else{

        // jika data diri masih kosong maka perintah insert data di eksekusi
        $insert_data = $this->koneksi->query("INSERT INTO tbl_userRegion(`id_userRegion`, `administrative_area_level_1`, `administrative_area_level_2`, `administrative_area_level_3`, `administrative_area_level_4`, `address`, `postalCode`, `id_login`) VALUES ('$idRegion','$wilayah1','$wilayah2','$wilayah3','$wilayah4','$address','$postalcode','$id_user')");
        // respone jika sudah Berhasi input data
        $response = json_encode(array(
                      "message" => "Berhasil",
                      "success" => "1"
                  ));
      }

    return $response;
  }

  /* ==================================================================
  *  Product Handler
  *  ==================================================================
  */

  // Insert Product
  public function productAdd($idProduct,$productTitle,$productCreate,$productUpdate,$productStatus,$idVendor){

      $queryProduct = $this->koneksi->query("SELECT * FROM tbl_product");

      if($queryProduct == false){
        return false;

        if ($num_row = $queryProduct->num_rows > 0) {
              $response = json_encode({
                "message" => "Product Masih Kosong",
                "success" => "0",
              });
        }else{
        $addProduct = $this->koneksi->query("INSERT INTO tbl_product VALUES ('$idProduct','$productTitle','$productCreate','$productUpdate','$productStatus','$idVendor')");
              $response = json_encode({
                "message" => "Product Berhasil Di Tambah",
                "success" => "1",
                "result"  => array(
                  "id_product" => $idProduct
                )
              });
        }
        return $response;
  }

  // Insert Product Detail
  public function productDetail($idDetail,$gender,$type,$weight,$price,$desc,$note,$age,$image,$idProduct){
    $qryProduct = $this->koneksi->query("SELECT * FROM tbl_detailProduct");

      if($qryProduct == false){
        return false;

        if ($num_row = $qryProduct->num_rows > 0) {
              $response = json_encode({
                "message" => "Detail Product Masih Kosong",
                "success" => "0",
              });
        }else{
        $addProduct = $this->koneksi->query("INSERT INTO tbl_detailProduct VALUES ('$idDetail','$gender','$type','$weight','$price','$desc','$note','$age','$image','$idProduct')");
              $response = json_encode({
                "message" => "Detail Product Berhasil Di Tambah",
                "success" => "1"
              });
        }
        return $response;
  }

  // Get Product
  public function getallProduct(){
      return $response;
  }

  // Get Product Order By ID
  public function getProductId($idProduct){
    return $response;
  }


  /* ==================================================================
  *  Transaction Handler
  *  ==================================================================
  */

  // Insert Transaction
  public function addTransaction(){

  }


}
