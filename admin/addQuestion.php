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
            <section class="mt-10 container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-padding bg-grey">
                            <div>
                                <h4>Endpoints</h4>
                                <p>Use your Javascript to make a POST request to the following endpoints:</p>
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
                                                <td>/questions/question</td>
                                                <td>Posts a new quiz question</td>
                                            </tr>

                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                                <div class="mt-10">
                                    <h4>New Question Form</h4>
                                    <p>For the new quiz POST request, the Form Names expected are:</p>
                                    <ul>
                                        <li><span class="bold">question</span> - select the particular quiz</li>
                                        <li><span class="bold">optionA</span> - Question Option A to be displayed</li>
                                        <li><span class="bold">optionB</span> - Question Option B to be displayed</li>
                                        <li><span class="bold">optionC</span> - Question Option C to be displayed</li>
                                        <li><span class="bold">optionCorrect</span> - Correct option in all the three options. Ex: A</li>
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

<?php include("footer.php"); ?>