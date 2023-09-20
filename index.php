<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHAIRAKOM-TESTS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- bootstrap icons Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    
<div id="app">
    <div class="container-fluid">

        <div class="row" style="margin-top: 100px;text-align:center;padding:20px;">
            <hr>
            <h1 style="font-size: 50px; padding-bottom:20px;">تقييم الزوج</h1>
            <hr>
        </div>

        <div class="row">

            <div class="col">
                <h1 style="margin:20px;">الاختبار الأول</h1>
                <img src="images/t1.jpg" style="height: 400px;width:auto;">
                <br>
                    <?php
                    if (isset($_SESSION['test1testComplete']) && $_SESSION['test1testComplete'] === true) { ?>
                    <a class="btn btn-success" href="tests-files/test1.php"> اعادة الاختبار </a>
                    <?php }; ?>

                    <?php 
                    if (isset($_SESSION['test1testComplete']) && $_SESSION['test1testComplete'] === false) { ?>
                    <a class="btn btn-success" href="tests-files/test1.php"> ابدئي الاختبار </a>
                    <?php }; ?>

                <br>
                <?php
                    if (isset($_SESSION['test1testComplete']) && $_SESSION['test1testComplete'] === true) { ?>
                    <h1 class="icon"><i class="bi bi-check-circle"></i></h1>
                    <h3 class="result">لقد أكملت الإختبار الأول</h3>
                    <h3 class="result">تقييم زوجك في هذا الإختبار هو</h3>
                    <h3 class="result" style="color: blue !important;"> 
                    <?php echo $_SESSION['test1score']; ?> % <span> / </span> <?php echo $_SESSION['test1message']; ?></h3>
                    <?php }; ?>

            </div>

            <div class="col">
                <h1 style="margin:20px;">الاختبار الثاني</h1>
                <img src="images/t2.jpg" style="height: 400px;width:auto;">
                <br>
                <?php
                    if (isset($_SESSION['test2testComplete']) && $_SESSION['test2testComplete'] === true) { ?>
                    <a class="btn btn-success" href="tests-files/test2.php"> اعادة الاختبار </a>
                    <?php }; ?>

                    <?php 
                    if (isset($_SESSION['test2testComplete']) && $_SESSION['test2testComplete'] === false) { ?>
                    <a class="btn btn-success" href="tests-files/test2.php"> ابدئي الاختبار </a>
                    <?php }; ?>

                <br>
                <?php
                    if (isset($_SESSION['test2testComplete']) && $_SESSION['test2testComplete'] === true) { ?>
                    <h1 class="icon"><i class="bi bi-check-circle"></i></h1>
                    <h3 class="result">لقد أكملت الإختبار الثاني</h3>
                    <h3 class="result">تقييم زوجك في هذا الإختبار هو</h3>
                    <h3 class="result" style="color: blue !important;"> 
                    <?php echo $_SESSION['test2score']; ?> % <span> / </span> <?php echo $_SESSION['test2message']; ?></h3>
                    <?php }; ?>
                    
            </div>

            <div class="col">
                <h1 style="margin:20px;">الاختبار الثالث</h1>
                <img src="images/t3.jpg" style="height: 400px;width:auto;font-weight: bold;">
                <br>
                    <?php
                    if (isset($_SESSION['test3testComplete']) && $_SESSION['test3testComplete'] === true) { ?>
                    <a class="btn btn-success" href="tests-files/test3.php"> اعادة الاختبار </a>
                    <?php }; ?>

                    <?php 
                    if (isset($_SESSION['test3testComplete']) && $_SESSION['test3testComplete'] === false) { ?>
                    <a class="btn btn-success" href="tests-files/test3.php"> ابدئي الاختبار </a>
                    <?php }; ?>

                <br>
                <?php
                    if (isset($_SESSION['test3testComplete']) && $_SESSION['test3testComplete'] === true) { ?>
                    <h1 class="icon"><i class="bi bi-check-circle"></i></h1>
                    <h3 class="result">لقد أكملت الإختبار الثالث</h3>
                    <h3 class="result">تقييم زوجك في هذا الإختبار هو</h3>
                    <h3 class="result" style="color: blue !important;"> 
                    <?php echo $_SESSION['test3score']; ?> % <span> / </span> <?php echo $_SESSION['test3message']; ?></h3>
                    <?php }; ?>
                    
            </div>

            <div class="col">
                <h1 style="margin:20px;">الاختبار الرابع</h1>
                <img src="images/t4.jpg" style="height: 400px;width:auto;">
                <br>
                <?php
                    if (isset($_SESSION['test4testComplete']) && $_SESSION['test4testComplete'] === true) { ?>
                    <a class="btn btn-success" href="tests-files/test4.php"> اعادة الاختبار </a>
                    <?php }; ?>

                    <?php 
                    if (isset($_SESSION['test4testComplete']) && $_SESSION['test4testComplete'] === false) { ?>
                    <a class="btn btn-success" href="tests-files/test4.php"> ابدئي الاختبار </a>
                    <?php }; ?>

                <br>
                <?php
                    if (isset($_SESSION['test4testComplete']) && $_SESSION['test4testComplete'] === true) { ?>
                    <h1 class="icon"><i class="bi bi-check-circle"></i></h1>
                    <h3 class="result">لقد أكملت الإختبار الرابع</h3>
                    <h3 class="result">تقييم زوجك في هذا الإختبار هو</h3>
                    <h3 class="result" style="color: blue !important;"> 
                    <?php echo $_SESSION['test4score']; ?> % <span> / </span> <?php echo $_SESSION['test4message']; ?></h3>
                    <?php }; ?>
                  
            </div>

            <div class="col">
                <h1 style="margin:20px;">الاختبار الخامس</h1>
                <img src="images/t5.jpg" style="height: 400px;width:auto;">
                <br>
                <?php
                    if (isset($_SESSION['test5testComplete']) && $_SESSION['test5testComplete'] === true) { ?>
                    <a class="btn btn-success" href="tests-files/test5.php"> اعادة الاختبار </a>
                    <?php }; ?>

                    <?php 
                    if (isset($_SESSION['test5testComplete']) && $_SESSION['test5testComplete'] === false) { ?>
                    <a class="btn btn-success" href="tests-files/test5.php"> ابدئي الاختبار </a>
                    <?php }; ?>

                <br>
                <?php
                    if (isset($_SESSION['test5testComplete']) && $_SESSION['test5testComplete'] === true) { ?>
                    <h1 class="icon"><i class="bi bi-check-circle"></i></h1>
                    <h3 class="result">لقد أكملت الإختبار الخامس</h3>
                    <h3 class="result">تقييم زوجك في هذا الإختبار هو</h3>
                    <h3 class="result" style="color: blue !important;"> 
                    <?php echo $_SESSION['test5score']; ?> % <span> / </span> <?php echo $_SESSION['test5message']; ?></h3>
                    <?php }; ?>
                  
            </div>

        </div>
        <hr>
        <div class="row" style="text-align:center;padding:20px;">
            <h1 style="font-size: 50px; padding-bottom:20px;"> النتائج </h1>
            <hr>
        </div>
    </div>
    <div class="container">


        <div class="row">
            <div class="col" style="padding-bottom: 100px;font-size:25px;">
