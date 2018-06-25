<?php
session_start();
include 'constant.php';
if (!isset($auth)) {
    if (!isset($_SESSION['Auth']['id'])) {
        header('Location:' . WEBROOT . 'AccueilAdmin.php');
        die();
    }
}
