<?php 
    include '../../utils/connect.php';

    $nik = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM db_calonsiswa WHERE nik = $nik");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_array($query);
    }else{
        echo 'Data tidak ditemukan';
    }

    if (isset($_POST['simpan'])) {
        $status = $_POST['statuses'];
        $ket = $_POST['desc'];

        mysqli_query($conn, "UPDATE db_calonsiswa SET statuses='$status', keterangan='$ket' WHERE nik = $nik");
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admindashboard-style/style.css">
    <link rel="stylesheet" href="../../assets/css/adminedit/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>EDIT CALON PENDAFTAR | SMP NEGERI 22 MALUKU TENGAH</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../../assets/images/kemiri_logo.png" alt="kemiri-logo" height="45">
        </div>
        <div class="sidebar-items-container">
            <a href="index.php">
                <div class="items">
                    <span class="material-symbols-outlined" style="font-size:25pt;">home</span>
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
        <form action="" method="post">
            <div class="form-title">
                <h2>Edit data calon siswa</h2>
            </div>
            <div class="form-username">
                <label for="username">Nama calon Siswa</label><br>
                <input type="text" id="username" placeholder="Nama calon siswa" name="username" value="<?= $row['nama_calon'] ?>" disabled>
            </div>
            <div class="form-usernik">
                <label for="nik">Nomor induk</label><br>
                <input type="text" id="nik" placeholder="Nik" name="nik" value="<?= $row['nik'] ?>" disabled>
            </div>
            <div class="form-option">   
                <label for="statuses">Ubah status dokumen</label><br>
                <select name="statuses" id="statuses">
                    <option value="proses">Sedang di proses</option>
                    <option value="valid">Data valid</option>
                    <option value="not-valid">Data tidak valid</option>
                </select>
            </div>
            <div class="form-description">
                <label for="desc">Beri keterangan</label><br>
                <input type="text" id="desc" placeholder="Keterangan (kosongkan jika tidak diperlukan)" name="desc">
            </div>
            <button type="submit" name="simpan">Ubah</button>
        </form>
    </div>
</body>
</html>