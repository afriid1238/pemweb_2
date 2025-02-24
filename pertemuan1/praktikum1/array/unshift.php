<?php

$laptop = ["Asus", "Lenovo", "Dell", "Realme"];

//Menambahkan elemen di awal
    array_unshift($laptop, "HP", "Accer");

//Hasil
echo "hasil";
foreach ($laptop as $p){
    echo "<br>".$p;
}

?>