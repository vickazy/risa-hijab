<?php
  include_once 'koneksi.php';
  session_start();

  $namadpn = $_POST['namadepan'];
  $namablkg = $_POST['namabelakang'];
  $nohp = $_POST['nohp'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "INSERT INTO pelanggan values (seq_idPelanggan.nextval, '$namadpn', '$namablkg', '$email', '$password', '$nohp')";
  $hasil = oci_parse($koneksi, $query);
  oci_execute($hasil);

  $cek = "SELECT MAX(IDPELANGGAN) AS MAX FROM pelanggan";
  $cekData = oci_parse($koneksi, $cek);
  oci_execute($cekData);
  $hasil = oci_fetch_assoc($cekData);
  $_SESSION['pelanggan'] = $hasil['MAX'];
  header("location:index.php");
?>