<?php

$calculatedscore = ($_SESSION['test1score']+$_SESSION['test2score']+$_SESSION['test3score']+$_SESSION['test4score']+$_SESSION['test5score'])/5;
        $t1 = $_SESSION['test1score'];
        $t2 = $_SESSION['test2score'];
	    $t3 = $_SESSION['test3score'];
		$t4 = $_SESSION['test4score'];
		$t5 = $_SESSION['test5score'];
		$tglobale = $calculatedscore;
        $c1 = $_SESSION['test1message'];
        $c2 = $_SESSION['test2message'];
	    $c3 = $_SESSION['test3message'];
		$c4 = $_SESSION['test4message'];
		$c5 = $_SESSION['test5message'];
		$cglobale =  'لا توجد ملاحظات , حاول اصلاح ما ينقصك لتكون زوجا مثاليا لزوجتك';
//         echo "la ligne avec l'ID $id_a_recuperer à été trouvée.";
?>

<br>
<h5>المشاركة في الأعمال المنزلية : <span class='comment' style="color:#056CF2;"><?php echo $c1; ?></span></h5>
<div class="progress-container">
    <div class="progress-bar" style="animation: fill1 2s linear forwards;    background-color: #056CF2;">
        <style>@keyframes fill1 { from { width: 0;} to {width: <?php echo $t1; ?>%;}}</style>
        <div class="progress-text"><?php echo $t1; ?>%</div>
    </div>
