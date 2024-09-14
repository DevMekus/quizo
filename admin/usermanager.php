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
                <h2 class="page-title">Manage Users
                </h2>
                <p class="page-description">View and manage registered users.</p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><span class="fas fa-users icon mr-10"></span>Users</h4>
                            <p class="small-p">Total number of users</p>
                            <h2>0</h2>
                        </div>
                    </div>
                </div>
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
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Join date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pointer trow">
                                        <th scope="row">3</th>
                                        <td>Emmanuel Nnaji</td>
                                        <td>Emma@yahoo.com</td>
                                        <td>20 June, 2023</td>
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