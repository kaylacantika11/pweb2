<?php
class Transaksi {
    private $koneksi;
    public function __construct() {
        $this->koneksi = mysqli_connect("localhost", "root", "", "uas_penjualan2");
        if (mysqli_connect_errno()) {
            die("Gagal koneksi: " . mysqli_connect_error());
        }
    }
    public function edit($id) {
        $query = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
        $result = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_assoc($result);
    }
    public function update($id, $barang, $harga, $jumlah, $total, $gambar) {
        $query = "UPDATE transaksi SET 
                  nama_barang = '$barang', 
                  harga = '$harga', 
                  jumlah = '$jumlah', 
                  total = '$total',
                  gambar = '$gambar' 
                  WHERE id_transaksi = '$id'";
        return mysqli_query($this->koneksi, $query);
    }
    public function tampilkanData($cari = '') {
    if ($cari != '') {
        $query = "SELECT * FROM transaksi WHERE nama_barang LIKE '%$cari%' ORDER BY id_transaksi DESC";
    } else {
        $query = "SELECT * FROM transaksi ORDER BY id_transaksi DESC";
    }
    $result = mysqli_query($this->koneksi, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
    }
}
?>