<?php
$title = "User Settings";
include("header.php");
?>
<main class="dashboard-wrapper">
    <?php include("sidebar.php"); ?>
    <div class="page-content">
        <?php include("navbar.php"); ?>
        <section class="content-centered">
            <div class="page-title-con">
                <h2 class="page-title">User Settings
                </h2>
                <p class="page-description">Manage account and application settings.
                </p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="auth-cons">
                        <div class="auth-title-con">
                            <h1>Update user account</h1>
                            <p>Manage user details and password.</p>
                        </div>
                        <div class="feedback mt-10"></div>
                        <div class="auth-body-con">
                            <form>
                                <div class="box-input-wrapper">
                                    <label for="student_name">Student name</label>
                                    <input type="text" placeholder="Ex: John Doe" class="form-ctr" name="student_name" id="student_name" require />
                                </div>
                                <div class="box-input-wrapper">
                                    <label for="email_address">Email address</label>
                                    <input type="email" placeholder="Ex: You@email.com" class="form-ctr" name="email_address" id="email_address" disabled />
                                </div>
                                <div class="box-input-wrapper">
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="" class="form-ctr" name="password" id="password" require />
                                </div>

                                <div class="mt-10 f-width flex flex-end">
                                    <button type="submit" name="loginUser" class="button button-primary semi-pill">Update account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footercontent.php") ?>
        </section>
    </div>
</main>
<?php include("footer.php"); ?>