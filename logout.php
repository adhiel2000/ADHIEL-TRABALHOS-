<?php
session_start();
session_destroy();
unset($_COOKIE['email']);
setcookie('email', '');
header('Location: login.php');
