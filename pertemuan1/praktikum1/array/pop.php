<?php
$siswa =  ["Tian", "Asep", "Ahong", "Cipe"];

//menampilkan array awal
echo "Array awal : <br>";
print_r($siswa);

//menghapus elemen terakhir dari array
$orang_terakhir = array_pop($siswa);

//menampilkan elemen yang di hapus
echo "<br> Elemen yang akan dihapus " .$orang_terakhir;

//menampilkan array setelah penghapusan 

echo "<br> Array setelah penghapusan : <br>";
print_r($siswa);

?>