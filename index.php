
<?php
#instantiate and include required dependencies

$title = "Flask Quiz API";
include("header.php");
include("navbar.php");
?>
<!-- Header start -->
<header class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="hero-text">
                    <div>
                        <h1>Online Quiz Platform <br />and API</h1>
                        <p>
                            Quizzes are fun and informative ways to test the knowledge of people. Plus, you can easily use them in work or school environments. And now, with the free quiz App and API, you will be able to create your quizzes with no effort.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="hero-text">
                    <img src="static/images/5186094.jpg" width="100%" class="img-fluid img-responsive" alt="learning" />
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-padding">
                    <h2 class="title">Quizo - Quiz Application API</h2>

                    <p>
                        This is a **Flask-based RESTful API** for a quiz application with user authentication and admin management. The API allows users to participate in quizzes, view results, and manage their profile, while admins can create and manage quizzes and questions.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-grey">
        <div class="page-padding container">
            <h2>Features of Quizo</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <h5><span class="mr-10">1.</span>User Registration/Login</h5>
                        <p>Users can register, log in, and retrieve tokens for authentication.</p>
                    </div>
                    <div class="mt-10">
                        <h5><span class="mr-10">2.</span>Admin Dashboard</h5>
                        <p>Admins can create, update, and delete quizzes and questions.</p>
                    </div>
                    <div class="mt-10">
                        <h5><span class="mr-10">3.</span>Quiz Participation</h5>
                        <p>Users can take quizzes and view their results.</p>
                    </div>
                    <div class="mt-10">
                        <h5><span class="mr-10">4.</span>Quiz Management</h5>
                        <p>Admins can manage quizzes and questions from the admin dashboard.</p>
                    </div>
                    <div class="mt-10">
                        <h5><span class="mr-10">5.</span>Quiz History</h5>
                        <p>Users can view their past quizzes and results.</p>
                    </div>
                    <div class="mt-10">
                        <h5><span class="mr-10">6.</span>Role-based Access Control</h5>
                        <p>Role differentiation between admin and user.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="page-padding container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Endpoints</h2>
                    <p>The following are the different endpoints to build this application.</p>
                    <div class="mt-10">
                        <h4>Authentication Endpoints</h4>
                        <div class="mt-10 scrollable">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>Endpoint</th>
                                        <th>Description</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <th>POST</th>
                                        <td>/auth/register</td>
                                        <td>Register a new user. </td>
                                    </tr>
                                    <tr>
                                        <th>POST</th>
                                        <td>/auth/login</td>
                                        <td>Log in a user and return a JWT token. </td>
                                    </tr>
                                </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="mt-10">
                        <h4>User Endpoints</h4>
                        <div class="mt-10 scrollable">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>Endpoint</th>
                                        <th>Description</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <th>GET</th>
                                        <td>/users/user</td>
                                        <td>Get the current user's profile.</td>
                                    </tr>
                                    <tr>
                                        <th>GET</th>
                                        <td>/users/user/all</td>
                                        <td>Get all the users. </td>
                                    </tr>
                                    <tr>
                                        <th>PATCH</th>
                                        <td>/users/update</td>
                                        <td>Update user profile information.</td>
                                    </tr>
                                </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Header end -->

<?php include("footer.php") ?>