<?php
$link = mysqli_connect("localhost", "root", "", "blog_dbl");
$quSelectCat = "";
if (isset($_GET['idDel'])) {

    $quSelectCat = "DELETE FROM `link_tbl` WHERE id = $_GET[idDel]";
}
if (isset($_POST['href'])) {
    $quSelectCat = "INSERT INTO `link_tbl`(`links`, `discription`, `href`) VALUES ('$_POST[title]','$_POST[about]','$_POST[href]')";
}
$resualtCat = mysqli_query($link, $quSelectCat);
echo "<script>location.replace('index.php?admin=')</script>";
