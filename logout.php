<?php
//figure out how to prevent CSRF later
session_start();
session_destroy();
header('Location: index.php');
