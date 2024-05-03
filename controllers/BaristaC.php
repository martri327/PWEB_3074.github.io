<?php
require_once "models/BaristaModel.php";
require_once "function/function.php";

class BaristaC{
  
  public function index(){
    $data = BaristaModel::read();
    loadView('dashboard', $data);
  }

  public function formcreate(){
    loadView('createporto');
  }

  public function create(){
    global $url;
    $data = BaristaModel::create($_POST["jenisKopi"],$_POST["barangMasuk"],$_POST["barangKeluar"],$_POST["tanggal"]);
    header("Location:".$url."/Barista");
  }

  public function read($sql){
    global $koneksi;
    
    $sql = "SELECT * FROM gudang";
    $result = $koneksi->query($sql);
    
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

  // public function formupdate($id){
  //   // die($id);
  //   $data = BaristaModel::detail($id);
  //   loadView('update', $data);
  // }

  public function update($id){
    global $url;
    $data = BaristaModel::update($id,$_POST["JenisKopi"],$_POST["BarangMasuk"],$_POST["BarangKeluar"],$_POST["Tanggal"]);
    header("Location:".$url."/portofolio");
  }

  public function delete($id){
    global $url;
    $data = BaristaModel::delete($id);
    header("Location:".$url."/portofolio");
  }
}