</div>
<br>

<br>
<h5>المشاركة في تربية الأبناء : <span class='comment' style="color:#F2B705"><?php echo $c2; ?></span></h5>
<div class="progress-container">
    <div class="progress-bar" style="animation: fill2 2s linear forwards;    background-color: #F2B705">
        <style>@keyframes fill2 { from { width: 0;} to {width: <?php echo $t2; ?>%;}}</style>
        <div class="progress-text"><?php echo $t2; ?>%</div>
    </div>
</div>
<br>

<br>
<h5>المشاركة في النفقات الأسرية : <span class='comment' style="color:#038C73;"><?php echo $c3; ?></span></h5>
<div class="progress-container">
    <div class="progress-bar" style="animation: fill3 2s linear forwards;    background-color: #038C73;">
        <style>@keyframes fill3 { from { width: 0;} to {width: <?php echo $t3; ?>%;}}</style>
        <div class="progress-text"><?php echo $t3; ?>%</div>
    </div>
</div>
<br>

<br>
<h5>التوافق الإجتماعي : <span class='comment' style="color:#A0A603;"><?php echo $c4; ?></span></h5>
<div class="progress-container">
    <div class="progress-bar" style="animation: fill4 2s linear forwards;    background-color: #A0A603;">
        <style>@keyframes fill4 { from { width: 0;} to {width: <?php echo $t4; ?>%;}}</style>
        <div class="progress-text"><?php echo $t4; ?>%</div>
    </div>
</div>
<br>

<br>
<h5>التوافق العاطفي : <span class='comment' style="color:#F24141;"><?php echo $c5; ?></span></h5>
<div class="progress-container">
    <div class="progress-bar" style="animation: fill5 2s linear forwards;    background-color: #F24141;">
        <style>@keyframes fill5 { from { width: 0;} to {width: <?php echo $t5; ?>%;}}</style>
        <div class="progress-text"><?php echo $t5; ?>%</div>
    </div>
</div>
<br>
<hr>
<br>
<h3>الإجمالي : </h3>
<div class="progress-container">
    <div class="progress-bar" style="animation: fill6 2s linear forwards;    background-color: #0C1726;">
        <style>@keyframes fill6 { from { width: 0;} to {width: <?php echo $tglobale; ?>%;}}</style>
        <div class="progress-text"><?php echo $tglobale; ?>%</div>
    </div>
</div>
<h5 style="color:#0C1726;"><?php echo $cglobale; ?></h5>



            </div>
        </div>

    </div>


    </div>

<style>
    #app{
        font-family: 'Cairo', sans-serif;
        background-color: #fff;
    }
    .col{
        margin-top: 20px;
        margin-bottom: 20px;
        text-align:center;
    }
    .btn{
        font-size: 40px;
        margin:20px;
        padding: 10px 50px;
        border-radius: 50px;
    }
    img{
        border-radius: 20px;
    }
    .result{
    font-family: "cairo",Sans-Serif;
    font-size: 1.4em;
    line-height: 40px;
    text-align: center;
	color: #28C28D;
}
    .icon{
    line-height: 40px;
    text-align: center;
	color: #28C28D;
}

.progress-container {
    width: 100%;
    background-color: #ccc;
    border-radius: 4px;
    padding: 3px;
}

.progress-bar {
    width: 0;
    height: 30px;
    border-radius: 4px;
    position: relative;
}

.progress-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-70%, -50%);
    color: white;
}
h5{
	font-family: "cairo",Sans-Serif;
    font-size: 30px;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
