<link rel="stylesheet" href="../assets/test-style.css">

<?php
session_start();

// Liste des questions
$test2questions = [
    	"يقوم زوجي بتوصيل الأولاد للمدارس؟",
	    "يشارك زوجي في شرح الدروس والمذاكرة للأبناء؟",
	    "يقوم زوجي بمتابعة الحالة الصحية للأبناء؟",
	    "يساعدني زوجي في الاعتناء بمظهر الأبناء ونظافتهم؟",
	    "يقوم زوجي بمشاركة الأبناء بالزيارة ومتابعة أنشطتهم المدرسية؟",
	    "يقوم زوجي بعمل خطة للأنشطة الترفيهية داخل المنزل للأبناء؟",
	    "يساعد زوجي الأبناء في تحديد هواياتهم ومهاراتهم؟",
	    "يشارك زوجي الأبناء في مناسباتهم الخاصة (النجاح- الجوائز- التفوق)؟",
	    "يضع زوجي ميثاق للأخلاق والقيم الأسرية؟",
	    "يقوم زوجي بعمل جلسات أسرية جماعية لمناقشة الموضوعات الحياتية التثقيفية؟",
	    "يقوم زوجي بتحديد غرف النوم للأبناء حسب المرحلة العمرية؟",
	    "يسعى زوجي إلى الحث على أهمية ودور أفراد الأسرة؟",
	    "يسعي زوجي لترسيخ القيم الإسلامية لدى الأبناء؟",
	    "يشارك زوجي الأبناء في مشاهدة البرامج الإعلامية الهادفة المحببة إليهم؟",
	    "يقوم زوجي بتحفيز الأبناء لممارسة الأنشطة الرياضية والترفيهية؟",
		"يقوم زوجي بشراء الملابس الصيفية والشتوية لأفراد الأسرة؟",


];

// Vérifiez si le test a commencé
if (isset($_POST['test2startTest'])) {
    $_SESSION['test2Started'] = true;
    $_SESSION['test2score'] = 0;
    $_SESSION['test2questionIndex'] = 0;
    $_SESSION['test2answers'] = [];
} else {
    // Vérifiez si le test est terminé
    if (isset($_SESSION['test2Started']) && $_SESSION['test2Started'] === true) {
        $test2questionIndex = $_SESSION['test2questionIndex'];

        // Vérifiez la réponse de l'utilisateur et attribuez des points
        if (isset($_POST['test2answer']) && ($_POST['test2answer'] === "yes" || $_POST['test2answer'] === "no")) {
            $_SESSION['test2answers'][$test2questionIndex] = $_POST['test2answer'];
            $test2questionIndex++;

            // Passez à la prochaine question
            if ($test2questionIndex < count($test2questions)) {
                $_SESSION['test2questionIndex'] = $test2questionIndex;
            } else {
                // Le test est terminé, calculez le score en pourcentage
                $test2totalScore = array_sum(array_map(function ($test2answer) {
                    return $test2answer === "yes" ? 1 : 0;
                }, $_SESSION['test2answers']));

                $test2totalQuestions = count($test2questions);

                // Calculez le score en pourcentage
                $test2scorePercentage = ($test2totalScore * 100) / $test2totalQuestions;

                $_SESSION['test2score'] = round($test2scorePercentage, 0); // Arrondi sans décimales

                // Déterminez le message en fonction du score en pourcentage
                if ($test2scorePercentage < 50) {
                    $test2message = "ضعيف جدا";
                } elseif ($test2scorePercentage >= 50 && $test2scorePercentage < 60) {
                    $test2message = "ضعيف";
                } elseif ($test2scorePercentage >= 60 && $test2scorePercentage < 70) {
                    $test2message = "مقبول";
                } elseif ($test2scorePercentage >= 70 && $test2scorePercentage < 80) {
                    $test2message = "جيد";
                } elseif ($test2scorePercentage >= 80 && $test2scorePercentage < 90) {
                    $test2message = "جيد جدا";
                } elseif ($test2scorePercentage >= 90 && $test2scorePercentage <= 100) {
                    $test2message = "ممتاز";
                }

                $_SESSION['test2message'] = $test2message;
                $_SESSION['test2testComplete'] = true;
            }
        }

        // Gestion du redémarrage du test
        if (isset($_POST['test2restartTest'])) {
            unset($_SESSION['test2Started']);
            unset($_SESSION['test2score']);
            unset($_SESSION['test2questionIndex']);
            unset($_SESSION['test2answers']);
            unset($_SESSION['test2testComplete']);
            header('Location: http://localhost/khairakom-tests/tests-files/test2.php');
            exit;
        }
    }
}
?>

<div id="app">
    <img id="test2-image" src="" width="300" height="auto">

<?php if (!isset($_SESSION['test2Started']) || $_SESSION['test2Started'] === false) : ?>

        <br><br>
        <h4>هذا الاختبار يحتوي على 16 سؤال بسيط</h4> <br>
        <h4>الرجاء الإجابة بنعم أو لا على كل سؤال</h4> <br>
        <form method="POST">
            <input type="submit" name="test2startTest" value="ابدئي الاختبار" id="start-button" class="boutons">
        </form>
        <script>
            document.getElementById("test2-image").src = "../images/t2.jpg";
        </script>
    <?php elseif (isset($_SESSION['test2testComplete']) && $_SESSION['test2testComplete'] === true) : ?>
        <h3>الف مبروك! لقد أكملت الإختبار</h3>
        <h4>تقييم زوجك في هذا الإختبار هو :</h4>
        <h3 style="color: blue !important;"> <?php echo $_SESSION['test2score']; ?>%<span> / </span><?php echo $_SESSION['test2message']; ?></h3>

        <form method="POST" action=" http://localhost/khairakom-tests/tests-files/test2.php">
            <input type="submit" name="test2restartTest" value="اعادة الإختبار" id="restart-button" class="boutons">
        </form>

        <!-- Mettre à jour l'image à la fin du test -->
        <script>
            document.getElementById("test2-image").src = "../images/congratulation.jpg";
        </script>
    <?php else : ?>
        <div id="test2question">
            <!-- Afficher la progression des questions -->
            <h4> السؤال : <?php echo ($_SESSION['test2questionIndex'] + 1) . "/" . count($test2questions); ?></h4>

            <h4><?php echo $test2questions[$_SESSION['test2questionIndex']]; ?></h4>

            <form id="test2question-form" method="POST">
                <label class="radio-label yes">
                    <input type="radio" name="test2answer" value="yes" onclick="test2submitForm()">
                    نعم
                </label>
                <label class="radio-label no">
                    <input type="radio" name="test2answer" value="no" onclick="test2submitForm()">
                    لا
                </label>
            </form>
        </div>
        <script>
            function test2submitForm() {
                document.getElementById("test2question-form").submit();
            }
        </script>
    <?php endif; ?>
</div>
