<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/img/nav-icon.png" type="image/x-icon">
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/Fork-Awesome-1.2.0/css/fork-awesome.min.css">
    <title>بلاگ | درباره ما</title>
</head>

<body>
    <?php
   
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    session_start();
    if ($_SESSION['type'] == 'admin') {

        echo " <div class='modal fade' id='exampleModal'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header bg-sky-blue'>
                <button type='button' class='btn-close ms-0 ' data-bs-dismiss='modal' aria-label='Close'></button>
                <h5 class='modal-title ms-auto ' id='exampleModalLabel'>ویرایش اطلاعات</h5>
            </div>
            <div class='modal-body'>
                <form action='about.php' enctype='multipart/form-data' method='POST'
                    class='d-flex flex-column align-items-center justify-content-center gap-3'>
                    <label class='form-label' for='customFile'>عکس هدر</label>
                    <input type='file' class='form-control' name='fileIn' id='customFile' />
                    <div class='input-group'>
                        <input type='text' aria-label='First name' name='footerIn' class='form-control text-end '>
                        <span class='input-group-text bg-sky-blue'>متن فوتر</span>
                    </div>
                    <div class='col-12' dir='rtl'>
                        <label for='exampleFormControlTextarea1' class='form-label'>توضیحات</label>
                        <textarea class='form-control' id='exampleFormControlTextarea1' name='textIn'  rows='3'></textarea>
                    </div>
                    <div class='input-group'>
                        <input type='tel' aria-label='First name' name='phone' class='form-control text-end '>
                        <span class='input-group-text bg-sky-blue'>شماره تماس</span>
                    </div>
                    <div class='input-group'>
                        <input type='text' aria-label='First name' name='subjectIn' class='form-control text-end '>
                        <span class='input-group-text bg-sky-blue'>عنوان وبلاگ</span>
                    </div>
                    <div class='input-group'>
                        <input type='text' aria-label='First name' name='instgram' class='form-control text-end '>
                        <span class='input-group-text bg-sky-blue'>اینستگرام</span>
                    </div>
                    <div class='input-group'>
                        <input type='text' aria-label='First name' name='youtube' class='form-control text-end '>
                        <span class='input-group-text bg-sky-blue'>یوتیوب</span>
                    </div>
                    <div class='input-group'>
                        <input type='email' aria-label='First name' name='email' class='form-control text-end '>
                        <span class='input-group-text bg-sky-blue'>ایمیل</span>
                    </div>
                    <div class='align-self-end '>
                        <button type='button' class='btn btn-outline-danger align-self-end '
                            data-bs-dismiss='modal'>بستن</button>
                        <input type='submit' value='ذخیره تغییرات' class='btn btn-outline-success '>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>";
    } else {
        echo "<div class='modal fade ' id='exampleModal'>
        <div class='modal-dialog modal-lg'>
          <div class='modal-content p-4 bg-sky-blue text-center h3'>
          فکر کردی میتونی ویرایش کنی کاربری بیش نیستی این بلاگ دارای امنیته
          </div>
        </div>
      </div>";
    }
    $query = "select * from about_tbl";
    $resualt = mysqli_query($link, $query);
    $row = mysqli_fetch_array($resualt);
    ?>
    <div class="container-fluid p-0 m-0 bg-light  w-100 vh-100 d-flex align-items-center justify-content-center bg-sky-blue">
        <div class="neo col-11 col-lg-4  h-fit d-flex flex-column justify-content-center pb-3  align-items-center bg-sky-blue">
            <div class="d-flex justify-content-between px-3 w-100">
                <a class="i fw-bolder m-0 " data-bs-toggle="dropdown" role="button" aria-expanded="false">≡</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item btn btn-primary" type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">ویرایش</a></li>
                </ul>

                <a class="i" href="index.php">↩</a>
            </div>
            <div>
                <img src="asset/img/nav-icon.png" class="rounded-circle object-fit-cover border border-2 " width="150px" alt="">
            </div>
            <div class="mt-4 d-flex flex-column justify-content-center align-items-center ">
                <P class="h4"><?php echo "$row[sub]"; ?></P>
                <p class="text-center text-wrap "><?php echo "$row[about]"; ?></p>
            </div>
            <div class="bg-light shadow-lg rounded-3 p-2 d-flex col-10 col-lg-5 justify-content-around ">
                <a href="<?php echo "$row[instgram]"; ?>" class="i fa fa-instagram fa-2x"></a>
                <a href="<?php echo "$row[email]"; ?>" class="i fa fa-email-bulk fa-2x"></a>
                <a href="<?php echo "$row[youtube]"; ?>" class="i fa fa-youtube fa-2x"></a>
                <a href="<?php echo "$row[phone]"; ?>" class="i fa fa-phone fa-2x"></a>
            </div>
        </div>
    </div>
    <script src="asset/js/bootstrap.js"></script>
    <?php
    if (!empty($_POST['textIn'])) {

        $target_dir = "asset/img/";
        $target_file = $target_dir . basename($_FILES["fileIn"]["name"]);
        move_uploaded_file($_FILES["fileIn"]["tmp_name"], $target_file);

        $sub = $_POST['subjectIn'];
        $text = $_POST['textIn'];
        $email = $_POST['email'];
        $youtube = $_POST['youtube'];
        $instgram = $_POST['instgram'];
        $phone = $_POST['phone'];
        $footerIn = $_POST['footerIn'];
        $quSelect = "UPDATE `about_tbl` SET `sub`='$sub', `file`='$target_file',`footerText`='$footerIn',`email`='$email',`phone`='$phone',`instgram`='$instgram',`youtube`='$youtube',`about`='$text' WHERE id = '1'";
        $resualt = mysqli_query($link, $quSelect);
    }
    ?>
</body>

</html>