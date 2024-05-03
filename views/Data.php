<?php
require_once 'BaristaModel.php';

$gudangModel = new BaristaModel();
    
if (isset($_POST["smbt"])){
    if ($_POST["smbt"] == 1) {
        echo $gudangModel->create( $_POST["kopi"],  $_POST["jumlah"], 0, date('Y-m-d'));
    }else{
        echo $gudangModel->create( $_POST["kopi"], 0,  $_POST["jumlah"], date('Y-m-d'));
    }
    header("Location: data.php"); // Ganti dengan nama file halaman utama Anda
    exit();
    

}
if (isset($_POST["DEL"])){
    echo $gudangModel->delete($_POST["DEL"]);
    header("Location: data.php"); // Ganti dengan nama file halaman utama Anda
    exit();
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
    header("Location: data.php"); // Ganti dengan nama file halaman utama Anda
    exit();
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
    <div id = "cont2" class="container">
        <center><br><h1>Data</h1><br>
        <div class="boxx">
            <div class="btn-create">
                <button id="showOptions">Tambah Data</button>
                <div class="hide" id="options">
                    <button type="submit" name="BM" value="BM" onclick="selectOption(1)">Barang Masuk</button>
                    <button type="submit" name="BK" value="BK" onclick="selectOption(2)">Barang Keluar</button>
                </div><br>
            </div>
        </div>

        <form id="form-create" class="hide" action="" method="post">
            <h2>Tambah Data</h2>
            <label for="kopi">Jenis Kopi:</label>
            <select name="kopi" id="kopi">
                <option value="kopi1">Kopi 1</option>
                <option value="kopi2">Kopi 2</option>
                <option value="kopi3">Kopi 3</option>
                <option value="kopi4">Kopi 4</option>
            </select><br><br>
        
            <label for="jumlah">Jumlah (Kg):</label>
            <input type="number" id="jumlah" name="jumlah" min="1"><br><br>
        
            <button type="submit" id="smbt" name="smbt">TAMBAH</button>
            <button type="button" onclick="cancelsmbt()">Cancel</button>
            
            <!-- <input type="submit" value="Submit" id="smbt" name="smbt"> -->
        </form>

        <form id="delForm" style="display: none;" method="post" >
            <h2>Hapus Data</h2>
            <input type="text" id="HAPUS" name="HAPUS" style="display: none;">

            <label for="dJenisKopi">Jenis Kopi:</label>
            <input type="text" id="dJenisKopi" name="dJenisKopi"><br><br>

            <label for="dbarangMasuk">Barang Masuk:</label>
            <input type="text" id="dbarangMasuk" name="dbarangMasuk"><br><br>
            
            <label for="dbarangKeluar">Barang Keluar:</label>
            <input type="text" id="dbarangKeluar" name="dbarangKeluar"><br><br>
            
            <label for="dTanggal">Tanggal:</label>
            <input type="date" id="dTanggal" name="dTanggal"><br><br>

            <button type="submit" id="DEL" name="DEL" style="background-color:red; color:white;">DELETE</button>
            <button type="button" onclick="cancelDel()">Cancel</button>
        </form>

        <form id="editForm" style="display: none;" method="post" >
            <h2>Edit Data</h2>
            <input type="text" id="ID" name="ID" style="display: none;">

            <label for="JenisKopi">Jenis Kopi:</label>
            <input type="text" id="JenisKopi" name="JenisKopi"><br><br>

            <label for="barangMasuk">Barang Masuk:</label>
            <input type="text" id="barangMasuk" name="barangMasuk"><br><br>
            
            <label for="barangKeluar">Barang Keluar:</label>
            <input type="text" id="barangKeluar" name="barangKeluar"><br><br>
            
            <label for="Tanggal">Tanggal:</label>
            <input type="date" id="Tanggal" name="Tanggal"><br><br>

            <input type="hidden" id="editedRowIndex">
            <input type="submit" value="Submit" name ="EDIT">
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>
        
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>Jenis Kopi</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($gudangModel->read() as $data){
                if ($data["BarangMasuk"] == 0) {
                    $data["BarangMasuk"] = "-";
                } 
                if ($data["BarangKeluar"] == 0) {
                    $data["BarangKeluar"] = "-";
                } 
                echo '<tr>';
                    echo '<td>'. $data["JenisKopi"] .'</td>';
                    echo '<td>'. $data["BarangMasuk"] .'</td>';
                    echo '<td>'. $data["BarangKeluar"] .'</td>';
                    echo '<td>'. $data["Tanggal"] .'</td>';
                    echo '<td style="display: none;">'. $data["Id"] .'</td>';
                    echo '<td>';
                        echo '<button class="btn-edit" onclick="editRow(this)">Edit</button>';
                        echo '<button class="btn-del" onclick="deleteRow(this)">Delete</button>';
                    echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

        <br><br>
        
        </center>

        <br><br>
    </div>



    <script>
        const showOptionsButton = document.getElementById('showOptions');
        const optionsDiv = document.getElementById('options');
        const submitt = document.getElementById('smbt');
        
        showOptionsButton.addEventListener('click', function() {
            optionsDiv.classList.remove("hide");
            document.getElementById("delForm").style.display = "none";
            document.getElementById("editForm").style.display = "none";
        });
        submitt.addEventListener('click', function() {
            showOptionsButton.classList.remove("hide");
            document.getElementById("form-create").classList.add("hide");
        });
        
        function selectOption(option) {
            document.getElementById("smbt").value = option;
            showOptionsButton.classList.add("hide");
            optionsDiv.classList.add("hide");
            document.getElementById("form-create").classList.remove("hide");
            //alert('You selected Option ' + option); 
        }
        function cancelsmbt() {
            // Sembunyikan formulir creat
            showOptionsButton.classList.remove("hide");
            document.getElementById("form-create").classList.add("hide");
        }



        function deleteRow(button) {
            document.getElementById("barangMasuk").disabled = false;
            document.getElementById("barangKeluar").disabled = false;
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");

            // Ambil nilai dari kolom Barang Masuk dan Barang Keluar
            var JenisKopi = cells[0].innerText;
            var barangMasuk = cells[1].innerText;
            var barangKeluar = cells[2].innerText;
            var Tanggal = cells[3].innerText;
            var ID = cells[4].innerText;
            
            document.getElementById("dJenisKopi").disabled = true;
            document.getElementById("dbarangMasuk").disabled = true;
            document.getElementById("dbarangKeluar").disabled = true;
            document.getElementById("dTanggal").disabled = true;
            document.getElementById("HAPUS").disabled = true;
            
            document.getElementById("dJenisKopi").value = JenisKopi;
            document.getElementById("dbarangMasuk").value = barangMasuk;
            document.getElementById("dbarangKeluar").value = barangKeluar;
            document.getElementById("dTanggal").value = Tanggal;
            document.getElementById("DEL").value = ID;
            
            document.getElementById("form-create").classList.add("hide");
            showOptionsButton.classList.remove("hide");
            optionsDiv.classList.add("hide");
            document.getElementById("delForm").style.display = "block";
            document.getElementById("editForm").style.display = "none";
        }
        function cancelDel() {
            // Sembunyikan formulir edit
            document.getElementById("delForm").style.display = "none";
        }

        function editRow(button) {
            document.getElementById("barangMasuk").disabled = false;
            document.getElementById("barangKeluar").disabled = false;
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");

            // Ambil nilai dari kolom Barang Masuk dan Barang Keluar
            var JenisKopi = cells[0].innerText;
            var barangMasuk = cells[1].innerText;
            var barangKeluar = cells[2].innerText;
            var Tanggal = cells[3].innerText;
            var ID = cells[4].innerText;

            // Isi nilai ke dalam formulir edit
            if (barangMasuk === "-") {
                document.getElementById("barangMasuk").disabled = true;
            } 
            if (barangKeluar === "-") {
                document.getElementById("barangKeluar").disabled = true;
            } 
            document.getElementById("JenisKopi").value = JenisKopi;
            document.getElementById("barangMasuk").value = barangMasuk;
            document.getElementById("barangKeluar").value = barangKeluar;
            document.getElementById("Tanggal").value = Tanggal;
            document.getElementById("ID").value = ID;

            // Simpan indeks baris yang diedit
            document.getElementById("editedRowIndex").value = row.rowIndex;

            // Tampilkan formulir edit
            document.getElementById("form-create").classList.add("hide");
            showOptionsButton.classList.remove("hide");
            optionsDiv.classList.add("hide");
            document.getElementById("delForm").style.display = "none";
            document.getElementById("editForm").style.display = "block";
        }

        function cancelEdit() {
            // Sembunyikan formulir edit
            document.getElementById("editForm").style.display = "none";
        }
    </script>
</body>
</html>