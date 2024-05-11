<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/css/mdb.min.css">
    <link rel="stylesheet" href="asset/css/Fork-Awesome-1.2.0/css/fork-awesome.min.css">
    <link rel="shortcut icon" href="asset/img/nav-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="asset/css/sweetalert.css">
    <link rel="stylesheet" href="asset/js/star-rating.js/dist/star-rating.css">
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <title>بلاگ | خانه</title>
</head>

<body dir="rtl" class="">
    <?php
    session_start();
    $_SESSION['type'] = 'usuall';

    if (isset($_GET['admin'])) {
        $_SESSION['type'] = 'admin';
    }
    $link = mysqli_connect("localhost", "root", "", "blog_dbl");
    if (isset($_GET['editId'])) {
        $editQue = "select * from content_tbl where contentId = $_GET[editId]";
        $resQue = mysqli_query($link, $editQue);
        $row = mysqli_fetch_array($resQue);
        echo "<div class='modal fade' id='edit' role='dialog' dir='ltr'>
         <div class='modal-dialog' role='document'>
             <div class='modal-content'>
                 <div class='modal-header bg-sky-blue'>
                     <button type='button' class='btn-close ms-0 ' data-bs-dismiss='modal' aria-label='Close'></button>
                     <h5 class='modal-title ms-auto ' id='exampleModalLabel'>ویرایش اطلاعات</h5>
                 </div>
                 <div class='modal-body'>
                     <form class='col-12  bg-light p-2 rounded-3 '  method='POST' enctype='multipart/form-data' action='update.php' >
                     
                         <p class='h2 bg-sky-blue text-white p-2 rounded-2 text-center '>ویرایش</p>
                         <!-- Name input -->
                         <div class='row'>
                             <div class='col-sm-7'>
                                 <div data-mdb-input-init class='form-outline mb-4'>
                                     <input type='text' id='writeredit' name='writeredit' class='form-control text-end ' value='$row[contentWriterLname]'/>
                                     <label class='form-label' for='writeredit'>نام نویسنده</label>
                                 </div>
                             </div>
                             <div class='col'>
                                 <div data-mdb-input-init class='form-outline mb-4'>
                                     <input type='text' id='subedit' name='subedit' class='form-control text-end ' value='$row[contentSub]'/>
                                     <label class='form-label' for='subedit'>عنوان</label>
                                 </div>
                             </div>
                         </div>
                         <select class='form-select border-1 mb-4' name='categoryedit' aria-label='Default select example'>
                         <option selected>$row[contentCategory]</option>
                         ";
        $quSelectCat = "select * from category ";
        $resualtCat = mysqli_query($link, $quSelectCat);
        $rowCat = mysqli_fetch_array($resualtCat);
        while ($rowCat) {
            echo " <option value='$rowCat[categoryName]'>$rowCat[categoryName]</option> ";
            $rowCat = mysqli_fetch_array($resualtCat);
        }

        echo "
                             </select>
                         <input type='file' class='form-control mb-4 ' name='fileedit' />
 
                         <div data-mdb-input-init class='form-outline mb-4'>
                             <textarea class='form-control text-end ' id='textedit' name='textedit' rows='4'>$row[contentText] </textarea>
                             <label class='form-label' for='textedit'>مطلب</label>
                         </div>
                         <div class='w-100 d-flex flex-column justify-content-center align-content-center '>
                             <div data-mdb-input-init class='form-outline mb-4'>
                                 <input type='text' id='tag' class='form-control text-end ' />
                                 <label class='form-label' for='tag'>تگ اد کن</label>
                             </div>
                            
                             
                            
                             <div class='w-100 d-flex justify-content-around  flex-wrap  gap-2 ' id='tagAdd'>
                             ";
        if (!empty($row['contentTags'])) {

            $tag =  explode("-", $row['contentTags']);
            for ($i = 0; $i < count($tag) - 1; $i++) {
                echo "
                                                <p class='px-2  bg-sky-blue rounded position-relative'>

                                                        $tag[$i]
                                                        <span class='position-absolute top-0 mt-1 me-4 start-100 translate-middle badge rounded-pill'><i class='i fa fa-close z-3 i-danger h6'></i></span>
                                                        </p>
                                                ";
            }
        }
        echo "
                             </div>
                             <input type='text' name='tagedit' id='tagedit' value='$row[contentTags]' hidden>
                             <input type='text' name='idedit' id='idedit' value='$_GET[editId]' hidden>
                         </div>
                         <div class='btn-group  mb-4 w-100  '>
                             <input type='radio' class='btn-check' name='publishedit' id='option1' autocomplete='off' value='0' checked />
                             <label class='btn btn-primary  ' for='option1' data-mdb-ripple-init>منتشر کنیم👍</label>
 
                             <input type='radio' class='btn-check' name='publishedit' id='option2' autocomplete='off' value='1'/>
                             <label class='btn btn-primary  ' for='option2' data-mdb-ripple-init>نه نکنیم👊</label>
                         </div>
                         <input data-mdb-ripple-init type='submit' class='btn btn-primary btn-block' value='(حدادعادل)👍ادیت👎ویرایش' />
                     </form>
                 </div>
             </div>
         </div>
     </div>";
    }
    ?>
    <div class="modal fade" id="link">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header   bg-sky-blue">
                    <h5 class="modal-title " id="exampleModalLabel">اد کن متصل کردن ها</h5>
                    <button type="button" class="btn-close ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="link.php" method="POST" class="d-flex flex-column align-items-center justify-content-center gap-3 " dir="ltr">
                        <div class="input-group">
                            <input type="url" aria-label="First name" name="href" class="form-control text-end ">
                            <span class="input-group-text bg-sky-blue">ادرس بده</span>
                        </div>
                        <div class="input-group">
                            <input type="text" aria-label="First name" name="about" class="form-control text-end ">
                            <span class="input-group-text bg-sky-blue">توضیح مختصر</span>
                        </div>
                        <div class="input-group">
                            <input type="text" aria-label="First name" name="title" class="form-control text-end ">
                            <span class="input-group-text bg-sky-blue">عنوان</span>
                        </div>
                        <div class="align-self-end ">
                            <button type="button" class="btn btn-outline-danger align-self-end " data-bs-dismiss="modal">بستن</button>
                            <input type="submit" value="💣رو من بزن تا بترکم" class="btn btn-outline-success ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header   bg-sky-blue">
                    <h5 class="modal-title " id="exampleModalLabel">ورود به بخش مدیریتی</h5>
                    <button type="button" class="btn-close ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin.php" method="GET" class="d-flex flex-column align-items-center justify-content-center gap-3 " dir="ltr">
                        <div class="input-group">
                            <input type="text" aria-label="First name" name="userName" class="form-control text-end ">
                            <span class="input-group-text bg-sky-blue">نام کاربری</span>
                        </div>
                        <div class="input-group">
                            <input type="password" aria-label="First name" name="password" class="form-control text-end ">
                            <span class="input-group-text bg-sky-blue">پسورد</span>
                        </div>
                        <div class="align-self-end ">
                            <button type="button" class="btn btn-outline-danger align-self-end " data-bs-dismiss="modal">بستن</button>
                            <input type="submit" value="ورود" class="btn btn-outline-success ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header   bg-sky-blue">
                    <h5 class="modal-title " id="exampleModalLabel">دسته بندی</h5>
                    <button type="button" class="btn-close ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center justify-content-center gap-3 " dir="ltr">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="catText" class="form-control text-end " value="جغرافیا" />
                            <label class="form-label" for="form4Example1">اد کن و حذف کن</label>
                        </div>
                        <div class="d-flex flex-column justify-content-center w-100  gap-1 overflow-y-scroll  catShow" style="height: 150px;">
                            <?php
                            $quSelectCat = "select * from category ";
                            $resualtCat = mysqli_query($link, $quSelectCat);
                            $rowCat = mysqli_fetch_array($resualtCat);
                            while ($rowCat) {
                                echo "<div class='col-12 p-1 rounded bg-sky-blue text-center catP'>$rowCat[categoryName]</div>";
                                $rowCat = mysqli_fetch_array($resualtCat);
                            }
                            ?>
                        </div>
                        <div class="d-flex align-self-end justify-content-end  w-100  gap-2 flex-wrap ">
                            <a href="insertCat.php?catName=" class="btn btn-outline-success catHref">Add(زبان بلد نیستی؟😲)</a>
                            <a href="deleteCat.php?catName=" class="btn btn-outline-danger  catHref">"Delete(میخواستی زبان یاد بگیری😏)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newAdmin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header   bg-sky-blue">
                    <h5 class="modal-title " id="exampleModalLabel">ادمین ساز</h5>
                    <button type="button" class="btn-close ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin.php" method="post" class=" d-flex flex-column align-items-center justify-content-center gap-3 " dir="ltr">
                        <div class="input-group">
                            <input type="text" aria-label="First name" name="newAdmin" class="form-control text-end " required>
                            <span class="input-group-text bg-sky-blue">نام کاربری</span>
                        </div>
                        <div class="input-group">
                            <input type="password" aria-label="First name" name="newPassword" class="form-control text-end " required>
                            <span class="input-group-text bg-sky-blue">پسورد</span>
                        </div>
                        <div class="align-self-end ">
                            <button type="button" class="btn btn-outline-danger align-self-end " data-bs-dismiss="modal">آدم حسابش نکن</button>
                            <input type="submit" value="آدم حسابش کن" class="btn btn-outline-success ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="suggestion">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header   bg-sky-blue">
                    <h5 class="modal-title " id="exampleModalLabel">چه می گویند</h5>
                    <button type="button" class="btn-close ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-100 d-flex flex-column gap-2 align-items-center p-2 rounded text-white bg-primary overflow-y-scroll " style="height: 200px;">

                        <?php
                        $link = mysqli_connect("localhost", "root", "", "blog_dbl");
                        $quSelectCat = "select * from contact_tbl";
                        $resualtCat = mysqli_query($link, $quSelectCat);
                        $row = mysqli_fetch_array($resualtCat);
                        while ($row) {
                            echo "<div class='col-12 border-3 rounded-3 p-3 bg-sky-blue' onclick='delSug($row[id],this)'>$row[text]</div>";
                            $row = mysqli_fetch_array($resualtCat);
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newText" dir="ltr">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sky-blue">
                    <button type="button" class="btn-close ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title ms-auto " id="exampleModalLabel">اد کن مطالب</h5>
                </div>
                <div class="modal-body">
                    <form class="col-12 bg-light p-2 rounded-3 " action="insertText.php" method="POST" enctype="multipart/form-data">
                        <p class="h2 bg-sky-blue text-white p-2 rounded-2 text-center ">درج مطالب</p>
                        <!-- Name input -->
                        <div class="row">
                            <div class="col-sm-7">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" name="writerNameIn" id="form4Example1" value="ناشناس" class="form-control text-end " />
                                    <label class="form-label" for="form4Example1">نام نویسنده</label>
                                </div>
                            </div>
                            <div class="col">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form4Example1" name="subjectIn" class="form-control text-end " />
                                    <label class="form-label" for="form4Example1">عنوان</label>
                                </div>
                            </div>
                        </div>

                        <select class="form-select border-1 mb-4" name="categoryIn" aria-label="Default select example">
                            <?php
                            $quSelectCat = "select * from category ";
                            $resualtCat = mysqli_query($link, $quSelectCat);
                            $rowCat = mysqli_fetch_array($resualtCat);
                            while ($rowCat) {

                                echo " <option value='$rowCat[categoryName]'>$rowCat[categoryName]</option>";
                                $rowCat = mysqli_fetch_array($resualtCat);
                            }
                            ?>
                        </select>

                        <input type="file" class="form-control mb-4 " name="fileIn" id="customFile" />

                        <div data-mdb-input-init class="form-outline mb-4">
                            <textarea class="form-control text-end " name="textIn" id="form4Example3" rows="4"></textarea>
                            <label class="form-label" for="form4Example3">مطلب</label>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-center align-content-center ">
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="tagInsert" class="form-control text-end" />
                                <label class="form-label" for="tagInsert">تگ اد کن</label>
                            </div>
                            <div class="w-100 d-flex justify-content-around  flex-wrap  gap-2" id="tagInsertAdd">

                            </div>
                            <input type="text" name="tagIn" id="tagIn" hidden>
                        </div>
                        <div class="btn-group  mb-4 w-100  ">
                            <input type="radio" class="btn-check" value="0" name="addPublish" id="addPublish1" autocomplete="off" checked />
                            <label class="btn btn-primary  " for="addPublish1" data-mdb-ripple-init>منتشر کنیم👍</label>

                            <input type="radio" class="btn-check" name="addPublish" id="addPublish2" autocomplete="off" value="1" />
                            <label class="btn btn-primary  " for="addPublish2" data-mdb-ripple-init>نه نکنیم👊</label>
                        </div>
                        <input data-mdb-ripple-init type="submit" value="اد کن داش(همچنین شما خواهر عزیز)" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="recomand">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sky-blue">
                    <h5 class="modal-title ms-auto " id="exampleModalLabel">اد کن مطالب</h5>
                    <button type="button" class="btn-close ms-0 " onclick="resetUrl()" ></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a data-mdb-tab-init class="nav-link active" id="ex1-tab-1" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">سی کو(روله _ نگاه کن🥶)</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a data-mdb-tab-init class="nav-link" id="ex1-tab-2" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">
                                نیویسین(بژی _ نوشتن💪)
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="ex1-content" role="tabpanel">

                        <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                            <div class="col-12 overflow-y-scroll d-flex flex-column p-3 bg-primary rounded gap-3 " style="height: 150px;">
                                <?php
                                if (isset($_GET['idText'])) {
                                    $quSelect = "SELECT  `idText`, `text`, `score` FROM `score_tbl` WHERE `idText`= '$_GET[idText]'";
                                    $resualt = mysqli_query($link, $quSelect);
                                    $row = mysqli_fetch_array($resualt);
                                    while ($row) {
                                        echo "   
                                            <div class='d-flex flex-column bg-sky-blue rounded p-2'>
                                            <p class='h6'>$row[text]</p>
                                            <div>";
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($row['score'] > $i) {
                                                echo "
                                                    <i class=' fa fa-star checkChange'></i>
                                                    ";
                                            } else {
                                                echo "
                                            <i class=' fa fa-star'></i>
                                            ";
                                            }
                                        }
                                        echo "
                                    </div>
                                    </div>";
                                        $row = mysqli_fetch_array($resualt);
                                    }
                                }
                                ?>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            <form method="POST" action="score.php" class="col-12 bg-light p-2 rounded-3 d-flex flex-column justify-content-center align-content-center " dir="ltr">
                                <p class="h2 bg-sky-blue text-white p-2 rounded-2 text-center ">ارسال نظر</p>
                                <!-- Name input -->
                                <input type="text" name="id" id="id" value="<?php if (isset($_GET['idText'])) {
                                                                                echo "$_GET[idText]";
                                                                            } ?>" hidden>
                                <div data-mdb-input-init class="form-outline mb-2">
                                    <textarea class="form-control text-end " id="form4Example3" name="textrec" rows="4"></textarea>
                                    <label class="form-label" for="form4Example3">مطلب</label>
                                </div>
                                <div class="d-flex align-self-lg-end align-self-start mb-2 ">
                                    <select class="star-rating" name="star">
                                        <option value="">یه نگاهی به ما کن</option>
                                        <option value="5">یاشاسین</option>
                                        <option value="4">پنجمیشم بزن</option>
                                        <option value="3">همش</option>
                                        <option value="2">خجالت بکش</option>
                                        <option value="1">بچه اصفهونی</option>
                                    </select>
                                </div>
                                <input data-mdb-ripple-init type="submit" id="enScore" class="btn btn-primary btn-block" value="یرسل(برای خوزستان⚽)">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    $query = "select * from about_tbl";
    $resualt = mysqli_query($link, $query);
    $rows = mysqli_fetch_array($resualt);
    ?>
    <div class="container-fluid p-0 m-0 bg-light">
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
                                <a class="nav-link text-white" href="about.php">درباره ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact.php">تماس با ما</a>
                            </li>
                            <?php
                            if ($_SESSION['type'] == 'admin') {
                                echo "  
                       <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle text-white ' id='navbarScrollingDropdown' data-bs-toggle='dropdown'>
                                قدرت مدیر
                            </a>
                            <ul class='dropdown-menu bg-sky-blue text-end '>
                                <li><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#newAdmin'>ادمین
                                        بساز</a></li>
                                <li><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#newText'>مطلب
                                        ساز</a></li>
                                <li><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#category'>کم کن
                                        زیاد کن دسته بندی</a></li>
                                <li><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#suggestion'>مردم در مورد ما چه می گویند</a></li>
                                <li>
                                <li><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#link'>متصل کردن ها</a></li>
                                <li>
                                    <hr class='dropdown-divider'>
                                </li>
                                ";
                                echo "
                                <li><a class='dropdown-item' href='admin.php?out=out'>شو خوش کن</a></li>
                            </ul>
                        </li>";
                            }
                            ?>
                            <li class="nav-item">
                                <button type="button" class="btn btn-outline-light " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    بخش مدیریتی
                                </button>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <div>
                <h1 class="bg-light p-2 rounded-3 my-5 Title text-center "></h1>
            </div>
        </header>
        <article class="d-flex justify-content-lg-around  justify-content-center  align-items-center my-4 flex-wrap  gap-lg-0 gap-4">
            <div class="list-group col-11 col-lg-4 align-self-start ">
                <a class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">لینک های مهم</h5>
                    </div>
                    <p class="mb-1">در زیر چند لینک مهم وجود دارد.</p>
                    <small>لینک ها</small>
                </a>
                <?php
                $quSelect = "select * from link_tbl";
                $resualt = mysqli_query($link, $quSelect);
                $row = mysqli_fetch_array($resualt);
                while ($row) {
                    if ($_SESSION['type'] == 'admin') {
                        echo " <a onclick='delLink($row[id],this)' class='list-group-item list-group-item-action'>";
                    } else {
                        echo " <a href='$row[href]' class='list-group-item list-group-item-action'>";
                    }
                    echo "
                     <div class='d-flex w-100 justify-content-between'>
                     <h5 class='mb-1'>$row[links]</h5>
                     </div>
                     <p class='mb-1'>$row[discription]</p>
                     </a>";
                    $row = mysqli_fetch_array($resualt);
                }
                ?>

            </div>
            <div class="col-11 col-lg-7 d-flex justify-content-center align-self-start   align-items-start  flex-wrap ">
                <div class="container-fluid">
                    <form action="" method="post" dir="ltr">
                        <div class="input-group mb-3">
                            <input class="btn btn-outline-info" type="submit" value="جستجو کن" />
                            <input type="text" class="form-control" placeholder="جستجو کن">
                        </div>
                    </form>
                </div>
                <div class="d-flex flex-column gap-3 pt-2  align-items-center overflow-y-scroll container-fluid " style="height: 330px;">
                    <?php
                    $quSelect = "select * from content_tbl ";
                    $resualt = mysqli_query($link, $quSelect);
                    $row = mysqli_fetch_array($resualt);
                    while ($row) {

                        $pub = ($row['contentPublish'] == '0') ? "bg-success" : "bg-danger";
                        $publish = ($row['contentPublish'] == '0') ? "منتشر شده" : "منتشر نشده";
                        $text = substr($row['contentText'], 0, 295);
                        if ($_SESSION['type'] == 'usuall' && $row['contentPublish'] == '0') {
                            echo "               <div class='card  col-12 border-x rounded-5 shadow'>
                            <div class='row g-0'>
                                <div class='col-md-4'>
                                    <img src='$row[contentFile]' class='rounded-end object-fit-cover w-100 h-100 ' alt='...'>
                                </div>
                                <div class='col-md-8'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$row[contentSub]</h5>
                                        <p class='card-text'>$text</p>
                                        <div class='d-flex gap-2 align-items-center justify-content-center flex-wrap '>
                                            <a data-mdb-ripple-init href='date.php?id=$row[contentDate]' class='h6 btn btn-primary '>
                                                $row[contentDate]</a>
                                            <a data-mdb-ripple-init href='category.php?id=$row[contentCategory]' class='h6 btn btn-primary '>
                                                $row[contentCategory]</a>
                                            <a data-mdb-ripple-init class='h6 btn btn-primary '>
                                                نویسنده:$row[contentWriterLname]</a>
                                            <a data-mdb-ripple-init href='post.php?id=$row[contentId]' class='h6 btn btn-outline-primary  py-1 rounded-4 '>بیشتر</a>
                                        </div>
                                        <div class='d-flex justify-content-around align-items-center '>
                                            <div class='col-10 d-flex p-0   gap-2 px-2 overflow-x-scroll tagPlace'>
                                            ";
                            if (!empty($row['contentTags'])) {

                                $tag =  explode("-", $row['contentTags']);
                                for ($i = 0; $i < count($tag) - 1; $i++) {
                                    echo "
                                                    <a href='tag.php?id=$tag[$i]' class='i h6 px-2  bg-sky-blue rounded position-relative'>
                                                            $tag[$i]
                                                            </a>
                                                    ";
                                }
                            }
                            echo "      
                                            </div>
                                            <i class='fa fa-file-text-o i h3' onclick='score($row[contentId])'></i>
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>";
                        } else if ($_SESSION['type'] == 'admin') {

                            echo "
                    <div class='card  col-12 border-x rounded-5 shadow'>
                    <span class='position-absolute top-0 start-50 translate-middle badge rounded-pill $pub'>
                    $publish    
                    </span>
                    <div class='row g-0'>
                        <div class='col-md-4'>
                            <i onclick='del($row[contentId])' class='i fa fa-close fa-lg z-3 position-absolute i-danger me-2 h1'></i>
                            <a href='index.php?editId=($row[contentId])&admin' class='i fa fa-edit z-3 fa-lg position-absolute start-0 ms-2  mt-1 h2'></a>
                            <img src='$row[contentFile]' class='rounded-end object-fit-cover w-100 h-100 ' alt='...'>
                        </div>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>$row[contentSub]</h5>
                                <p class='card-text'>$text</p>
                                <div class='d-flex gap-2 align-items-center justify-content-center flex-wrap '>
                                    <a data-mdb-ripple-init href='date.php?id=$row[contentDate]' class='h6 btn btn-primary '>
                                        $row[contentDate]</a>
                                    <a data-mdb-ripple-init href='category.php?id=$row[contentCategory]' class='h6 btn btn-primary '>
                                        $row[contentCategory]</a>
                                    <a data-mdb-ripple-init class='h6 btn btn-primary '>
                                        نویسنده:$row[contentWriterLname]</a>
                                    <a data-mdb-ripple-init href='post.php?id=$row[contentId]' class='h6 btn btn-outline-primary  py-1 rounded-4 '>بیشتر</a>
                                </div>
                                <div class='d-flex justify-content-around align-items-center '>
                                    <div class='col-10 d-flex p-0   gap-2 px-2 overflow-x-scroll tagPlace'>
                                    ";
                            if (!empty($row['contentTags'])) {

                                $tag =  explode("-", $row['contentTags']);
                                for ($i = 0; $i < count($tag) - 1; $i++) {
                                    echo "
                                            <a href='tag.php?id=$tag[$i]' class='i h6 px-2  bg-sky-blue rounded position-relative'>
                                                    $tag[$i]
                                                    </a>
                                            ";
                                }
                            }
                            echo "      
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                    ";
                        }
                        $row = mysqli_fetch_array($resualt);
                    }
                    ?>


                </div>
            </div>
        </article>
        <footer class="d-flex flex-column align-items-center justify-content-center bg-sky-blue p-2">
            <img src="asset/img/nav-icon.png" height="30px" alt="">
            <hr width="90%">
            <div>
                <p class="h5"><?php echo "$rows[footerText]"; ?></p>
            </div>
        </footer>
    </div>

    <script type='text/javascript' src='asset/js/star-rating.js/dist/star-rating.js'></script>
    <script src='asset/js/typeWriteInfo.js'></script>
    <script src='asset/js/typeWrite.js'></script>
    <script src='asset/js/script.js'></script>
    <script type='text/javascript' src='asset/css/js/mdb.umd.min.js'></script>
    <script src='asset/js/sweetAlert.js'></script>
    <script src='asset/js/bootstrap.js'></script>
    <script src="asset/js/insert.js"></script>
    <script>
        var stars = new StarRating('.star-rating');
        document.addEventListener('DOMContentLoaded', function() {
            <?php
            if (isset($_GET['idText'])) {
                echo "
                var myModal = new bootstrap.Modal(document.getElementById('recomand'));
                myModal.show();
                ";
            }
            ?>
            if (document.getElementById('edit')) {
                var myModal = new bootstrap.Modal(document.getElementById('edit'));
                myModal.show();
            }
        });
    </script>

    <?php

    ?>
</body>

</html>