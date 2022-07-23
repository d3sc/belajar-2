<?php

// Pengulangan

// for
// while
// do.. while
// foreach (pengulangan khusus array)

// 1. for

// for ($i = 0; $i < 5; $i++) { 
//     echo "Hello World <br>";
// };

// 2. while
// selama kondisinya bernilai true lakukan apapun yang ada didalamnya. yang dicek terlebih dahulu adalah apakah true atau false.

// $i = 0;
// while ($i < 5) {
//     echo "hello world <br>";

//     $i++;
// }

// 3. do.. while
// perbedaan dengan while baisa adalah jika nilai bernilai false maka pengulangan akan dijalankan sekali saja, karena dia menjalankan perintah terlebih dahulu baru mengecek apakah true atau false.

// $i = 0;
// do {
//     echo "hello world <br>";
//     $i++;
// } while ( $i < 5 )


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .ganti-warna {
            background-color: silver;
        }
    </style>
</head>
<body>
    
    <table border="1" cellpadding="10" cellspacing="0">

        <!-- cara ke 1 --> 
        <!-- harus ada tag php nya -->
        <!-- // for ($i = 1; $i <= 3; $i++) {
            //     echo "<tr>";
            //     for ($j = 1; $j <= 5; $j++) {
            //         echo "<td>$i,$j</td>";
            //     }
            //     echo "</tr>";
            // }  -->

        <!-- Cara ke 2  yang dinamakan sintaks template-->
            <?php for ($i = 1; $i <= 5; $i++) : ?> <!--// mengganti {} menjadi ini (:) jika ingin memasang end for -->
                <?php if ($i % 2 == 1) : ?> <!-- mengganti semua background warna table yang ganjil menjadi silver-->
                <tr class="ganti-warna">
                <?php else : ?>
                <tr>
                <?php endif ;?> <!--// Selain menggunakan endif dapat menggunakan {}. -->
                    <?php for ($j = 1; $j <= 5; $j++) { ?>
                        <td><?= "$i,$j"?></td> <!--// mengganti php menjadi ( = ) itu khusus untuk memanggil perintah echo saja -->
                    <?php } ?>
                </tr>
            <?php endfor; ?> <!--// menggunakan endfor untuk menutup pengulangan for dengan diakhir menggunakan( ; ), dan tergantung bukan hanya endfor tetapi bisa endif, endwhile, atau yang lain. -->
    </table>

</body>
</html>