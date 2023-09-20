<link rel="stylesheet" href="../assets/test-style.css">

<?php
session_start();

// Liste des questions
$test5questions = [
    "يعتذر زوجي عندما يخطئ في حقي؟",
    "يبادر زوجي بالاتصال في حال سفره للاطمئنان علينا؟",
    "يشاركني زوجي في اتخاذ القرارات الخاصة بالأسرة؟",
    "يعمل زوجي على إرضائي عندما أكون غاضبة؟",
    "يسعى زوجي لإسعادي عند ممارسة العلاقة الخاصة؟",
    "يحرص زوجي على عمل الأشياء التي تجلب لي السعادة؟",
    "يسعى زوجي لتنفيذ طلباتي بسرعة وعدم تأجيلها؟",
    "أجد الدعم والمساندة من زوجي عند تعرضي للأزمات؟",
    "يختار زوجي الأوقات المناسبة عند الحديث معي؟",
    "يناقشني زوجي باهتمام واحترام أمام الأبناء؟",
    "يحرص زوجي على أداء حقوقي ولو كانت تتعارض مع رغباته؟",
    "يتناقش معي زوجي في حياتنا الجنسية؟",
    "يشاركني زوجي في وضع استراتيجية واضحة لتربية الأبناء؟",
    "يتجاذب زوجي أطراف الحديث معي في مناقشة المشكلات الأسرية؟",
    "يحرص زوجي على ادخال البهجة والسرور على الأسرة؟",
    "يستشيرني زوجي في أوجه إنفاق الميزانية الشهرية؟",
    "يتفاخر ويمدحني زوجي أمام الأهل والأصدقاء؟",
    "يرافقني زوجي معه في الزيارات العائلية للأهل والأصدقاء؟",
    "يسعى زوجي لتقارب وجهات النظر معي في مناقشة الأمور الحياتية؟",
    "يسعى زوجي بشكل مستمر للتعبير عن حبه لي؟",
    "يبدي زوجي حزنه عند مرضي ويساعدني ويقف بجانبي؟",
    "يحفزني زوجي لتطوير مستقبلي المهني والتعليمي؟",
    "يشجعني زوجي لحضور الدورات والمحاضرات الهادفة؟",
    "يحفظ زوجي أسراري الشخصية والأسرية؟",
    "يهتم زوجي بمظهره الشخصي وخاصة عند ممارسة العلاقة الخاصة؟",
    "يساعدني زوجي على أداء الصلاة والمشاركة في أعمال الخير.؟"



];

// Vérifiez si le test a commencé
if (isset($_POST['test5startTest'])) {
    $_SESSION['test5Started'] = true;
    $_SESSION['test5score'] = 0;
    $_SESSION['test5questionIndex'] = 0;
    $_SESSION['test5answers'] = [];
} else {
    // Vérifiez si le test est terminé
    if (isset($_SESSION['test5Started']) && $_SESSION['test5Started'] === true) {
        $test5questionIndex = $_SESSION['test5questionIndex'];

        // Vérifiez la réponse de l'utilisateur et attribuez des points
        if (isset($_POST['test5answer']) && ($_POST['test5answer'] === "yes" || $_POST['test5answer'] === "no")) {
            $_SESSION['test5answers'][$test5questionIndex] = $_POST['test5answer'];
            $test5questionIndex++;

            // Passez à la prochaine question
            if ($test5questionIndex < count($test5questions)) {
                $_SESSION['test5questionIndex'] = $test5questionIndex;
            } else {
                // Le test est terminé, calculez le score en pourcentage
                $test5totalScore = array_sum(array_map(function ($test5answer) {
                    return $test5answer === "yes" ? 1 : 0;
                }, $_SESSION['test5answers']));

                $test5totalQuestions = count($test5questions);

                // Calculez le score en pourcentage
                $test5scorePercentage = ($test5totalScore * 100) / $test5totalQuestions;

                $_SESSION['test5score'] = round($test5scorePercentage, 0); // Arrondi sans décimales

                // Déterminez le message en fonction du score en pourcentage
                if ($test5scorePercentage < 50) {
                    $test5message = "ضعيف جدا";
                } elseif ($test5scorePercentage >= 50 && $test5scorePercentage < 60) {
                    $test5message = "ضعيف";
                } elseif ($test5scorePercentage >= 60 && $test5scorePercentage < 70) {
                    $test5message = "مقبول";
                } elseif ($test5scorePercentage >= 70 && $test5scorePercentage < 80) {
                    $test5message = "جيد";
                } elseif ($test5scorePercentage >= 80 && $test5scorePercentage < 90) {
                    $test5message = "جيد جدا";
                } elseif ($test5scorePercentage >= 90 && $test5scorePercentage <= 100) {
                    $test5message = "ممتاز";
                }

                $_SESSION['test5message'] = $test5message;
                $_SESSION['test5testComplete'] = true;
            }
        }

        // Gestion du redémarrage du test
        if (isset($_POST['test5restartTest'])) {
            unset($_SESSION['test5Started']);
            unset($_SESSION['test5score']);
            unset($_SESSION['test5questionIndex']);
            unset($_SESSION['test5answers']);
            unset($_SESSION['test5testComplete']);
            header('Location: http://localhost/khairakom-tests/tests-files/test5.php');
            exit;
        }
    }
}
?>

<div id="app">
    <img id="test5-image" src="" width="300" height="auto">

<?php if (!isset($_SESSION['test5Started']) || $_SESSION['test5Started'] === false) : ?>

        <br><br>
        <h4>هذا الاختبار يحتوي على 26 سؤال بسيط</h4> <br>
        <h4>الرجاء الإجابة بنعم أو لا على كل سؤال</h4> <br>
        <form method="POST">
            <input type="submit" name="test5startTest" value="ابدئي الاختبار" id="start-button" class="boutons">
        </form>
        <script>
            document.getElementById("test5-image").src = "../images/t5.jpg";
        </script>
    <?php elseif (isset($_SESSION['test5testComplete']) && $_SESSION['test5testComplete'] === true) : ?>
        <h3>الف مبروك! لقد أكملت الإختبار</h3>
        <h4>تقييم زوجك في هذا الإختبار هو :</h4>
        <h3 style="color: blue !important;"> <?php echo $_SESSION['test5score']; ?>%<span> / </span><?php echo $_SESSION['test5message']; ?></h3>

        <form method="POST" action=" http://localhost/khairakom-tests/tests-files/test5.php">
            <input type="submit" name="test5restartTest" value="اعادة الإختبار" id="restart-button" class="boutons">
        </form>

        <!-- Mettre à jour l'image à la fin du test -->
        <script>
            document.getElementById("test5-image").src = "../images/congratulation.jpg";
        </script>
    <?php else : ?>
        <div id="test5question">
            <!-- Afficher la progression des questions -->
            <h4> السؤال : <?php echo ($_SESSION['test5questionIndex'] + 1) . "/" . count($test5questions); ?></h4>

            <h4><?php echo $test5questions[$_SESSION['test5questionIndex']]; ?></h4>

            <form id="test5question-form" method="POST">
                <label class="radio-label yes">
                    <input type="radio" name="test5answer" value="yes" onclick="test5submitForm()">
                    نعم
                </label>
                <label class="radio-label no">
                    <input type="radio" name="test5answer" value="no" onclick="test5submitForm()">
                    لا
                </label>
            </form>
        </div>
        <script>
            function test5submitForm() {
                document.getElementById("test5question-form").submit();
            }
        </script>
    <?php endif; ?>
</div>
