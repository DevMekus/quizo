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
                <table class="table table-hover">
                    <thead>
                        <tr class="tableHead">
                            <th scope="col">#</th>
                            <th scope="col">Quiz</th>
                            <th scope="col">Score</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="pointer trow">
                            <th scope="row">3</th>
                            <td>Test Quiz</td>
                            <td>20</td>
                            <td>20 June, 2023</td>
                            <td>
                                <a href="take-quiz.php?id=" class="btn btn-primary btn-sm click-effect">
                                    <i class="fas fa-edit"></i> Retake
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>