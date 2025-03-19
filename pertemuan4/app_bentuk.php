<?php
    require_once 'Lingkaran.php';

    $lingkaran1 = new Lingkaran(8.4);
    $lingkaran2 = new Lingkaran(14);

    echo 'NILAI PHI adalah '. Lingkaran::PHI;
    echo '<br> Jari-jari lingkaran 1 = '. $lingkaran1->Jari();
    echo '<br> Luas lingkaran 1 '. $lingkaran1->getLuas();
    echo '<br> Keliling Lingkaran 1 '. $lingkaran->getKeliling();
    echo '<br>';
    $lingkaran1->cetak();
    echo '<br>';
?>