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
      -customerRegister(),customerLogin()

        Vendor
      -vendorRegister()
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
    // Query Data Berdasarkan Username
        $check_user = $this->koneksi->query("SELECT * FROM tbl_userLogin WHERE username=$username");
    // Mengecek Apakah Username yang Diinputkan Apakah Sudah terdaftar apa belum
        if($num_row = $check_user->num_rows > 0){
    // Parsing Data Ke Dalam Format JSON --- Start ---
        $response = json_encode(array(
                        "Message" => "Sudah Terdaftar",
                        "Success" => "0",
                        "Result"   => array(),
                    ));
      // Parsing Data Ke Dalam Format JSON --- Finish ---
        }else{
          $insert_data = $this->koneksi->query("INSERT INTO tbl_userLogin VALUES ('$id','$username','$password','$userLevel','$date')");
          $response = json_encode(array(
                        "Message" => "Berhasil Terdaftar",
                        "Success" => "1",
                        "Result"   => array(),
                    ));
        }
   return $response;
  }

  // Customer Login
  public function customerLogin(){

  }

  /* ==================================================================
  *  Vendor Handler
  *  ==================================================================
  */
  public function vendorRegister($id,$username,$password,$userLevel,$date){
    // Query Data Berdasarkan Username
        $check_user = $this->koneksi->query("SELECT * FROM tbl_userLogin WHERE username=$username");
    // Mengecek Apakah Username yang Diinputkan Apakah Sudah terdaftar apa belum
        if($num_row = $check_user->num_rows > 0){
    // Parsing Data Ke Dalam Format JSON --- Start ---
        $response = json_encode(array(
                        "Message" => "Sudah Terdaftar",
                        "Success" => "0",
                        "Result"   => array(),
                    ));
      // Parsing Data Ke Dalam Format JSON --- Finish ---
        }else{
          $insert_data = $this->koneksi->query("INSERT INTO tbl_userLogin VALUES ('$id','$username','$password','$userLevel','$date')");
          $response = json_encode(array(
                        "Message" => "Berhasil Terdaftar",
                        "Success" => "1",
                        "Result"   => array(),
                    ));
        }
   return $response;
  }
}
