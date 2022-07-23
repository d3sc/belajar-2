<?php

// pertemuan 1 - php dasar

//
// standar output
// echo dan print
// print_r ( untuk mencetak isi array )
// var_dump ( untuk melihat isi dari variable )

//
// penulisan  sintaks php
//  1. PHP di dalam HTMl
//  2. HTML di dalam PHP ( tidak disarankan )

//
// variable dan tipe data
// Variable
// variable tidak boleh diawali dengan angka, tetapi boleh mengandung angka.
// dan variable tidak boleh ada spasi, tapi harus menggunakan _

// $nama1 = "Ikbar";
// jika menggunakan kutip 1 interpolasi tidak jalan, maka yang terjadi adalah variablenya tidak dijalankan.
// echo 'halo nama saya $nama1';

//
// operator
// aritmatika
// + - * / %
// $x = 10;
// $y = 2;

// echo $x / $y;

//
// penggabungan string / concatenation / concat
// .
// dan di JS adalah +

// $nama_depan = "ikbar";
// $nama_belakang = "rabbani";

// echo "halo nama saya " . $nama_depan .' '. $nama_belakang;

//
// assignment
// =, +=, -=, *=, /=, %=, .=

// $x = 1;
// $x += 5;

// echo $x;

// $nama = "ikbar";
// $nama .= " rabbani";

// echo $nama;

//
// perbandingan
// <, >, <=, >=, ==, !=
// operator perbandingan tidak mengecek tipe data, dan hanya mengecek nilainya.

// var_dump(1 < 5); /* akan menghasilkan nilai boolean */

//
// identitas
// ===, !==
// karena yang dicek nya adalah tipe datanya bukan nilainya.

// var_dump(50 === "50");

// 
// Logika
// &&, ||, ! (AND, OR, NOT)

$x = 10;
var_dump($x < 20 && $x % 2 == 1);

// && jika salah satunya menghasilkan false, maka akan false hasilnya
// || jika salah satunya menghasilkan true, maka akan true hasilnya





?>