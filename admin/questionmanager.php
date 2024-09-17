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
                <a href="addQuestion.php" class="button button-primary radius-5">Add Questions</a>
                <p class="small-p">Add new questions to a selected quiz.</p>
            </section>
            <section class="manage-quiz mt-10 container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-con">
                            <h4 class="page-title">Manage Quiz</h4>
                            <p class="page-description">Listing all available quizzes and filter them by title or date</p>
                        </div>
                        <div class="mt-10 activities-con quiz_table scrollable">
                            <div class="q_table"></div>
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