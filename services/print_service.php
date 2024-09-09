<?php
    $id = $_GET['nik'];
    // $file = file_get_contents();
    require_once "../vendor/autoload.php";
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $dompdf->set_option('enable_remote', TRUE);
    $dompdf->loadHtmlFile('http://localhost/ppdb-kemiri/services/print.php?print=true&id='.$id);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('bukti_pendaftaran_ppdb.pdf');
?>