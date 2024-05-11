<?php
  $link = mysqli_connect("localhost", "root", "", "blog_dbl");
  if(isset($_POST['id'])){
      $quSelect = " INSERT INTO `score_tbl`( `idText`, `text`, `score`) VALUES ('$_POST[id]','$_POST[textrec]','$_POST[star]')";
      $resualt = mysqli_query($link, $quSelect);
      echo "<script>location.replace('index.php')</script>";
  }
?>