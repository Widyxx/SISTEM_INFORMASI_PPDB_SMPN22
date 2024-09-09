<?php
    include '../../utils/connect.php';

    session_start();
    if(empty($_SESSION)){
        header('location:../admin');
    }

    $Total = mysqli_query($conn, "SELECT * FROM db_calonsiswa");
    $Proses = mysqli_query($conn, "SELECT * FROM db_calonsiswa WHERE statuses = 'proses'");
    $Valid = mysqli_query($conn, "SELECT * FROM db_calonsiswa WHERE statuses = 'valid'");
    $T = mysqli_num_rows($Total);
    $P = mysqli_num_rows($Proses);
    $V = mysqli_num_rows($Valid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admindashboard-style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>ADMIN DASHBOARD| PPDB SMP NEGERI 22 MALUKU TENGAH</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../../assets/images/kemiri_logo.png" alt="kemiri-logo" height="45">
        </div>
        <div class="sidebar-items-container">
             <a href="">
                <div class="items active">
                    <span class="material-symbols-outlined" style="font-size:25pt;">folder_open</span>
                </div>
            </a>
            <a href="../../utils/logout.php">
                <div class="items logout">
                    <span class="material-symbols-outlined" style="font-size:25pt;">power_settings_new</span>
                </div>
            </a>
        </div>
    </div>
    <div class="content-container">
        <div class="content-left">
            <div class="welcome-card">
                <div class="welcome-title">Selamat Datang, Petugas <?= $_SESSION['name'] ?></div>
                <div class="welcome-subtitle">Selamat bertugas, silahkan lihat data pendaftar di bawah ini</div>
            </div>
            <div class="total-container">
                <div class="total-card">
                    <div class="avatar">
                        <span class="material-symbols-outlined">account_circle</span>
                    </div>
                    <div class="total-header">
                        <div class="total-title"><?= $T ?></div>
                        <div class="total-subtitle">Total Pendaftar Calon Siswa</div>
                    </div>
                </div>
                <div class="total-card">
                    <div class="avatar">
                        <span class="material-symbols-outlined">account_circle</span>
                    </div>
                    <div class="total-header">
                        <div class="total-title"><?= $P ?></div>
                        <div class="total-subtitle">Data yang belum divalidasi</div>
                    </div>
                </div>
                <div class="total-card">
                    <div class="avatar">
                        <span class="material-symbols-outlined">account_circle</span>
                    </div>
                    <div class="total-header">
                        <div class="total-title"><?= $V ?></div>
                        <div class="total-subtitle">Data yang sudah tervalidasi</div>
                    </div>
                </div>
            </div>
            <div class="list-container">
                <div class="list-header-container">
                    <div class="list-title">DATA PENDAFTARAN CALON PESERTA DIDIK</div>
                </div>
                <div class="tabel-container">
                    <table border="0">
                        <tr>
                            <td>No</td>
                            <td>Tanggal daftar</td>
                            <td>NIK</td>
                            <td>Nama siswa</td>
                            <td>Status validasi</td>
                            <td>Keterangan</td>
                            <td>Pengaturan</td>
                        </tr>
                        <?php
                            $i = 1;
                            $query = mysqli_query($conn, "SELECT * FROM db_calonsiswa ORDER BY tgl_daftar DESC ");
                            while($row = mysqli_fetch_array($query)) :
                        ?>
                            <tr style="background-color: #957ac5;">
                                <td><?= $i++ ?></td>
                                <td><?= $row['tgl_daftar'] ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama_calon'] ?></td>
                                <?php if($row['statuses'] == 'proses') { ?>
                                    <td><span class="statuses">belum di proses</span></td>
                                <?php } else if($row['statuses'] == 'valid') { ?>
                                    <td><span class="statuses valid">data valid</span></td>
                                <?php } else { ?>
                                    <td><span class="statuses not-valid">data tidak valid</span></td>
                                <?php } ?>
                                <td><div class="keterangan"><?= $row['keterangan'] ?></div></td>
                                <td style="display:flex; justify-content: space-around;">
                                    <a href="edit.php?id=<?=$row['nik']?>"><span class="material-symbols-outlined">draw</span></a>
                                    <a href="print.php?id=<?=$row['nik']?>"><span class="material-symbols-outlined">print</span></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="content-right">
            <div class="right-header">
                <div class="right-title">Profile Kamu</div>
                <div class="setting-btn"><span class="material-symbols-outlined">settings</span></div>
            </div>
            <div class="profile-pict-container">
                <div class="profile-pict" style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/2/2f/No-photo-m.png);"></div>
            </div>
            <div class="username-container">
                <div class="user-name"><?= $_SESSION['name'] ?></div>
            </div>
            <div class="edit-profile-btn">
                <button>Edit Profile Kamu</button>
            </div>
            <div class="detail-container">
                <div class="detail-title">NIK</div>
                <div class="detail">
                    <span class="material-symbols-outlined">pin</span>
                    <div class="detail-title">181011450XXX</div>
                </div>
            </div>
            <div class="detail-container">
                <div class="detail-title">Nomor Pegawai</div>
                <div class="detail">
                    <span class="material-symbols-outlined">pin</span>
                    <div class="detail-title">181011450XXX</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>