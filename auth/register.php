<?php
$title = "Register";
include("header.php");
?>
<main class="auth-page">
    <div class="auth-con">
        <div class="auth-title-con">
            <h1>Create an account</h1>
            <p>Create an account to participate.</p>
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
                    <input type="email" placeholder="Ex: You@email.com" class="form-ctr" name="email_address" id="email_address" require />
                </div>
                <div class="box-input-wrapper">
                    <label for="password">Password</label>
                    <input type="password" placeholder="" class="form-ctr" name="password" id="password" require />
                </div>

                <div class="auth-bottom">
                    <div>
                        <small>Already have an account?</small><br />
                        <a href="login.php">Create account</a>
                    </div>
                    <button type="submit" name="loginUser" class="button button-primary semi-pill">Create account</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
include("footer.php");
?>