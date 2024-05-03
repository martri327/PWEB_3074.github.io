<?php

require_once 'koneksi.php'; // Memasukkan file koneksi.php

class BaristaModel {
    
    // Metode untuk membuat entri baru dalam tabel gudang
    public function create($jenisKopi, $barangMasuk, $barangKeluar, $tanggal) {
        global $koneksi;
        
        $sql = "INSERT INTO gudang (JenisKopi, BarangMasuk, BarangKeluar, Tanggal) VALUES ('$jenisKopi', '$barangMasuk', '$barangKeluar', '$tanggal')";
        
        if ($koneksi->query($sql) === TRUE) {
            return "<script>alert('Data berhasil ditambahkan')</script>";
        } else {
            return "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
    
    // Metode untuk membaca entri dari tabel gudang
    public function read() {
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
    
    // Metode untuk memperbarui entri dalam tabel gudang berdasarkan ID
    public function update($id, $jenisKopi, $barangMasuk, $barangKeluar, $tanggal) {
        global $koneksi;
        
        $sql = "UPDATE gudang SET JenisKopi='$jenisKopi', BarangMasuk='$barangMasuk', BarangKeluar='$barangKeluar', Tanggal='$tanggal' WHERE id=$id";
        
        if ($koneksi->query($sql) === TRUE) {
            return "<script>alert('Data berhasil diperbarui')</script>";
        } else {
            return "Error updating record: " . $koneksi->error;
        }
    }
    
    // Metode untuk menghapus entri dari tabel gudang berdasarkan ID
    public function delete($id) {
        global $koneksi;
        
        $sql = "DELETE FROM gudang WHERE id=$id";
        
        if ($koneksi->query($sql) === TRUE) {
            return "<script>alert('Data berhasil dihapus')</script>";
        } else {
            return "Error deleting record: " . $koneksi->error;
        }
    }
}

?>
