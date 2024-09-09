<?php
    include '../../utils/connect.php';

    $hidden = '';
    $nik = '';
    $nama = '';
    $tempat = '';
    $tanggal = '';
    $status = '';
    $keterangan = '';

    if (isset($_POST['submit'])) {
        $input = $_POST['search-input'];
        $query = mysqli_query($conn, "SELECT * FROM db_calonsiswa WHERE nik = $input");

        if($row = mysqli_fetch_array($query)){
            $hidden = 'display:;';
            $nik = $row['nik'];
            $nama = $row['nama_calon'];
            $tempat = $row['tempat_lahir'];
            $tanggal = $row['tanggal_lahir'];
            $status = $row['statuses'];
            $keterangan = $row['keterangan'];
        }else{
            echo 'data not exist';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/datacheck-style/style.css">
    <title>DATA CHECK | SMP NEGERI 22 MALUKU TENGAH</title>
</head>
<body>
<div class="navbar">
        <a href="../home">
            <img src="../../assets/images/kemiri_logo.png" alt="kemiri-logo" height="60">
        </a>
        <span class="navbar-container">
            <div class="navbar-title-container">
                <div class="navbar-title">PPDB</div>
                <div class="navbar-subtitle">SMP NEGERI 22 MALUKU TENGAH</div>
            </div>
            <span class="navbar-items">
                <a href="../home" class="active">HOME</a>
                <a href="../pendaftaran/" class="active">Daftarkan calon siswa</a>
                <a href="../pendaftaran/tatacara.php" class="active">Tatacara Pendaftaran</a>
            </span>
        </span>
    </div>
    <div class="content-container">
        <div class="content-title">Cari data calon peserta didik</div>
        <div class="content-subtitle">cari hasil validasi data calon peserta didik<br>dengan memasukkan NIK yang digunakan untuk mendaftar sebelumnya</div>
        <div class="search-container">
            <form action="" method="post">
                <input type="number" name="search-input" id="" placeholder="Masukkan NIK calon Siswa"> <input name="submit" type="submit" value="🔎">
            </form>
        </div>
        <div class="show-data-container">
            <div class="show-card" style="<?=$status == 'proses' ? 'border: 1px solid #ff8000;' : ($status == 'valid' ? 'border: 1px solid green;' : 'border: 1px solid red;')?> <?= $hidden != '' ? $hidden : 'display:none;' ?>">
                <div class="left-data">
                    NIK<p>
                    Nama Lengkap<p>
                    Tanggal Lahir<p>
                    Status<p>
                    <?=$keterangan != '' ? 'Keterangan' : '' ?>
                </div>
                <div class="right-data">
                    : <strong><?= $nik ?></strong><p>
                    : <?= $nama ?><p>
                    : <?= $tempat ?>, <?= $tanggal ?><p>
                    : 
                    <?php if($status == 'proses') { ?>
                        <span class="status">data sedang diproses</span><p>
                    <?php } else if($status == 'valid') { ?>
                        <span class="status valid">data anda valid</span>&nbsp;<a href="http://localhost/ppdb-kemiri/services/print_service.php?nik=<?=$nik?>"><button>Cetak Bukti Daftar</button></a><p>
                    <?php } else { ?>
                        <span class="status not-valid">data tidak valid</span><p>
                    <?php } ?>
                    <?=$keterangan != '' ?': '.$keterangan : ''?>
                </div>
            </div>
        </div>
        <div class="warning-word">
            Terimakasih sudah mendaftarkan calon peserta didik, data sedang diproses<br>mohon ditunggu dalam 2x24 jam dan kembali cek di halaman ini kembali
        </div>
    </div>
    <div class="footer">
        copyright © 2024 SMP NEGERI 22 MALUKU TENGAH
    </div>
</body>
</html>