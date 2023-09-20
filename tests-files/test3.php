<link rel="stylesheet" href="../assets/test-style.css">

<?php
session_start();

// Liste des questions
$test3questions = [
    "يقوم زوجي بتحفيز الأبناء للمشاركة في المسابقات المدرسية والاجتماعية؟",
    "يقوم زوجي بدفع المصاريف المدرسية للأبناء؟",
    "يقوم زوجي بدفع مصاريف الدروس الخصوصية للأبناء؟",
    "يقوم زوجي بدفع مصاريف لعلاج أفراد الأسرة؟",
    "يقوم زوجي بتغطية كافة مصاريف شراء الطعام والشراب للأسرة؟",
	"يقوم زوجي بشراء الهدايا في المناسبات الخاصة لأفراد الأسرة؟",
	"يقوم زوجي بشراء الأطعمة الجاهزة عند الحاجة لذلك؟",
	"يقوم زوجي بشراء الألعاب الذكية الترفيهية للأبناء؟",
	"يقوم زوجي بشراء المتطلبات الخاصة والشخصية الضرورية بالنسبة لي؟",
	"يقوم زوجي بوضع ميزانية لشراء الهدايا لأهلي في مناسبتهم الخاصة؟",
	"يقوم زوجي بإيداع مبالغ مالية في حسابي البنكي الخاص؟",
	"يسعى زوجي لادخار جزء من راتبه الشهري لتأمين المستقبل؟",
	"يقوم زوجي بحجز رحلات للحج والعمرة لأفراد الأسرة؟",
	"يقوم زوجي بشراء جوائز للمسابقات المنزلية مثل حفظ القرآن – الأحاديث النبوية؟"
];

// Vérifiez si le test a commencé
if (isset($_POST['test3startTest'])) {
    $_SESSION['test3Started'] = true;
    $_SESSION['test3score'] = 0;
    $_SESSION['test3questionIndex'] = 0;
    $_SESSION['test3answers'] = [];
} else {
    // Vérifiez si le test est terminé
    if (isset($_SESSION['test3Started']) && $_SESSION['test3Started'] === true) {
        $test3questionIndex = $_SESSION['test3questionIndex'];

        // Vérifiez la réponse de l'utilisateur et attribuez des points
        if (isset($_POST['test3answer']) && ($_POST['test3answer'] === "yes" || $_POST['test3answer'] === "no")) {
            $_SESSION['test3answers'][$test3questionIndex] = $_POST['test3answer'];
            $test3questionIndex++;

            // Passez à la prochaine question
            if ($test3questionIndex < count($test3questions)) {
                $_SESSION['test3questionIndex'] = $test3questionIndex;
            } else {
                // Le test est terminé, calculez le score en pourcentage
                $test3totalScore = array_sum(array_map(function ($test3answer) {
                    return $test3answer === "yes" ? 1 : 0;
                }, $_SESSION['test3answers']));

                $test3totalQuestions = count($test3questions);

                // Calculez le score en pourcentage
                $test3scorePercentage = ($test3totalScore * 100) / $test3totalQuestions;

                $_SESSION['test3score'] = round($test3scorePercentage, 0); // Arrondi sans décimales

                // Déterminez le message en fonction du score en pourcentage
                if ($test3scorePercentage < 50) {
                    $test3message = "ضعيف جدا";
                } elseif ($test3scorePercentage >= 50 && $test3scorePercentage < 60) {
                    $test3message = "ضعيف";
                } elseif ($test3scorePercentage >= 60 && $test3scorePercentage < 70) {
                    $test3message = "مقبول";
                } elseif ($test3scorePercentage >= 70 && $test3scorePercentage < 80) {
                    $test3message = "جيد";
                } elseif ($test3scorePercentage >= 80 && $test3scorePercentage < 90) {
                    $test3message = "جيد جدا";
                } elseif ($test3scorePercentage >= 90 && $test3scorePercentage <= 100) {
                    $test3message = "ممتاز";
                }

                $_SESSION['test3message'] = $test3message;
                $_SESSION['test3testComplete'] = true;
            }
        }

        // Gestion du redémarrage du test
        if (isset($_POST['test3restartTest'])) {
            unset($_SESSION['test3Started']);
            unset($_SESSION['test3score']);
            unset($_SESSION['test3questionIndex']);
            unset($_SESSION['test3answers']);
            unset($_SESSION['test3testComplete']);
            header('Location: http://localhost/khairakom-tests/tests-files/test3.php');
            exit;
        }
    }
}
?>

<div id="app">
    <img id="test3-image" src="" width="300" height="auto">

<?php if (!isset($_SESSION['test3Started']) || $_SESSION['test3Started'] === false) : ?>

        <br><br>
        <h4>هذا الاختبار يحتوي على 14 أسئلة بسيطة</h4> <br>
        <h4>الرجاء الإجابة بنعم أو لا على كل سؤال</h4> <br>
        <form method="POST">
            <input type="submit" name="test3startTest" value="ابدئي الاختبار" id="start-button" class="boutons">
        </form>
        <script>
            document.getElementById("test3-image").src = "../images/t3.jpg";
        </script>
    <?php elseif (isset($_SESSION['test3testComplete']) && $_SESSION['test3testComplete'] === true) : ?>
        <h3>الف مبروك! لقد أكملت الإختبار</h3>
        <h4>تقييم زوجك في هذا الإختبار هو :</h4>
        <h3 style="color: blue !important;"> <?php echo $_SESSION['test3score']; ?>%<span> / </span><?php echo $_SESSION['test3message']; ?></h3>

        <form method="POST" action=" http://localhost/khairakom-tests/tests-files/test3.php">
            <input type="submit" name="test3restartTest" value="اعادة الإختبار" id="restart-button" class="boutons">
        </form>

        <!-- Mettre à jour l'image à la fin du test -->
        <script>
            document.getElementById("test3-image").src = "../images/congratulation.jpg";
        </script>
    <?php else : ?>
        <div id="test3question">
            <!-- Afficher la progression des questions -->
            <h4> السؤال : <?php echo ($_SESSION['test3questionIndex'] + 1) . "/" . count($test3questions); ?></h4>

            <h4><?php echo $test3questions[$_SESSION['test3questionIndex']]; ?></h4>

            <form id="test3question-form" method="POST">
                <label class="radio-label yes">
                    <input type="radio" name="test3answer" value="yes" onclick="test3submitForm()">
                    نعم
                </label>
                <label class="radio-label no">
                    <input type="radio" name="test3answer" value="no" onclick="test3submitForm()">
                    لا
                </label>
            </form>
        </div>
        <script>
            function test3submitForm() {
                document.getElementById("test3question-form").submit();
            }
        </script>
    <?php endif; ?>
</div>
