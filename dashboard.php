<?php
require_once 'model.php';

$gudangModel = new GudangModel();
    
if (isset($_POST["smbt"])){
    if ($_POST["smbt"] == 1) {
        echo $gudangModel->create( $_POST["kopi"],  $_POST["jumlah"], 0, date('Y-m-d'));
    }else{
        echo $gudangModel->create( $_POST["kopi"], 0,  $_POST["jumlah"], date('Y-m-d'));
    }
    

}
if (isset($_POST["DEL"])){
    echo $gudangModel->delete($_POST["DEL"]);
}
if (isset($_POST["EDIT"])){
    $jenis = $_POST["JenisKopi"];
    $Id = $_POST["ID"];
    if (isset($_POST["barangMasuk"])) {
        $Masuk = $_POST["barangMasuk"];
    } else{
        $Masuk = 0;
    }
    if (isset($Keluar)) {
        $Keluar = $_POST["barangKeluar"];
    } else{
        $Keluar = 0;
    }
    echo $resultUpdate = $gudangModel->update($Id, $jenis, $Masuk, $Keluar, "2024-04-28");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="tampil.css">
    <style>
       
    </style>
</head>
<body>
    <?php include("side.php"); ?>
    <div id = "cont1" class="container">
        <center><br><h1>Grafik Data</h1></center>
        
        <div class="img"><img src="grafik.png" alt=""></div>
        <div class="konten">
            <div class="box">
                <div class="box2">Arabika</div>
                <img src="grafik.png" alt="">
            </div>
            <div class="box">
                <div class="box2">Arabika</div>
                <img src="grafik.png" alt="">
            </div>
        </div>
        <div class="konten">
            <div class="box">
                <div class="box2">Arabika</div>
                <img src="grafik.png" alt="">
            </div>
            <div class="box">
                <div class="box2">Arabika</div>
                <img src="grafik.png" alt="">
            </div>
        </div>
    </div>
    
</body>
</html>