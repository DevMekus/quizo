<?php
$title = "Take Quiz";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="score-flex">
                <div class="page-title-con">
                    <h2 class="page-title">Take Quiz
                    </h2>
                    <p class="page-description">users participate in a quiz.
                    </p>
                </div>
                <div class="score-board">
                </div>
            </div>
            <div class="feedback mt-10"></div>
            <div class="quiz-question-wrapper mt-10">
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