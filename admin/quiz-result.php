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
                <h2 class="page-title">Quiz Results
                </h2>
                <p class="page-description">View user participation in quizzes and their scores.
                </p>
            </div>
            <div class="mt-10 feedback"></div>
            <section class="manage-quiz mt-10 container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mt-10 activities-con">
                            <div class="r_table scrollable" data-page="admin"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-10 container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-padding bg-grey">
                            <div>
                                <h4>Endpoints</h4>
                                <p>Use your Javascript to make a request to the following endpoint:</p>
                                <div class="mt-10 scrollable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        <tbody>
                                            <tr>
                                                <th>GET</th>
                                                <td>/quiz/results</td>
                                                <td>Gets all the quiz questions in the platform</td>
                                            </tr>

                                            <tr>
                                                <th>DELETE</th>
                                                <td>/quiz/results/result_id
                                                </td>
                                                <td>Delete a quiz result using the result id</td>
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>

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