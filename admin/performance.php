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
                        <div class="page-title-con">
                            <h4 class="page-title">Manage Quiz</h4>
                            <p class="page-description">Listing all available quizzes and filter them by title or date</p>
                        </div>
                        <div class="mt-10 activities-con">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="tableHead">
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Quiz</th>
                                        <th scope="col">Score</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pointer trow">
                                        <th scope="row">3</th>
                                        <td>Hercules</td>
                                        <td>Test Quiz</td>
                                        <td>20</td>

                                        <td>
                                            <button class="btn btn-primary btn-sm click-effect" data-bs-toggle="modal" data-bs-target="#editQuestion">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm click-effect">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </section>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>