<link rel="stylesheet" href="../assets/test-style.css">

<?php
session_start();

// Liste des questions
$test4questions = [
    "يشارك زوجي أهلي في المناسبات العائلية والاجتماعية؟",
    "يبدي زوجي الاحترام والتقدير لأهلي؟",
    "يتفهم ويحترم زوجي العادات والتقاليد الخاصة بي؟",
	"يتبادل زوجي الزيارات لأهلي في المناسبات (عيادة المريض- السفر- نجاح أحد الأبناء – غيرها).؟",
    "يتبادل زوجي الزيارات مع الجيران ومشاركتهم المناسبات الاجتماعية؟",
    "يساعدني زوجي على وجود صديقات في حياتي؟",
    "يرافقني زوجي في الذهاب للمسجد والدورات والمحاضرات التثقيفية؟",
    "يشاركني زوجي في مشاهدة البرامج الإعلامية الهادفة؟",
    "يتواصل زوجي هاتفياً بأقاربي في المناسبات الاجتماعية؟",
    "يقوم زوجي بإعداد خطة لقضاء الاجازة السنوية؟",
    "يسعى زوجي لتقوية صلة الرحم بدعوة أهله وأقاربه لحضور لقاء أسري في المنزل؟",
    "يحثني زوجي على التواصل مع الجيران وتقديم المأكولات والهدايا؟",
    "يشجعني زوجي على استخدام الوسائل الإلكترونية للتواصل الاجتماعي؟"
 

];

// Vérifiez si le test a commencé
if (isset($_POST['test4startTest'])) {
    $_SESSION['test4Started'] = true;
    $_SESSION['test4score'] = 0;
    $_SESSION['test4questionIndex'] = 0;
    $_SESSION['test4answers'] = [];
} else {
    // Vérifiez si le test est terminé
    if (isset($_SESSION['test4Started']) && $_SESSION['test4Started'] === true) {
        $test4questionIndex = $_SESSION['test4questionIndex'];

        // Vérifiez la réponse de l'utilisateur et attribuez des points
        if (isset($_POST['test4answer']) && ($_POST['test4answer'] === "yes" || $_POST['test4answer'] === "no")) {
            $_SESSION['test4answers'][$test4questionIndex] = $_POST['test4answer'];
            $test4questionIndex++;

            // Passez à la prochaine question
            if ($test4questionIndex < count($test4questions)) {
                $_SESSION['test4questionIndex'] = $test4questionIndex;
            } else {
                // Le test est terminé, calculez le score en pourcentage
                $test4totalScore = array_sum(array_map(function ($test4answer) {
                    return $test4answer === "yes" ? 1 : 0;
                }, $_SESSION['test4answers']));

                $test4totalQuestions = count($test4questions);

                // Calculez le score en pourcentage
                $test4scorePercentage = ($test4totalScore * 100) / $test4totalQuestions;

                $_SESSION['test4score'] = round($test4scorePercentage, 0); // Arrondi sans décimales

                // Déterminez le message en fonction du score en pourcentage
                if ($test4scorePercentage < 50) {
                    $test4message = "ضعيف جدا";
                } elseif ($test4scorePercentage >= 50 && $test4scorePercentage < 60) {
                    $test4message = "ضعيف";
                } elseif ($test4scorePercentage >= 60 && $test4scorePercentage < 70) {
                    $test4message = "مقبول";
                } elseif ($test4scorePercentage >= 70 && $test4scorePercentage < 80) {
                    $test4message = "جيد";
                } elseif ($test4scorePercentage >= 80 && $test4scorePercentage < 90) {
                    $test4message = "جيد جدا";
                } elseif ($test4scorePercentage >= 90 && $test4scorePercentage <= 100) {
                    $test4message = "ممتاز";
                }

                $_SESSION['test4message'] = $test4message;
                $_SESSION['test4testComplete'] = true;
            }
        }

        // Gestion du redémarrage du test
        if (isset($_POST['test4restartTest'])) {
            unset($_SESSION['test4Started']);
            unset($_SESSION['test4score']);
            unset($_SESSION['test4questionIndex']);
            unset($_SESSION['test4answers']);
            unset($_SESSION['test4testComplete']);
            header('Location: http://localhost/khairakom-tests/tests-files/test4.php');
            exit;
        }
    }
}
?>

<div id="app">
    <img id="test4-image" src="" width="300" height="auto">

<?php if (!isset($_SESSION['test4Started']) || $_SESSION['test4Started'] === false) : ?>

        <br><br>
        <h4>هذا الاختبار يحتوي على 13 سؤال بسيط</h4> <br>
        <h4>الرجاء الإجابة بنعم أو لا على كل سؤال</h4> <br>
        <form method="POST">
            <input type="submit" name="test4startTest" value="ابدئي الاختبار" id="start-button" class="boutons">
        </form>
        <script>
            document.getElementById("test4-image").src = "../images/t4.jpg";
        </script>
    <?php elseif (isset($_SESSION['test4testComplete']) && $_SESSION['test4testComplete'] === true) : ?>
        <h3>الف مبروك! لقد أكملت الإختبار</h3>
        <h4>تقييم زوجك في هذا الإختبار هو :</h4>
        <h3 style="color: blue !important;"> <?php echo $_SESSION['test4score']; ?>%<span> / </span><?php echo $_SESSION['test4message']; ?></h3>

        <form method="POST" action=" http://localhost/khairakom-tests/tests-files/test4.php">
            <input type="submit" name="test4restartTest" value="اعادة الإختبار" id="restart-button" class="boutons">
        </form>

        <!-- Mettre à jour l'image à la fin du test -->
        <script>
            document.getElementById("test4-image").src = "../images/congratulation.jpg";
        </script>
    <?php else : ?>
        <div id="test4question">
            <!-- Afficher la progression des questions -->
            <h4> السؤال : <?php echo ($_SESSION['test4questionIndex'] + 1) . "/" . count($test4questions); ?></h4>

            <h4><?php echo $test4questions[$_SESSION['test4questionIndex']]; ?></h4>

            <form id="test4question-form" method="POST">
                <label class="radio-label yes">
                    <input type="radio" name="test4answer" value="yes" onclick="test4submitForm()">
                    نعم
                </label>
                <label class="radio-label no">
                    <input type="radio" name="test4answer" value="no" onclick="test4submitForm()">
                    لا
                </label>
            </form>
        </div>
        <script>
            function test4submitForm() {
                document.getElementById("test4question-form").submit();
            }
        </script>
    <?php endif; ?>
</div>
