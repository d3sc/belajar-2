<?php
// Menghilangkan warning
error_reporting(0);
// Menggunakan fungsi session_start() agar bisa menggunakan session
session_start();

// Atur koneksi ke database

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "login";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

// Pengaturan variable
$err = "";
$username = "";
$ingataku = "";

// Jika cookie_username ada isinya, maka akan masuk kedalam if statement.
if (isset($_COOKIE['cookie_username'])) {
    // mengambil data dari cookie username
    // mengisi var dengan value dari cookie username dan password
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql1 = "SELECT * FROM login WHERE username = '$cookie_username'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);

    // Jika var r1 dibagian password berisi var dari cookie_password, maka akan masuk kedalam if statement.
    if ($r1['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

// if (isset($_SESSION['session_username'])) {
//     header('location:anggota.php');
//     exit();
// }
if (isset($_COOKIE['cookie_username'])) {
    header('location:anggota.php');
    exit();
}

// Ketika tombol submit ditekan
if (isset($_POST['login'])) {
    // Mengambil nilai dari form yang mempunyai name yang sesuai dengan variable, dan memasukkan nya ke variable.
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ingataku = $_POST['ingataku'];

    echo $ingataku;

    if ($username == '' or $password == '') {
        $err = "<li>Silahkan masukkan username dan password</li>";
    } else {
        $sql1 = "SELECT * FROM login WHERE username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

        // Melakukan pengecekan jika username tidak ada di dalam database maka akan bernilai 0;
        $cek = mysqli_num_rows($q1);

        // jika var cek bernilai 0, maka akan masuk kedalam if statement
        if ($cek == 0) {
            $err = "<li>username <b>$username</b> tidak tersedia.</li>";
        } else if ($r1['password'] != md5($password)) {
            $err = "<li>Password yang dimasukkan tidak sesuai.</li>";
        }

        // jika var error tidak ada isinya maka akan masuk kedalam if statement
        if (empty($err)) {
            // SESSION tersimpan kedalam server
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            if ($ingataku == 1) {
                // cookie terimpan kedalam browser
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            }
            // redirect ke halaman anggota.php
            header("location:anggota.php");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            font-family: "Nunito";
        }

        body {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            padding: 20px;
            height: auto;
            width: 100%;
        }

        .side-text {
            color: #ddd;
            text-align: center;
            width: 300px;
        }

        .logout {
            position: absolute;
            top: 5px;
            left: 10px;
        }

        .logout i {
            color: #ddd;
            font-size: 40px;
            z-index: 5;
        }

        .logout i:hover {
            opacity: 0.6;
        }
    </style>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet" />

    <!-- My Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body style="background-color: #343a40; width: 100%; height: 100vh; display: flex; justify-content: space-around; align-items: center;">

    <div class="logout">
        <a href="index.html"><i class='bx bx-left-arrow-alt'></i></a>
    </div>
    <div class="side-text">
        <h1>Log In Now</h1>
    </div>
    <main>
        <div class="card" style="background-color: #323232; color: #edf0f1; border: none;">
            <div class="card-body">
                <h3 class="mb-4">Login Admin</h3>
                <?php
                if ($err) { ?>

                    <div id="login-alert" class="alert alert-danger col-sm-12 pb-0" role="alert">
                        <ul><?php echo $err ?></ul>
                    </div>

                <?php } ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="login-username" name="username" value="<?php echo $username ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login-password" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="login-remember" name="ingataku" value="1">
                        <label class="form-check-label" for="ingataku">Ingat Saya</label>
                    </div>
                    <button type="submit" class="btn btn-success mt-3" name="login">Submit</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>