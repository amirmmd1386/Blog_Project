<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/img/nav-icon.png" type="image/x-icon">
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <title>بلاگ | مطلب من</title>
</head>

<body dir="rtl" class="bg-sky-blue">
    <?php
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    $query = "select * from about_tbl";
    $resualt = mysqli_query($link, $query);
    $rows = mysqli_fetch_array($resualt);
    ?>
    <div class="container-fluid p-0 m-0">
        <header class=" p-3 d-flex flex-column align-items-center justify-content-center border-bottom border-5" style="background-image: url(<?php echo "$rows[file]"; ?>)">
            <nav class="navbar navbar-expand-lg navbar-light bg-sky-blue mx-3  rounded-5 w-95" dir="ltr">
                <div class="container-fluid">
                    <a class="navbar-brand text-white"> <img src="asset/img/nav-icon.png" height="50px" alt="blog-icon"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav" dir="rtl">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php">خانه</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="about.html">درباره ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact.html">تماس با ما</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
                <h1 class="bg-light p-2 rounded-3 my-5 Title text-center ">آفرین به تویی که پیگیر مطلب وبلاگ ما شدی
                </h1>
            </div>
        </header>
        <div class="card mb-3 col-11 col-lg-8 m-auto mt-5   bg-sky-blue neo border-0 ">
            <?php
            if (isset($_GET['id'])) {
                $link = mysqli_connect("localhost", "root", "", "blog_dbl");
                $quSelect = "select * from content_tbl where contentId = $_GET[id]";
                $resualt = mysqli_query($link, $quSelect);
                $row = mysqli_fetch_array($resualt);
                if ($row) {
                    echo "
                        <img src='$row[contentFile]' width='200px' class='m-auto mt-2 rounded-5' alt='...'>
                        <div class='card-body'>
                        <h5 class='card-title text-center h1'>$row[contentSub]</h5>
                        <p class='card-text'>$row[contentText]</p>";
                } else {
                    echo "<script>location.replace('index.php')</script>";
                }
            }
            ?>
        </div>
    </div>
    <footer class="d-flex flex-column align-items-center justify-content-center bg-sky-blue p-2 mt-5 border-top">
        <img src="asset/img/nav-icon.png" height="30px" alt="">
        <hr width="90%">
        <div>
        <p class="h5"><?php echo "$rows[footerText]"; ?></p>
        </div>
    </footer>
    </div>
    <script src="asset/js/bootstrap.js"></script>
</body>

</html>