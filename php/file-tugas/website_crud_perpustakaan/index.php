<?php

// Membuat variable
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "perpus";

// mengecek koneksi database
$koneksi    = mysqli_connect($host, $user, $pass, $db);
// cek koneksi database, jika koneksi tidak ada maka akan masuk ke dalam if statement
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

// Membuat variable kosong yang nanti akan di isi 
$nama       = '';
$no_hp      = '';
$nama_buku      = '';
$tanggal_peminjaman    = '';
$sukses     = '';
$error      = '';


// op akan digunakan untuk menangkap variable yang ada di dalam url 
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == "delete") {
    $id = $_GET['id'];
    $sql1 = "delete from peminjam where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = 'gagal melakukan hapus data';
    }
}


// Process Update Data
// Jika var op di url bernilai edit, maka tampilkan datanya
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from peminjam where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);

    // Jika data id tidak ditemukan / tidak ada.
    $nama = $r1['nama'];
    if ($nama == '') {
        $error = 'Data Tidak Ditemukan!';
    } else {
        $nama_buku = $r1['nama_buku'];
        $no_hp = $r1['no_hp'];
        $tanggal_peminjaman = $r1['tanggal_peminjaman'];
    }
}

//* proses create data
// jika tombol sudah ditekan maka akan masuk kedalam if 
if (isset($_POST['simpan'])) {
    // Membuat variable yang di isi dari input yang memiliki atribut name di dalam form, dan ambil valuenya
    $nama       = $_POST['nama'];
    $nama_buku      = $_POST['nama_buku'];
    $no_hp      = $_POST['no_hp'];
    $tanggal_peminjaman    = $_POST['tanggal_peminjaman'];

    // Jika variable di bawah ini ada isinya, maka akan masuk kedalam if
    if ($nama && $nama_buku && $no_hp && $tanggal_peminjaman) {


        // Melakukan pengecekan dari tabel nama
        $q = mysqli_query($koneksi, "SELECT * FROM peminjam WHERE nama='$nama'");
        $cek = mysqli_num_rows($q);

        //* Process update data
        if ($op == 'edit') {
            $sql1   = "update peminjam set nama = '$nama', nama_buku='$nama_buku', no_hp='$no_hp', tanggal_peminjaman='$tanggal_peminjaman' where id = '$id'";
            $q1     = mysqli_query($koneksi, $sql1);

            if ($q1 && $cek == 0) {
                $sukses = "Data berhasil di update";
            } else {
                $error = "Data gagal di update";
            }
        }
        //* untuk Memasukkan data
        else {
            // Jika var cek isinya 0, maka akan bernilai true
            if ($cek == 0) {
                // Memasukkan data kedalam database menggunakan sql
                $sql1   = "insert into peminjam(nama, nama_buku, no_hp, tanggal_peminjaman) values ('$nama', '$nama_buku', '$no_hp', '$tanggal_peminjaman')";
                $q1 = mysqli_query($koneksi, $sql1);
                $sukses     = "Berhasil memasukkan data!";
            }
            // sebaliknya
            else {
                $error      = 'Gagal memasukkan data!';
            }
        }
    }

    // Jika input dalam form tidak di isi akan masuk kedalam else.
    else {
        $error      = 'silahkan masukan semua data!';
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data peminjam</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }

        .header {
            margin: 25px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- Untuk memasukkan data -->
        <h1 class="header">Data Peminjaman Buku</h1>
        <div class="card">
            <div class="card-header">
                Masukkan data
            </div>
            <div class="card-body">
                <?php
                // Melalukan pengecekan, jika variable error ada isinya maka akan memunculkan alert danger
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:2;url=index.php"); /* 5 : detik */
                }
                ?>
                <?php
                // Jika variable sukses ada isinya maka akan memunculkan alert success. 
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:2;url=index.php");
                }
                ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_buku" class="form-label">nama_buku</label>
                        <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?php echo $nama_buku ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_peminjaman" class="form-label">tanggal_peminjaman</label>
                        <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?php echo $tanggal_peminjaman ?>">
                    </div>
                    <button type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data peminjam
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">nama_buku</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">tanggal_peminjaman</th>
                        </tr>
                    <tbody>
                        <?php
                        //* Proses Read Data

                        $sql2   = "select * from peminjam order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urutan = 1;

                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nama       = $r2['nama'];
                            $no_hp      = $r2['no_hp'];
                            $nama_buku      = $r2['nama_buku'];
                            $tanggal_peminjaman    = $r2['tanggal_peminjaman'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urutan++ ?></th>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $nama_buku ?></td>
                                <td scope="row"><?php echo $no_hp ?></td>
                                <td scope="row"><?php echo $tanggal_peminjaman ?></td>

                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('anda yakin?');"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>


</html>