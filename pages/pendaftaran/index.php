<?php
    include '../../utils/connect.php';

    if(isset($_POST['submit'])){
        date_default_timezone_set('Asia/Jakarta');
        $nama       = $_POST['nama-calon'];
        $npsn       = $_POST['npsn'] != "" ? $_POST['npsn'] : 0;
        $nik        = $_POST['nik'];
        $tempat     = $_POST['tempat-lahir'];
        $tanggal    = $_POST['tanggal-lahir'];
        $agama      = $_POST['agama'];
        $alamat     = $_POST['alamat'];
        $telp       = $_POST['telp'];
        $registered = date("d F Y H:i");

        $nama_ayah  = $_POST['nama-ayah'];
        $pend_ayah  = $_POST['pendidikan-ayah'];
        $kerja_ayah = $_POST['pekerjaan-ayah'];
        $peng_ayah  = $_POST['penghasilan-ayah'];
        $telp_ayah  = $_POST['telp-ayah'] != "" ? $_POST['telp-wali'] : 0;
        $agama_ayah = $_POST['agama-ayah'];

        $nama_ibu   = $_POST['nama-ibu'];
        $pend_ibu   = $_POST['pendidikan-ibu'];
        $kerja_ibu  = $_POST['pekerjaan-ibu'];
        $peng_ibu   = $_POST['penghasilan-ibu'];
        $telp_ibu   = $_POST['telp-ibu'] != "" ? $_POST['telp-wali'] : 0;
        $agama_ibu  = $_POST['agama-ibu'];

        $nama_wali  = $_POST['nama-wali'];
        $pend_wali  = $_POST['pendidikan-wali'];
        $kerja_wali = $_POST['pekerjaan-wali'];
        $peng_wali  = $_POST['penghasilan-wali'];
        $telp_wali  = $_POST['telp-wali'] != "" ? $_POST['telp-wali'] : 0;
        $agama_wali = $_POST['agama-wali'];

        $query = mysqli_query($conn, "INSERT INTO db_calonsiswa (nama_calon, nik, npsn, tempat_lahir, tanggal_lahir, agama, alamat, telp, statuses, tgl_daftar) VALUES ('$nama', $nik,'$npsn', '$tempat', '$tanggal', '$agama', '$alamat', '$telp', 'proses', '$registered')");
        $queryAyah = mysqli_query($conn, "INSERT INTO db_ayah (nik_siswa, nama_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, telp_ayah, agama_ayah) VALUES ($nik, '$nama_ayah','$pend_ayah','$kerja_ayah','$peng_ayah','$telp_ayah','$agama_ayah')");
        $queryIbu = mysqli_query($conn, "INSERT INTO db_ibu (nik_siswa, nama_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, telp_ibu, agama_ibu) VALUES ($nik, '$nama_ibu','$pend_ibu','$kerja_ibu','$peng_ibu','$telp_ibu','$agama_ibu')");
        $queryWali = mysqli_query($conn, "INSERT INTO db_wali (nik_siswa, nama_wali, pendidikan_wali, pekerjaan_wali, penghasilan_wali, telp_wali, agama_wali) VALUES ($nik, '$nama_wali','$pend_wali','$kerja_wali','$peng_wali',$telp_wali,'$agama_wali')");

        if($query){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $telp,
                'message' => "PPDB Notification\r\nSMP Negri 1 Kemiri\r\n\r\nTerimakasih sudah mendaftarkan calon peserta didik anda, data anda sedang di proses.\r\n\r\nuntuk cek hasil validasi dapat dilihat pada menu *Cek Data Calon Siswa* pada website PPDB SMPN 1 Kemiri. terimakasih 👏", 
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: tmePz!0Res-7F8ojZh-N' //change TOKEN to your actual token
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            header("location:succes.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/pendaftaran-style/style.css">
    <title>PPDB| SMP NEGERI 22 MALUKU TENGAH</title>
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
                <a href="../datacheck" class="active">CEK DATA CALON SISWA</a>
                <a href="tatacara.php" class="active">TATA CARA PENDAFTARAN</a>
            </span>
        </span>
    </div>
    <div class="content-container">
        <div class="image-form">
            <img src="../../assets/images/form-image.png" alt="Work illustrations by Storyset">
        </div>
        <div class="form-container">
            <form action="" method="POST">
                <div class="form-siswa">
                    <div class="form-detail-title">
                        DATA CALON PESERTA DIDIK
                    </div>
                    <input type="text" name="nama-calon" id="" placeholder="Nama Lengkap*" required>
                    <input type="number" name="npsn" id="" placeholder="NPSN" maxlength="8">
                    <input type="number" name="nik" id="" placeholder="NIK*" required maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><br>
                    <input type="text" name="tempat-lahir" id="" placeholder="Tempat Lahir*" required>
                    <input type="text" name="tanggal-lahir" id="" placeholder="Tanggal Lahir: 31 Oktober 2000*" required>
                    <input type="text" name="agama" id="" placeholder="Agama*" required><br>
                    <input type="text" name="alamat" id="" placeholder="Alamat Lengkap*" required>
                    <input type="number" name="telp" id="" placeholder="No. Telp/Whatsapp*" required maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                </div>
                <div class="form-detail-title">
                    Data Orang tua & Wali
                </div>
                <div class="wali-container">
                    <div class="form-orangtua">
                        <div class="people-title">Data Ayah</div>
                        <input type="text" name="nama-ayah" id="" placeholder="Nama Lengkap Ayah"><br>
                        <input type="text" name="pendidikan-ayah" id="" placeholder="Pendidikan Terakhir"><br>
                        <input type="text" name="pekerjaan-ayah" id="" placeholder="Pekerjaan"><br>
                        <input type="text" name="penghasilan-ayah" id="" placeholder="Penghasilan"><br>
                        <input type="text" name="telp-ayah" id="" placeholder="No.Telp/Wa"><br>
                        <input type="text" name="agama-ayah" id="" placeholder="Agama"><br>
                    </div>
                    <div class="form-orangtua">
                        <div class="people-title">Data ibu</div>
                        <input type="text" name="nama-ibu" id="" placeholder="Nama Lengkap Ibu"><br>
                        <input type="text" name="pendidikan-ibu" id="" placeholder="Pendidikan Terakhir"><br>
                        <input type="text" name="pekerjaan-ibu" id="" placeholder="Pekerjaan"><br>
                        <input type="text" name="penghasilan-ibu" id="" placeholder="Penghasilan"><br>
                        <input type="text" name="telp-ibu" id="" placeholder="No.Telp/Wa"><br>
                        <input type="text" name="agama-ibu" id="" placeholder="Agama"><br>
                    </div>
                    <div class="form-orangtua">
                        <div class="people-title">Data wali</div>
                        <input type="text" name="nama-wali" id="" placeholder="Nama Lengkap Waliali"><br>
                        <input type="text" name="pendidikan-wali" id="" placeholder="Pendidikan Terakhir"><br>
                        <input type="text" name="pekerjaan-wali" id="" placeholder="Pekerjaan"><br>
                        <input type="text" name="penghasilan-wali" id="" placeholder="Penghasilan"><br>
                        <input type="text" name="telp-wali" id="" placeholder="No.Telp/Wa"><br>
                        <input type="text" name="agama-wali" id="" placeholder="Agama"><br>
                    </div>
                </div>
                <div class="submit-btn">
                    <input type="submit" name="submit" value="DAFTAR SEKARANG">
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        copyright © 2024 SMP NEGERI 22 MALUKU TENGAH
    </div>
</body>
</html>