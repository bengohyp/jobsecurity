<?php

$phpSelf = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);

function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function get_csrf_token()
{
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['token'];
}

function validate_csrf($post)
{
    if (!empty($_POST['token']) && hash_equals($_SESSION['token'], $post['token'])) {
        return true;
    } else {
        session_start();
        $_SESSION["errmsg"] = "No or invalid CSRF token!";
        session_write_close();
        header('Location: error.php');
        exit();
    }
}
