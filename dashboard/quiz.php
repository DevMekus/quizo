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
                
            </div>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>