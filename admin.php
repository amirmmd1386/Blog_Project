<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "blog_dbl");
if (isset($_POST['newAdmin'])) {
    $query = "insert into adminstator(adminUser,password) values('$_POST[newAdmin]','$_POST[newPassword]')";
    $resualt = mysqli_query($link, $query);
    echo "<script>location.replace('index.php?admin=')</script>";
}
if (isset($_GET['out'])) {
}
if (!empty($_GET['userName'])) {
    $admin = trim($_GET['userName']);
    $query = "select * from adminstator";
    $resualt = mysqli_query($link, $query);
    $row = mysqli_fetch_array($resualt);
    while ($row) {
        if ($row['adminUser'] == $admin) {
            echo "<script>location.replace('index.php')</script>";
            break;
        }
        $row = mysqli_fetch_array($resualt);
    }
    $_SESSION['type'] = 'admin';
} else {
    $_SESSION['type'] = 'usuall';
}
echo "<script>location.replace('index.php')</script>";
