<?php
require 'config.php';

$sql = $link->query("SELECT * FROM kas");
while ($data = $sql->fetch_assoc()) {
    $jml = $data['jumlah'];
    $total_masuk = $total_masuk + $jml;

    $jml_keluar = $data['keluar'];
    $total_keluar = $total_keluar + $jml_keluar;

    $jml_semua = $total_masuk - $total_keluar;
}

?>

<marquee behavior="" direction="">Selamat Datang di Aplikasi Pengelolaan Kas</marquee>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Halaman Utama</h2>
            <h5>Hallo, Admin </h5>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo "Rp." . number_format($total_masuk); ?>,-</p>
                    <p class="text-muted">Total Kas Masuk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="glyphicon glyphicon-floppy-open"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo "Rp." . number_format($total_keluar); ?>,-</p>
                    <p class="text-muted">Total Keluar</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo "Rp." . number_format($jml_semua); ?>,-</p>
                    <p class="text-muted">Saldo Akhir</p>
                </div>
            </div>
        </div>
    </div>
</div>