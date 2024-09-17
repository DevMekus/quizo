<?php
$title = "User Quiz";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Available Quiz
                </h2>
                <p class="page-description"> Displaying all quizzes the user can participate in.</p>
            </div>
            <div class="quiz-container">
                <!-- <div class="quiz-wrap">
                    <h5 class="title">Quiz Title</h5>
                    <p class="description">A simple quiz description</p>
                    <ul>
                        <li>Questions: 20</li>
                        <li>Level: Easy</li>
                    </ul>
                    <div class="bottom">
                        <a href="take-quiz.php?id=26377" class="button button-primary radius-5">Take Quiz</a>
                    </div>
                </div> -->
            </div>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>