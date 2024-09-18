<?php
$title = "User Manager";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Quiz Results Overview
                </h2>
                <p class="page-description">View user participation in quizzes and their scores.
                </p>
            </div>
            <section class="manage-quiz mt-10 container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="mt-10 activities-con">
                            <div class="r_table scrollable" data-page="admin"></div>

                        </div>
                    </div>
                </div>
            </section>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>