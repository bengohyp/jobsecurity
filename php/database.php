<?php
#$servername = "jobsecurity.cuwmzjglw8nw.ap-southeast-1.rds.amazonaws.com";
$servername = "localhost";
$db_username = "jobsecurity";
$db_password = "password";
$db_name = "jobsecurity";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
    exit();
} else {
    #echo "Connected successfully";
}

function check_existing_username($username, $conn) {
    $sql = "SELECT username FROM `users` WHERE `username` = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();        
        $stmt->bind_result($check_username);
        $stmt->fetch();        
        if ($check_username == $username) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    } else {
        die("Database error");
    }
}

function create_new_user($username, $password, $conn) {
    $sql = "INSERT INTO `users`(`username`, `password`) VALUES (?, ?)";
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if (!($stmt = $conn->prepare($sql))) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        return false;
    }
    if (!$stmt->bind_param("ss", $username, $password_hash)) {
        die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
        return false;
    }
    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        return false;
    }
    return true;
}

function login_user($user,$pw,$conn){
    $sql = "Select password from `users` where username = ? ";
        if (!($stmt = $conn->prepare($sql))) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        return false;
    }
    if (!$stmt->bind_param("s", $user)) {
        die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
        return false;
    }
    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        return false;
    }
    $stmt->bind_result($db_pw);
        $stmt->fetch();      
        echo $db_pw;
        if (password_verify($pw, $db_pw)) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    return false;
}

?>