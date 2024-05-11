<?php
if (isset($_GET['id'])) {
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    $quSelectCat = "DELETE FROM `contact_tbl` WHERE id = '$_GET[id]'";
    $resualtCat = mysqli_query($link, $quSelectCat);
    echo "<script>location.replace('index.php?admin=')</script>";
} else {
    echo "<script>location.replace('index.php?admin=')</script>";
}
