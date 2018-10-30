<?php

session_start();

if (!empty($_SESSION["errmsg"])) {
    echo $_SESSION["errmsg"];
}
