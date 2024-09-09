<?php 
    include '../../utils/connect.php';

    date_default_timezone_set('Asia/Jakarta');
    $id = $_GET['id'];
    $queryCalon = mysqli_query($conn, "SELECT * FROM db_calonsiswa WHERE nik = $id");
    $queryIbu = mysqli_query($conn, "SELECT * FROM db_ibu WHERE nik_siswa = $id");
    $queryAyah = mysqli_query($conn, "SELECT * FROM db_ayah WHERE nik_siswa = $id");
    $queryWali = mysqli_query($conn, "SELECT * FROM db_wali WHERE nik_siswa = $id");
    $siswa = mysqli_fetch_array($queryCalon);
    $ibu = mysqli_fetch_array($queryIbu);
    $ayah = mysqli_fetch_array($queryAyah);
    $wali = mysqli_fetch_array($queryWali);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/adminprint-style/style.css">
    <title>Cetak PDF | PPDB SMP NEGERI 22 MALUKU TENGAH</title>
</head>
<body>
    <div class="content-pdf">
        <div class="header">
            <div class="header-logo"><img src="../../assets/images/kemiri_logo.png" alt="" height='100'></div>
            <div class="header-detail">
                <div class="header-title">PPDB SMP NEGERI 22 MALUKU TENGAH</div>
                <div class="header-address">Laimu, Kec. Telutih, Kabupaten Maluku Tengah, Maluku</div>
                <div class="header-subtitle">Print of PPDB SMP NEGERI 22 MALUKU TENGAH - smpn22malteng@gmail.com</div>
            </div>
        </div>
        <hr>
        <div class="body">
            <div class="section-title-1">
                Data Siswa
            </div>
            <table>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?=$siswa['nik']?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><?=$siswa['nama_calon']?></td>
                </tr>
                <tr>
                    <td>NPSN</td>
                    <td>:</td>
                    <td><?=$siswa['npsn']?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?=$siswa['agama']?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal lahir</td>
                    <td>:</td>
                    <td><?=$siswa['tempat_lahir']?>, <?=$siswa['tanggal_lahir']?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?=$siswa['alamat']?></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td>:</td>
                    <td><?=$siswa['telp']?></td>
                </tr>
            </table>
            <hr>
            <div class="section-title-2">
                Data Orang Tua / Wali
            </div>
            <table>
                <tr>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td><?=$ayah['nama_ayah']?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?=$ayah['agama_ayah']?></td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>:</td>
                    <td><?=$ayah['pendidikan_ayah']?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?=$ayah['pekerjaan_ayah']?></td>
                </tr>
                <tr>
                    <td>Penghasilan/bln</td>
                    <td>:</td>
                    <td><?=$ayah['penghasilan_ayah']?></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td>:</td>
                    <td><?=$ayah['telp_ayah']?></td>
                </tr>
            </table>
           
            <table>
                <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td><?=$ibu['nama_ibu']?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?=$ibu['agama_ibu']?></td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>:</td>
                    <td><?=$ibu['pendidikan_ibu']?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?=$ibu['pekerjaan_ibu']?></td>
                </tr>
                <tr>
                    <td>Penghasilan/bln</td>
                    <td>:</td>
                    <td><?=$ibu['penghasilan_ibu']?></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td>:</td>
                    <td><?=$ibu['telp_ibu']?></td>
                </tr>
            </table>
         
            <table>
                <tr>
                    <td>Nama Wali</td>
                    <td>:</td>
                    <td><?=$wali['nama_wali']?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?=$wali['agama_wali']?></td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>:</td>
                    <td><?=$wali['pendidikan_wali']?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?=$wali['pekerjaan_wali']?></td>
                </tr>
                <tr>
                    <td>Penghasilan/bln</td>
                    <td>:</td>
                    <td><?=$wali['penghasilan_wali']?></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td>:</td>
                    <td><?=$wali['telp_wali']?></td>
                </tr>
            </table>
        </div>
        <div class="print-btn">
            <button onclick="cetak()">Cetak Data</button>
        </div>
    </div>
</body>
<script>
    function cetak(){
        window.print();
    }
</script>
</html>
