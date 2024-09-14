<?php
$title = "Quiz Manager";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Manage Quizzes
                </h2>
                <p class="page-description">Allow admins to create, view, edit, and delete quizzes.</p>
            </div>
            <section class="new-quiz">
                <button class="button button-primary radius-5" data-bs-toggle="modal" data-bs-target="#newQiz">Create Quiz</button>
                <p class="small-p">Add a new quiz with title, description, and questions.</p>
            </section>
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Questions </th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pointer trow">
                                        <th scope="row">3</th>
                                        <td>Test Quiz</td>
                                        <td>Description of test quiz</td>
                                        <td>20</td>
                                        <th scope="row">2hours ago</th>
                                        <td>
                                            <button class="btn btn-primary btn-sm click-effect" data-bs-toggle="modal" data-bs-target="#editQiz">
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
<!-- Modal -->
<div class="modal fade" id="newQiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Quiz</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">

                    <div class="box-input-wrapper">
                        <label for="title">Quiz Title</label>
                        <input type="text" placeholder="Ex: Marketing" class="form-ctr" name="quiz_title" id="title" require />
                    </div>
                    <div class="box-input-wrapper">
                        <label for="description">Description</label>
                        <input type="text" placeholder="Ex: Description of marke...." class="form-ctr" name="quiz_description" id="description" require />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="button button-primary radius-5">Create Quiz</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editQiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Quiz</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="box-input-wrapper">
                        <label for="title">Quiz Title</label>
                        <input type="text" placeholder="Ex: Marketing" class="form-ctr" name="quiz_title" value="Test quiz" id="title" require />
                    </div>
                    <div class="box-input-wrapper">
                        <label for="description">Description</label>
                        <textarea placeholder="Ex: Description of marke...." class="form-ctr">
                        </textarea>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="button button-primary radius-5">Edit Quiz</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>