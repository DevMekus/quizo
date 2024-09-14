<?php
$title = "Admin Dashboard";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Welcome back</h2>
                <h4 class="color-primary">Impruuv Systems</h4>
                <p class="page-description">Attend to the quiz overviews</p>
            </div>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>