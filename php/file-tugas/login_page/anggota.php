<?php
session_start();

if (!isset($_SESSION['session_username'])) {
    header('location:login.php');
    exit();
}
// print_r($_SESSION);
// print_r($_COOKIE);

$user = $_SESSION['session_username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- My Icons -->
</head>

<body>
    <h1>Welcome Back <b><?php echo $user ?></b></h1>
    <a href="logout.php">Log-out</a>
</body>

</html>