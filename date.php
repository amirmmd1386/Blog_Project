<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/img/nav-icon.png" type="image/x-icon">
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <title>بلاگ | تاریخ</title>
</head>

<body class="bg-blog">
<?php
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    $query = "select * from about_tbl";
    $resualt = mysqli_query($link, $query);
    $rows = mysqli_fetch_array($resualt);
    ?>
    <div class="container-fluid p-0 m-0 bc-drop-filter" dir="rtl">
        <header class="p-3 d-flex flex-column align-items-center justify-content-center border-bottom border-5" style="background-image: url(<?php echo "$rows[file]"; ?>)">
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
                                <a class="nav-link text-white" href="about.php">درباره ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact.php">تماس با ما</a>
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
        <article class="col-11 col-lg-8 bg-black m-auto mt-5">
            <div class="container-fluidn overflow-y-scroll d-flex flex-column gap-4 " style="height: 600px;">
                <?php
                $quSelect = "select * from content_tbl where contentDate = '$_GET[id]'";
                $resualt = mysqli_query($link, $quSelect);
                $row = mysqli_fetch_array($resualt);
                while ($row) {
                    if ($row['contentPublish'] == '0') {
                        $text = substr($row['contentText'], 0, 295);
                        echo " <div class='card mx-3 col-12 border-x rounded-5 shadow'>
                    <div class='row g-0'>
                    <div class='col-md-4'>
                    <img src='$row[contentFile]' class='rounded-end object-fit-cover h-100 w-100' alt='...'>
                    </div>
                    <div class='col-md-8'>
                    <div class='card-body'>
                    <h5 class='card-title'>$row[contentSub]</h5>
                    <p class='card-text'>$text</p>
                    <div class='d-flex gap-2 align-items-center justify-content-center '>
                    <a data-mdb-ripple-init href='date.php?id=$row[contentDate]' class='h6 btn btn-primary '>
                                        $row[contentDate]</a>
                                    <a data-mdb-ripple-init href='category.php?id=$row[contentCategory]' class='h6 btn btn-primary '>
                                        $row[contentCategory]</a>
                    <p class='h6 link-underline-primary bg-primary px-3 py-2 rounded-4 text-white'>
                    نویسنده:$row[contentWriterLname]</p>
                    <a data-mdb-ripple-init href='post.php?id=$row[contentId]' class='h6 btn btn-outline-primary  py-1 rounded-4 '>بیشتر</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>";
                    }
                    $row = mysqli_fetch_array($resualt);
                }
                ?>

            </div>
        </article>
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