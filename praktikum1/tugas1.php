<?php
// Membuat array
$arr = [
    "nama" => "Gustian",
    "umur" => 25,
    "kota" => "Jakarta"
];

// Encode array menjadi JSON
$json = json_encode($arr);

// Menampilkan hasil JSON
echo $json;
?>
