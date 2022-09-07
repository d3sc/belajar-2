<?php

// Membuat variable
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "crud_app";

// mengecek koneksi database
$koneksi    = mysqli_connect($host, $user, $pass, $db);
// cek koneksi database, jika koneksi tidak ada maka akan masuk ke dalam if statement
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

// Membuat variable kosong yang akan di isi 
$nama       = '';
$email      = '';
$no_hp      = '';
$jurusan    = '';
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
    $sql1 = "delete from siswa where id = '$id'";
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
    $sql1 = "select * from siswa where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);

    $nama = $r1['nama'];
    if ($nama == '') {
        $error = 'Data Tidak Ditemukan!';
    } else {
        $email = $r1['email'];
        $no_hp = $r1['no_hp'];
        $jurusan = $r1['jurusan'];
    }
}

//* proses create data
// jika tombol sudah ditekan maka akan masuk kedalam if 
if (isset($_POST['simpan'])) {
    // Membuat variable yang di isi dari input yang memiliki atribut name di dalam form, dan ambil valuenya
    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $no_hp      = $_POST['no_hp'];
    $jurusan    = $_POST['jurusan'];

    // Jika variable di bawah ini ada isinya, maka akan masuk kedalam if
    if ($nama && $email && $no_hp && $jurusan) {


        // Melakukan pengecekan dari tabel nama
        $q = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nama='$nama'");
        $cek = mysqli_num_rows($q);

        //* Process update data
        if ($op == 'edit') {
            $sql1   = "update siswa set nama = '$nama', email='$email', no_hp='$no_hp', jurusan='$jurusan' where id = '$id'";
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
                $sql1   = "insert into siswa(nama, email, no_hp, jurusan) values ('$nama', '$email', '$no_hp', '$jurusan')";
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
    <title>Data Siswa</title>

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
        <h1 class="header">CRUD</h1>
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $jurusan ?>">
                    </div>
                    <button type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Siswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    <tbody>
                        <?php
                        //* Proses Read Data

                        $sql2   = "select * from siswa order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urutan = 1;

                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nama       = $r2['nama'];
                            $email      = $r2['email'];
                            $no_hp      = $r2['no_hp'];
                            $jurusan    = $r2['jurusan'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urutan++ ?></th>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $email ?></td>
                                <td scope="row"><?php echo $no_hp ?></td>
                                <td scope="row"><?php echo $jurusan ?></td>

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