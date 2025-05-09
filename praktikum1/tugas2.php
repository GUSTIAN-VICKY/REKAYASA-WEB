<?php
// JSON string
$jsonString = '{"nama":"Gustian","umur":25,"kota":"Jakarta"}';

// Decode ke dalam bentuk PHP Object
$obj = json_decode($jsonString);

// Decode ke dalam bentuk PHP Array
$arr = json_decode($jsonString, true);

// Mengakses nilai pada PHP Object
echo $obj->nama;  // Output: Gustian
echo $obj->umur;  // Output: 25

// Mengakses nilai pada PHP Array
echo $arr['nama'];  // Output: Gustian
echo $arr['umur'];  // Output: 25
?>
