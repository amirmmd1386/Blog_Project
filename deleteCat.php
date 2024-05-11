<?php
if(!empty($_GET['catName'])){
    
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    $quSelectCat = "DELETE FROM category WHERE categoryName = '$_GET[catName]'";
    $resualtCat = mysqli_query($link, $quSelectCat);
    echo "<script>location.replace('index.php?admin=')</script>";

}
else{
    echo "<script>location.replace('index.php?admin=')</script>";

}
?>