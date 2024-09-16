<?php
session_start();

$feedback = "FORBIDDED! Please Login";
if (!(isset($_SESSION['user']))) : header('location: ../auth/login.php?feedback=' . $feedback . '&alert=d');
endif;

$userid = $_SESSION['user'];
