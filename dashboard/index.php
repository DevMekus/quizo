<?php
$title = "USer Dashboard";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Welcome back</h2>
                <h4 class="color-primary">Hercules CHukwu</h4>
                <p class="page-description">overview of the user’s activities, quizzes, and general site navigation.</p>
            </div>
            <section class="mt-10 container-fluid">
                <div class="row dashboard-metrics">
                    <div class="col-sm-4">
                        <div class="card active">
                            <div class="card-body">
                                <h4 class="card-title"><span class="fas fa-question-circle icon mr-10"></span>Quiz</h4>
                                <p class="small-p">Total number of quiz</p>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <section class="mt-10 recent-activities container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-con">
                            <h4 class="page-title">Recent activities</h4>
                            <p class="page-description">Manage site recent activities</p>
                        </div>
                        <div class="mt-10 activities-con">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="tableHead">
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Messages </th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pointer trow">
                                        <th scope="row">362</th>
                                        <td>John Doe</td>
                                        <td>Registration</td>
                                        <td>Joined the platform recently</td>
                                        <th scope="row">2hours ago</th>
                                        <td>
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