<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/css/mdb.min.css">
    <link rel="shortcut icon" href="asset/img/nav-icon.png" type="image/x-icon">
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <title>بلاگ | جزئیات</title>
</head>

<body class="bg-blog">
    <!-- <div id="particles-js"></div> -->
    <?php
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    $query = "select * from about_tbl";
    $resualt = mysqli_query($link, $query);
    $rows = mysqli_fetch_array($resualt);
    ?>
    <div class="container-fluid p-0 m-0 overflow-y-hidden  bc-drop-filter">
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
                                <a class="nav-link text-white" href="contact.php">تماس با ما</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
                <h1 class="bg-light p-2 rounded-3 my-5 Title text-center ">میتونی اینجا مطلبی را که میخوای ارسال کنی
                </h1>
            </div>
        </header>
        <article class="d-flex justify-content-lg-around justify-content-center  align-items-center my-4 flex-wrap  gap-lg-0 gap-4 px-3">
            <form class="col-12 col-lg-4 bg-light p-2 rounded-3 " action="contact.php" method="POST">
                <p class="h2 bg-sky-blue text-white p-2 rounded-2 text-center ">ارسال نظر</p>
                <!-- Name input -->
                <div data-mdb-input-init class="form-outline mb-2">
                    <textarea class="form-control text-end " id="form4Example3" rows="4" name="text"></textarea>
                    <label class="form-label" for="form4Example3">مطلب</label>
                </div>
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">یولاماک(ترکی را پاس بداریم🐺)</button>
            </form>
        </article>
        <footer class="d-flex flex-column align-items-center justify-content-center bg-sky-blue p-2 ">
            <img src="asset/img/nav-icon.png" height="30px" alt="">
            <hr width="90%">
            <div>
            <p class="h5"><?php echo "$rows[footerText]"; ?></p>
            </div>
        </footer>
    </div>
    <script src="asset/js/bootstrap.js"></script>
    <script type="text/javascript" src="asset/css/js/mdb.umd.min.js"></script>
    <?php
    if (!empty($_POST['text'])) {

        $link = mysqli_connect("localhost", "root", "", "blog_dbl");
        $quSelectCat = "insert into contact_tbl (text) values('$_POST[text]')";
        $resualtCat = mysqli_query($link, $quSelectCat);
    }
    ?>
</body>

</html>