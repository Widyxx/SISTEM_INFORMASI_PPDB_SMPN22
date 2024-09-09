<?php 
    include '../utils/connect.php';

    date_default_timezone_set('Asia/Jakarta');
    $id = $_GET['id'];
    $queryCalon = mysqli_query($conn, "SELECT * FROM db_calonsiswa WHERE nik = $id");
    $queryIbu = mysqli_query($conn, "SELECT * FROM db_ibu WHERE nik_siswa = $id");
    $ibu = mysqli_fetch_array($queryIbu);
    $row = mysqli_fetch_array($queryCalon);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/print-style/style.css">
    <title>CETAK PDF | PPDB SMP NEGERI 22 MALUKU TENGAH</title>
</head>
<body>
    <div class="content-pdf">
        <center>
            <table>
                <tr>
                    <td><img src="../assets/images/kemiri_logo.png" alt="" height="80"></td>
                    <td>
                        <table>
                            <tr>
                                <td><strong>SMP NEGERI 22 MALUKU TENGAH</strong></td>
                            </tr>
                            <tr>
                                <td>JJln Pasaloha, Desa Laimu, Kec. Telutih, Kab. Maluku Tengah, Prov. Maluku</td>
                            </tr>
                            <tr>
                                <td>print of PPDB SMP NEGERI 22 MALUKU TENGAH - smpn22malteng@gmail.com</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </center>
        <hr>
        <center>
            <table>
                <tr>
                    <td><h2><center>DATA PENDAFTARAN PPDB ONLINE</center></h2></td>
                </tr>
            </table>
        </center>
        <div class="data-siswa">
            <table>
                <tr>
                    <td width="100">Nama</td>
                    <td width="5">:</td>
                    <td><?= $row['nama_calon'] ?></td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td><?= $ibu['nama_ibu']?></td>
                </tr>
                <tr>
                    <td>Nik</td>
                    <td>:</td>
                    <td><?= $row['nik'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $row['tempat_lahir'] ?>, <?= $row['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $row['alamat'] ?></td>
                </tr>
            </table>
        </div>
        <div class="footnote">
            serahkan bukti pendaftaran ini ketika anda melakukann registrasi ulang kepada pihak sekolah secara langsung.
        </div>
        <div class="ttd">
            <div class="tanggal">Laimu, <?= date("d F Y");?><p>Ttd. admin pendaftaran</div>
        </div>
        <hr>
        <center>
            <table>
                <tr>
                    <td>Dicetak melalui ppbd online SMP NEGERI 22 MALUKU TENGAH</td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <?php if(!isset($_GET['print'])) :?>
                    <td><center><a href="http://localhost/ppdb-kemiri/services/print_service.php?nik=<?= $row['nik']?>"><button>cetak</button></a></center></td>
                    <?php endif; ?>
                </tr>
            </table>
        </center>
    </div>
</body>
</html>
