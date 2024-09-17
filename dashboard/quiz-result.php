<?php
$title = "Quiz Results";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Quiz Results
                </h2>
                <p class="page-description">Displaying the user’s performance after completing a quiz.</p>
            </div>
            <div class="mt-10 activities-con">
                <div class="r_table" data-page="user"></div>
            </div>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>