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
            <section class="new-quiz">
                <button class="button button-primary radius-5" data-bs-toggle="modal" data-bs-target="#newQuestion">Add Questions</button>
                <p class="small-p">Add new questions to a selected quiz.</p>
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
                                        <th scope="col">Quiz</th>
                                        <th scope="col">Question</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pointer trow">
                                        <th scope="row">3</th>
                                        <td>Test Quiz</td>
                                        <td>Description of test quiz</td>
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
<div class="modal fade" id="newQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Quiz Question</h1>
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
                    <button type="button" class="button button-primary radius-5">Add Question</button>
                </div>
            </form>
        </div>
    </div>
</div>

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