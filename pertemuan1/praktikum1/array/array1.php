<?php
$ar_buah = ["semangka", "mangga", "pisang", "sirsak"];

//memanggil array
echo "buah ke 2 adalah " . $ar_buah[2];

//memanggil jumlah array
echo "<br>jumlah array " . count($ar_buah);

//mencetak seluruh buah
echo '<ol>';
foreach ($ar_buah as $buah) {
    echo '<li>' . $buah . '</li>';
    }

echo '</ol>';
//menambahkan buah
$ar_buah[]="nanas";

//hapus buah index ke 1
unset($ar_buah[1]);

//ubaj index ke 4 menjadi melon
$ar_buah[4] = "melon";

//cetak seluruh buah dengan indexnya
echo '<ul>';
foreach ($ar_buah as $ak => $av){
    echo '<li>index' . $ak . '- Nama Buah: ' . $av . '</li>';
}

echo '</ul>';


?>