<?php 
session_start(); 

?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sewa Mobil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/pooper.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>

</head>
<body>
    <a herf="#" class="text-white">
    <h4>Rental Mobil</h4>
     <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Sewa Mobil</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="nav-item"><a href="template.php?page=pelanggan" class="nav-link">Pelanggan</a></li>
                <li class="nav-item"><a href="template.php?page=mobil" class="nav-link">Mobil</a></li>
                <li class="nav-item"><a href="template.php?page=karyawan" class="nav-link">Karyawan</a></li>
                <li class="nav-item"><a href="template.php?page=peminjaman" class="nav-link">Peminjaman</a></li>
                <li class="nav-item"><a href="template.php?page=pengembalian" class="nav-link">Pengembalian</a></li>
                <li class="nav-item"><a href="template.php?page=laporan" class="nav-link">Laporan</a></li>
                <li class="nav-item"><a href="logout.php?logout=true" class="nav-link">Logout</a></li>
            </ul>
        </nav> 

        <div id="content">
            <?php if (isset($_GET["page"])): ?>
                <?php if((@include $_GET["page"].".php") === TRUE): ?>
                    <?php include $_GET["page"].".php"; ?>
                <?php endif;?>
            <?php endif;?>
        </div>
    </div>
</body>
</html>