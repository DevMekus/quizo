<?php
session_start();

if (isset($_GET['session'])) {
    /**
     * Sets the user & admin session
     */

    if ($_GET['role'] == 'user') {
        $_SESSION['user'] = $_GET['session'];
        echo json_encode(
            [
                'message' => 'User session set',
                'status' => 'success',
                'title' => 'User session'
            ]
        );
    } else if ($_GET['role'] == 'admin') {
        $_SESSION['admin'] = $_GET['session'];
        echo json_encode(
            [
                'message' => 'Admin session set',
                'status' => 'success',
                'title' => 'User session'
            ]
        );
    } else {
        echo json_encode(
            [
                'message' => 'Session failed',
                'status' => 'error',
                'title' => 'Session Error'
            ]
        );
    }
}

if (isset($_GET['logout'])) {
    foreach ($_SESSION as $session) {
        unset($session);
    }
    session_destroy();
    echo json_encode(
        [
            'message' => 'Session destroyed',
            'status' => 'success',
            'title' => 'Session'
        ]
    );
}
