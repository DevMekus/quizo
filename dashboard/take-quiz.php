<?php
$title = "Take Quiz";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Take Quiz
                </h2>
                <p class="page-description">users participate in a quiz.
                </p>
            </div>
            <div class="quiz-question-wrapper">
                <form class="quiz-question-wrapper" id="quiz-form">
                    <div class="q_table quiz-question-wrapper"></div>

                    <div class="bottom">
                        <button class="button button-primary radius-5">Submit Quiz</button>
                    </div>
                </form>
            </div>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>