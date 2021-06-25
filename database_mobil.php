<?php
session_start();
  $koneksi = mysqli_connect("localhost", "root", "", "penyewaan");

  if (isset($_POST["action"])) {
    $id=$_POST["id_mobil"];
    $nomer=$_POST["nomer_mobil"];
    $merk=$_POST["merk"];
    $jenis=$_POST["jenis"];
    $warna=$_POST["warna"];
    $stok=$_POST["stok"];
    $tb=$_POST["tahun_pembuatan"];
    $sewa=$_POST["biaya_sewa_per_hari"];

    if ($_POST["action"]=="insert") {
      $sql ="insert into mobil values
      ('$id','$nomer','$merk','$jenis','$warna','$stok','$tb','$sewa')";

      if (mysqli_query($koneksi,$sql)) {
        // jika query berhasil
        $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data has been inserted"
        );
      }
      else{
        //jika query gagal
        $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
        );
      }
      header("location:template.php?page=mobil");
    }
    elseif ($_POST["action"]=="update") {
      $sql="update mobil set nomer_mobil='$nomer', merk='$merk', jenis='$jenis', warna='$warna', stok='$stok' , tahun_pembuatan='$tb', biaya_sewa_per_hari='$sewa' 
      where id_mobil='$id'";
      if (mysqli_query($koneksi,$sql)) {
        //buat pesan sukses
        $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data has been updated"
        );
      }
      else{
        //jika query gagal
        $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
        );
      }
 }
 header("location:template.php?page=mobil");
  }

  if (isset($_GET["hapus"])) {
    $id = $_GET["id_mobil"];
    $sql = "select * from mobil where id_mobil='$id'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);

    $sql = "delete from mobil where id_mobil='$id'";
    if (mysqli_query($koneksi,$sql)) {
      // jika query sukses
      $_SESSION["message"] = array(
      "type" => "success",
      "message" => "Data has been deleted"
      );
    }
    else{
      //jika query gagal
      $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=mobil");
  }
 ?>
