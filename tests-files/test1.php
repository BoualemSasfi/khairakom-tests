<link rel="stylesheet" href="../assets/test-style.css">

<?php
session_start();

// Liste des questions
$test1questions = [
    "-يساعد زوجي في أعمال النظافة المنزلية؟",
    "-يساعد زوجي في غسيل الأطباق والأواني المنزلية؟",
    "-يساعد زوجي في إعداد وطهي الطعام؟",
    "-يساعد زوجي في ترتيب وتحضير الطعام على المائدة؟",
    "-يساعد زوجي في ترتيب الأثاث المنزلي بشكل يومي؟",
    "-يقوم زوجي بتصليح وصيانة الأشياء التالفة في المنزل؟",
    "-يقوم زوجي بتحديث وتجديد الدهانات والديكور والأثاث المنزلي؟",
    "-يساعد زوجي في غسل وكي الملابس وخياطة ما يستلزم منها؟",
    "-يشارك زوجي في أعمال التجهيز والترتيب للحفلات والمناسبات المنزلية؟"
];

// Vérifiez si le test a commencé
if (isset($_POST['test1startTest'])) {
    $_SESSION['test1Started'] = true;
    $_SESSION['test1score'] = 0;
    $_SESSION['test1questionIndex'] = 0;
    $_SESSION['test1answers'] = [];
} else {
    // Vérifiez si le test est terminé
    if (isset($_SESSION['test1Started']) && $_SESSION['test1Started'] === true) {
        $test1questionIndex = $_SESSION['test1questionIndex'];

        // Vérifiez la réponse de l'utilisateur et attribuez des points
        if (isset($_POST['test1answer']) && ($_POST['test1answer'] === "yes" || $_POST['test1answer'] === "no")) {
            $_SESSION['test1answers'][$test1questionIndex] = $_POST['test1answer'];
            $test1questionIndex++;

            // Passez à la prochaine question
            if ($test1questionIndex < count($test1questions)) {
                $_SESSION['test1questionIndex'] = $test1questionIndex;
            } else {
                // Le test est terminé, calculez le score en pourcentage
                $test1totalScore = array_sum(array_map(function ($test1answer) {
                    return $test1answer === "yes" ? 1 : 0;
                }, $_SESSION['test1answers']));

                $test1totalQuestions = count($test1questions);

                // Calculez le score en pourcentage
                $test1scorePercentage = ($test1totalScore * 100) / $test1totalQuestions;

                $_SESSION['test1score'] = round($test1scorePercentage, 0); // Arrondi sans décimales

                // Déterminez le message en fonction du score en pourcentage
                if ($test1scorePercentage < 50) {
                    $test1message = "ضعيف جدا";
                } elseif ($test1scorePercentage >= 50 && $test1scorePercentage < 60) {
                    $test1message = "ضعيف";
                } elseif ($test1scorePercentage >= 60 && $test1scorePercentage < 70) {
                    $test1message = "مقبول";
                } elseif ($test1scorePercentage >= 70 && $test1scorePercentage < 80) {
                    $test1message = "جيد";
                } elseif ($test1scorePercentage >= 80 && $test1scorePercentage < 90) {
                    $test1message = "جيد جدا";
                } elseif ($test1scorePercentage >= 90 && $test1scorePercentage <= 100) {
                    $test1message = "ممتاز";
                }

                $_SESSION['test1message'] = $test1message;
                $_SESSION['test1testComplete'] = true;
            }
        }

        // Gestion du redémarrage du test
        if (isset($_POST['test1restartTest'])) {
            unset($_SESSION['test1Started']);
            unset($_SESSION['test1score']);
            unset($_SESSION['test1questionIndex']);
            unset($_SESSION['test1answers']);
            unset($_SESSION['test1testComplete']);
            header('Location: http://localhost/khairakom-tests/tests-files/test1.php');
            exit;
        }
    }
}
?>

<div id="app">
    <img id="test1-image" src="" width="300" height="auto">

<?php if (!isset($_SESSION['test1Started']) || $_SESSION['test1Started'] === false) : ?>

        <br><br>
        <h4>هذا الاختبار يحتوي على 9 أسئلة بسيطة</h4> <br>
        <h4>الرجاء الإجابة بنعم أو لا على كل سؤال</h4> <br>
        <form method="POST">
            <input type="submit" name="test1startTest" value="ابدئي الاختبار" id="start-button" class="boutons">
        </form>
        <script>
            document.getElementById("test1-image").src = "../images/t1.jpg";
        </script>
    <?php elseif (isset($_SESSION['test1testComplete']) && $_SESSION['test1testComplete'] === true) : ?>
        <h3>الف مبروك! لقد أكملت الإختبار</h3>
        <h4>تقييم زوجك في هذا الإختبار هو :</h4>
        <h3 style="color: blue !important;"> <?php echo $_SESSION['test1score']; ?>%<span> / </span><?php echo $_SESSION['test1message']; ?></h3>

        <form method="POST" action="http://localhost/khairakom-tests/tests-files/test1.php">
            <input type="submit" name="test1restartTest" value="اعادة الإختبار" id="restart-button" class="boutons">
        </form>

        <!-- Mettre à jour l'image à la fin du test -->
        <script>
            document.getElementById("test1-image").src = "../images/congratulation.jpg";
        </script>
    <?php else : ?>
        <div id="test1question">
            <!-- Afficher la progression des questions -->
            <h4> السؤال : <?php echo ($_SESSION['test1questionIndex'] + 1) . "/" . count($test1questions); ?></h4>

            <h4><?php echo $test1questions[$_SESSION['test1questionIndex']]; ?></h4>

            <form id="test1question-form" method="POST">
                <label class="radio-label yes">
                    <input type="radio" name="test1answer" value="yes" onclick="test1submitForm()">
                    نعم
                </label>
                <label class="radio-label no">
                    <input type="radio" name="test1answer" value="no" onclick="test1submitForm()">
                    لا
                </label>
            </form>
        </div>
        <script>
            function test1submitForm() {
                document.getElementById("test1question-form").submit();
            }
        </script>
    <?php endif; ?>
</div>




<style>

</style>