<?php
session_start();

$feedback = "FORBIDDED! Please Login";
if (!(isset($_SESSION['admin']))) : header('location: ../auth/login.php?feedback=' . $feedback . '&alert=d');
endif;

$userid = $_SESSION['admin'];
