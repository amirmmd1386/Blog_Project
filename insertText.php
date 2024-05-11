<?php
if (!empty($_POST['textIn'])) {
    $target_dir = "asset/img/";
    $target_file = $target_dir . basename($_FILES["fileIn"]["name"]);
    if (move_uploaded_file($_FILES["fileIn"]["tmp_name"], $target_file)) {
        echo "true";
    }

    $sub = $_POST['subjectIn'];
    $text = $_POST['textIn'];
    $category = $_POST['categoryIn'];
    $addPublish = $_POST['addPublish'];
    $writer = $_POST['writerNameIn'];
    $tagIn = $_POST['tagIn'];
    $date = date("Y/m/d");
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    $quSelect = "insert into content_tbl(contentFile , contentSub , contentText , contentCategory , contentPublish , contentWriterLname , contentDate , contentTags) values ('$target_file','$sub','$text','$category','$addPublish','$writer' , '$date' , '$tagIn')";
    $resualt = mysqli_query($link, $quSelect);
    echo "<script>location.replace('index.php?admin=')</script>";
} else {
    echo "<script>location.replace('index.php?admin=')</script>";
}
