<?php
$title = "User Dashboard";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Welcome back</h2>
                <h4 class="color-primary username"></h4>
                <p class="page-description">overview of the user’s activities, quizzes, and general site navigation.</p>
            </div>
            <section class="mt-10 container-fluid">
                <div class="row dashboard-metrics">
                    <div class="col-sm-4">
                        <div class="card active">
                            <div class="card-body">
                                <h4 class="card-title"><span class="fas fa-question-circle icon mr-10"></span>Quiz</h4>
                                <p class="small-p">Total number of quiz available</p>
                                <h2 class="quizCount"></h2>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>