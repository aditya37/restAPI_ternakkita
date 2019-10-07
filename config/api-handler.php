<?php
include_once 'db-config.php';
/*
 File Api Handle => file ini berisi function untuk handling query data dari database dan di tampilkan dengan format JSON
 Note     :
    1. Jangan lupa tulis kapan terakhir anda mendevelop api dan masukan nama function yang terakhir anda coding
    2. Jangan lupa setelah develope atau ngoding update task/progress ke trello kerja Rodi
    3. Jika Developing atau ngoding selesai langsung di upload ke Github

*/
class apihandler extends database{

  public function __construct(){
    parent::__construct();
  }

  /* ==================================================================
  *  Vendor Handler
  *  ==================================================================
  */
  // Vendor Register [OK]
  public function vendorRegister($id,$username,$password,$date){
    // Query Data Berdasarkan username
        $check_user = $this->koneksi->query("SELECT * FROM tbl_vendor WHERE username='$username'");
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
          $insert_data = $this->koneksi->query("INSERT INTO tbl_vendor VALUES ('$id','$username','$password','$date')");
          $response = json_encode(array(
                        "message" => "Berhasil Terdaftar",
                        "success" => "1",
                        "result"  => array(
                          "idVendor" => $id,
                        ),
                    ));
        }
   return $response;
  }

  // Vendor Login [OK]
  public function vendorLogin($username,$password){

    $result = $this->koneksi->query("SELECT * FROM tbl_vendor WHERE username='$username' AND password='$password'");

    if($result == false){
        return false;
    }
        if ($num_row = $result->num_rows > 0) {

            $data = $result->fetch_array();

              $resultData = array(
                "idCustomer" => $data['idVendor'],
                "username"   => $data['username']);

              $response = json_encode(
                  array(
                      "message"  => "Login Berhasil",
                      "success"  => "1",
                      "result"   => $resultData,
                  ));
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
  // Vendor Data [OK]
  public function vendorData($id_data,$firstName,$lastName,$birth,$gender,$phone,$locationImg,$profilePhoto,$id_user){
      $checkData = $this->koneksi->query("SELECT * FROM tbl_vendorData WHERE idVendor='$id_user'");

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
          $insert_data = $this->koneksi->query("INSERT INTO tbl_vendorData VALUES ('$id_data','$firstName','$lastName','$birth','$gender','$phone','$locationImg','$profilePhoto','$id_user')");
          // respone jika sudah Berhasi input data
          $response = json_encode(array(
                        "message" => "Berhasil",
                        "success" => "1"));
        }

        return $response;
  }

  // Vendor Region [OK]
  public function vendorRegion($idRegion,$wilayah1,$wilayah2,$wilayah3,$wilayah4,$address,$postalcode,$id_user){
    $checkData = $this->koneksi->query("SELECT * FROM tbl_vendorRegion WHERE idVendor='$id_user'");

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
        $insert_data = $this->koneksi->query("INSERT INTO tbl_vendorRegion VALUES ('$idRegion','$wilayah1','$wilayah2','$wilayah3','$wilayah4','$address','$postalcode','$id_user')");
        // respone jika sudah Berhasi input data
        $response = json_encode(array(
                      "message" => "Berhasil",
                      "success" => "1"
                  ));
      }

    return $response;
  }

  /* ==================================================================
    Customer Data Handler
  *  ==================================================================
  */
  // Customer Register [OK]
  public function customerRegister($id,$username,$password,$date){
    // Query Data Berdasarkan username
        $check_user = $this->koneksi->query("SELECT * FROM tbl_customer WHERE username='$username'");
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
          $insert_data = $this->koneksi->query("INSERT INTO tbl_customer VALUES ('$id','$username','$password','$date')");
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

  // Customer Login [OK]
  public function customerLogin($username,$password){

    $result = $this->koneksi->query("SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'");

    if($result == false){
        return false;
    }
        if ($num_row = $result->num_rows > 0) {

            $data = $result->fetch_array();


              $resultData = array(
                "idCustomer" => $data['idCustomer'],
                "username"   => $data['username'],
              );

              $response = json_encode(
                  array(
                      "message"  => "Login Berhasil",
                      "success"  => "1",
                      "result"   => $resultData,
                  ));

        }else{
          $response = json_encode(
              array(
                  "message" => "username Belum Terdaftar",
                  "success" => "0",
                  "result"   => array(),
              ));
        }
    return $response;
  }
  // customer Data [OK]
  public function customerData($id_data,$firstName,$lastName,$birth,$gender,$phone,$locationImg,$profilePhoto,$id_user){
      $checkData = $this->koneksi->query("SELECT * FROM tbl_customerData WHERE idCustomer='$id_user'");

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
          $insert_data = $this->koneksi->query("INSERT INTO tbl_customerData VALUES ('$id_data','$firstName','$lastName','$birth','$gender','$phone','$locationImg','$profilePhoto','$id_user')");
          // respone jika sudah Berhasi input data
          $response = json_encode(array(
                        "message" => "Berhasil",
                        "success" => "1"));
        }

        return $response;
  }

  // customer Region [OK]
  public function customerRegion($idRegion,$wilayah1,$wilayah2,$wilayah3,$wilayah4,$address,$postalcode,$id_user){
    $checkData = $this->koneksi->query("SELECT * FROM tbl_customerRegion WHERE idCustomer='$id_user'");

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
        $insert_data = $this->koneksi->query("INSERT INTO tbl_customerRegion(`id_userRegion`, `administrative_area_level_1`, `administrative_area_level_2`, `administrative_area_level_3`, `administrative_area_level_4`, `address`, `postalCode`, `idCustomer`) VALUES ('$idRegion','$wilayah1','$wilayah2','$wilayah3','$wilayah4','$address','$postalcode','$id_user')");
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

  // Get Product
  public function getallProduct(){
    $queryProduct = $this->koneksi->query("SELECT
                tbl_product.idProduct,
                tbl_product.productTittle,
                tbl_userData.firstName,
                tbl_product.productStatus,
                tbl_userRegion.administrative_area_level_1,
                tbl_detailProduct.price,
                tbl_detailProduct.image
                FROM tbl_product
                INNER JOIN tbl_detailProduct USING (idProduct)
                INNER JOIN tbl_userData USING (id_login)
                INNER JOIN tbl_userRegion USING (id_login)
                INNER JOIN tbl_userLogin USING (id_login) WHERE tbl_product.productStatus='Available'");

      if($queryProduct == false){
        return false;
      }
          if ($num_row = $queryProduct->num_rows > 0) {
              $productCount = $this->koneksi->query("SELECT COUNT(idProduct) AS jumlah_product FROM tbl_product");
              $count        = $productCount->fetch_array();
            $response = array(
              "success" => "1",
              "message" => "Berhasil",
              "jumlah_product" => $count['jumlah_product'],
              "produk"  => array(
              ));

            while($data = $queryProduct->fetch_array()){
              $h['idProduct'] = $data['idProduct'];
              $h['judul'] = $data['productTittle'];
              $h['harga'] = $data['price'];
              $h['provinsi'] = $data['administrative_area_level_1'];
              $h['peternak'] = $data['firstName'];
              $h['thumbnail'] = $data['image'];
              array_push($response['produk'],$h);
            }
          }else{
            $response = json_encode(array(
              "success" => "0",
              "message" => "Produk Masih Kosong"
            ));
          }
      return json_encode($response);
  }

  // insert Product
  public function addProduct($idProduct,$judul,$dateCreate,$dateUpdate,$status,$idVendor){
    $query = $this->koneksi->query("SELECT * FROM tbl_product WHERE productTittle='$judul'");

    if($query == false){
      return false;
    }
      if($row = $query->num_rows > 0){
        $response = json_encode(array(
          "message" => "Judul Sudah Ada",
          "success" => "0",
        ));
      }else{
        $add = $this->koneksi->query("INSERT INTO tbl_product VALUES ('$idProduct','$judul','$dateCreate','$dateUpdate','$status','$idVendor')");
        $response = json_encode(array(
          "message" => "Tambah Produk Berhasil",
          "success" => "1",
          "produk"  => array("idProduct" => $idProduct),
        ));
      }
      return $response;
  }
  // insert Product detail
  public function addProductDetail($id_detailP,$gender,$type,$weight,$price,$description,$note,$age,$image,$idProduct){

      $query = $this->koneksi->query("SELECT idProduct FROM tbl_product WHERE idProduct='$idProduct'");

      if($query == false){
        return false;
      }

      if($row = $query->num_rows > 0){
        $add = $this->koneksi->query("INSERT INTO tbl_detailProduct VALUES ('$id_detailP',
          '$gender',
          '$type',
          '$weight',
          '$price',
          '$description',
          '$note',
          '$age',
          '$image',
          '$idProduct')");

        $response = json_encode(array(
          "message" => "Berhasil",
          "success" => "1",
        ))
        ;
      }else{
        $response = json_encode(array(
          "message" => "Id Produk Tidak Diketahui",
          "success" => "0",
          "produk"  => array(),
        ));
      }
    return $response;
  }

  /*get Product by ID
  * function ini berfungsi untuk detail product
  */
  public function getProduct($idProduct){

    $queryProduct = $this->koneksi->query("SELECT
              tbl_product.idProduct,
          		tbl_product.productTittle,
          		tbl_userData.firstName,
              tbl_userData.lastName,
              tbl_userLogin.id_login,
              tbl_userData.profilePhoto,
          		tbl_userRegion.administrative_area_level_1,
              tbl_userRegion.address,
          		tbl_detailProduct.price,
          		tbl_detailProduct.image,
              tbl_detailProduct.weight,
              tbl_detailProduct.gender,
              tbl_detailProduct.age,
              tbl_detailProduct.description,
              tbl_detailProduct.note
              FROM tbl_product
              INNER JOIN tbl_detailProduct USING (idProduct)
              INNER JOIN tbl_userData USING (id_login)
              INNER JOIN tbl_userRegion USING (id_login)
              INNER JOIN tbl_userLogin USING (id_login) WHERE tbl_product.idProduct = '$idProduct'");

      if($queryProduct == false){
        return false;
      }
          if ($num_row = $queryProduct->num_rows > 0) {

            $response = array(
              "success" => "1",
              "message" => "Berhasil",
              "produk"  => array(
                "detail_produk" => array(),
                "vendor"        => array(),
              ));

            while($data = $queryProduct->fetch_array()){
              $produk['idProduct']   = $data['idProduct'];
              $produk['judulProduk'] = $data['productTittle'];
              $produk['harga']       = $data['price'];
              $produk['thumbnail']   = $data['image'];
              $produk['bobot']       = $data['weight'];
              $produk['umur']        = $data['age'];
              $produk['jenisKelamin']= $data['gender'];
              $produk['deskripsi']   = $data['description'];
              $produk['catatan']     = $data['note'];
              array_push($response['produk']['detail_produk'],$produk);
              // vendor area
              $vendor['idLogin']     = $data['id_login'];
              $vendor['firstName']   = $data['firstName'];
              $vendor['lastName']    = $data['lastName'];
              $vendor['imgProfile']  = $data['profilePhoto'];
              $vendor['alamat']      = $data['address'];
              array_push($response['produk']['vendor'],$vendor);
            }

          }else{
            $response = array(
              "success" => "0",
              "message" => "Produk Masih Kosong"
            );
          }
      return json_encode($response);
  }
  // Delete Product
  public function deleteProduct(){}
  // update product
  public function productUpdate(){}
  /* ==================================================================
  *  Transaction Handler
  *  ==================================================================
  */

  // Insert Transaction
  public function addTransaction(){

  }

}
