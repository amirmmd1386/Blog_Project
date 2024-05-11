<?php
$link = mysqli_connect("localhost", "root", "", "blog_dbl");
$date = date("Y/m/d");
if (isset($_POST['textedit'])) {
    if (file_exists($_FILES["fileedit"]["tmp_name"])) {
        $id= $_POST['idedit'];
        $query = "SELECT * FROM `content_tbl` WHERE `contentId` = $id";
        $resualt = mysqli_query($link, $query);
        $row = mysqli_fetch_array($resualt);
        unlink($row['contentFile']);
        $target_dir = "asset/img/";
        $target_file = $target_dir . basename($_FILES["fileedit"]["name"]);
        echo $target_file;
        $quSelect = "UPDATE content_tbl set contentSub='$_POST[subedit]',contentWriterLname='$_POST[writeredit]',contentCategory='$_POST[categoryedit]',contentDate='$date',contentText='$_POST[textedit]',contentPublish='$_POST[publishedit]',contentTags='$_POST[tagedit]',contentFile='$target_file' where contentId = $_POST[idedit]";
        if (move_uploaded_file($_FILES["fileedit"]["tmp_name"], $target_file)) {
        }
    } else {
        $quSelect = "UPDATE content_tbl set contentSub='$_POST[subedit]',contentWriterLname='$_POST[writeredit]',contentCategory='$_POST[categoryedit]',contentDate='$date',contentText='$_POST[textedit]',contentPublish='$_POST[publishedit]',contentTags='$_POST[tagedit]'  where contentId = $_POST[idedit]";
    }
    $resualt = mysqli_query($link, $quSelect);
    echo "<script>location.replace('index.php?admin=')</script>";
}
