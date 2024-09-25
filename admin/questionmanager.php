<?php
$title = "Question Manager";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">Manage Questions
                </h2>
                <p class="page-description"> Functionalities to add, update, and delete questions within quizzes</p>
            </div>
            <section class="new-quiz col-sm-3">
                <a href="addQuestion.php" class="button button-primary radius-5 addQBtn">Add Questions</a>
                <p class="small-p">Add new questions to a selected quiz.</p>
            </section>
            <div class="feedback mt-10"></div>
            <section class="manage-quiz mt-10 container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mt-10 activities-con quiz_table scrollable">
                            <div class="q_table"></div>
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
                                <p>Use your Javascript to make a request to the following three endpoints:</p>
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
                                                <td>/questions/all</td>
                                                <td>Gets all the quiz questions in the platform</td>
                                            </tr>
                                            <tr>
                                                <th>GET</th>
                                                <td>/questions/quiz_id</td>
                                                <td>Gets all the quiz questions related to a particular quiz by quiz_id</td>
                                            </tr>
                                            <tr>
                                                <th>DELETE</th>
                                                <td>/questions/question_id
                                                </td>
                                                <td>Delete a quiz question using the question id</td>
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


<div class="modal fade" id="editQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Question</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="box-input-wrapper">
                        <label for="title">Quiz</label>
                        <select class="form-ctr" name="quiz">
                            <option>Quiz 1</option>
                            <option>Quiz 2</option>
                            <option>Quiz 3</option>
                        </select>
                    </div>
                    <div class="box-input-wrapper">
                        <label for="title">Question</label>
                        <input type="text" placeholder="Ex: Marketing" class="form-ctr" name="quiz_title" id="title" require />
                    </div>
                    <div class="box-input-wrapper">
                        <label for="optionA">Option A</label>
                        <input type="text" placeholder="Ex: Option A" class="form-ctr" name="optionA" id="optionA" require />
                    </div>
                    <div class="box-input-wrapper">
                        <label for="optionB">Option B</label>
                        <input type="text" placeholder="Ex: Option B" class="form-ctr" name="optionB" id="optionB" require />
                    </div>
                    <div class="box-input-wrapper">
                        <label for="optionC">Option C</label>
                        <input type="text" placeholder="Ex: Option C" class="form-ctr" name="optionC" id="optionC" require />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="button button-primary radius-5">Edit Question</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>