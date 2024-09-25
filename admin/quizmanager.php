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
            <div class="feedback mt-10"></div>
            <section class="manage-quiz mt-10 container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mt-10 activities-con">
                            <div class="quiz_table scrollable"></div>
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
                                <p>Use your Javascript to make a request to the following three (3) endpoints:</p>
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
                                                <th>POST</th>
                                                <td>/quiz/quiz</td>
                                                <td>Posts a new Quiz</td>
                                            </tr>
                                            <tr>
                                                <th>GET</th>
                                                <td>/quiz/all</td>
                                                <td>Gets all the quiz in the platform</td>
                                            </tr>
                                            <tr>
                                                <th>DELETE</th>
                                                <td>/quiz/quiz_id
                                                </td>
                                                <td>Delete a quiz using the quiz id</td>
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                                <div class="mt-10">
                                    <h4>New Quiz Form</h4>
                                    <p>For the new quiz POST request, the Form Names expected are:</p>
                                    <ul>
                                        <li><span class="bold">title</span> - Title of the quiz</li>
                                        <li><span class="bold">description</span> - description of the quiz</li>
                                    </ul>
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
<!-- Modal -->
<div class="modal fade" id="newQiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Quiz</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="newQuiz" method="POST">
                <div class="modal-body">
                    <div class="box-input-wrapper">
                        <label for="title">Quiz Title</label>
                        <input type="text" placeholder="Ex: Marketing" class="form-ctr" name="title" id="title" required />
                    </div>
                    <div class="box-input-wrapper">
                        <label for="description">Description</label>
                        <input type="text" placeholder="Ex: Description of marke...." class="form-ctr" name="description" id="description" required />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="button button-primary radius-5">Create Quiz</button>
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