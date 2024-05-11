<?php
if (isset($_GET['id'])) {
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");

    $quSelect1 = "select * from content_tbl where contentId = $_GET[id]";
    $resualt1 = mysqli_query($link, $quSelect1);
    $row = mysqli_fetch_array($resualt1);
    unlink($row['contentFile']);
    $quSelect = "DELETE FROM content_tbl where contentId = $_GET[id]";
    $resualt = mysqli_query($link, $quSelect);
    echo "<script>location.replace('index.php?admin=')</script>";
}
