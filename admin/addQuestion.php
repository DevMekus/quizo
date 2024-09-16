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
                <h2 class="page-title">Add New Questions
                </h2>
                <p class="page-description"> Add a new question to a quiz</p>
            </div>
            <div class="mt-10 feedback"></div>
            <section class="manage-quiz mt-10 container">
                <div class="col-sm-7">
                    <form class="newQuestion">
                        <div class="modal-body row">
                            <div class="col-sm-6">
                                <div class="box-input-wrapper">
                                    <div class="quiz_select"></div>
                                </div>
                                <div class="box-input-wrapper">
                                    <label for="title">Question</label>
                                    <input type="text" placeholder="Ex: Marketing" class="form-ctr" name="question" id="title" require />
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
                            <div class="col-sm-6">
                                <div class="box-input-wrapper">
                                    <label for="optionC">Correct Option</label>
                                    <input type="text" placeholder="Ex: A" class="form-ctr" name="optionCorrect" id="optionC" require />
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="button button-primary radius-5">Add Question</button>
                        </div>
                    </form>
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
            <form class="newQuestion">
                <div class="modal-body">
                    <div class="box-input-wrapper">
                        <div class="quiz_select"></div>
                        <!-- <label for="title">Quiz</label>
                        <select class="form-ctr" name="quiz">
                            <option>Quiz 1</option>
                            <option>Quiz 2</option>
                            <option>Quiz 3</option>
                        </select> -->
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