<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    session_destroy();
    header('location:../pages/admin');
?>