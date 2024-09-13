<?php
$title = "Login";
include("header.php");
?>
<main class="auth-page">
    <div class="auth-con">
        <div class="auth-title-con">
            <h1>Login to account</h1>
            <p>Enter your credentials and login</p>
        </div>
        <div class="feedback mt-10"></div>
        <div class="auth-body-con">
            <form>
                <div class="box-input-wrapper">
                    <label for="email_address">Email address</label>
                    <input type="email" placeholder="Ex: You@email.com" class="form-ctr" name="email_address" id="email_address" require />
                </div>
                <div class="box-input-wrapper">
                    <label for="password">Password</label>
                    <input type="password" placeholder="" class="form-ctr" name="password" id="password" require />
                </div>
                <div class="flex flex-start f-width align-center mt-10">
                    <a href="recovery.php" class="link auth-link color-primary bold no-decoration">Forgot password?</a>
                </div>
                <div class="auth-bottom">
                    <div>
                        <small>Don't have an account?</small><br />
                        <a href="register.php">Create account</a>
                    </div>
                    <button type="submit" name="loginUser" class="button button-primary semi-pill">Login</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
include("footer.php");
?>