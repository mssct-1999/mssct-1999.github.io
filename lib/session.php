<?php
function flash() {
    if (!isset($_SESSION['Flash'])) {
        extract($_SESSION['Flash']);
        unset($_SESSION['Flash']);
        return "<a class='waves-effect waves-light btn'>$message</a>";
    }
}

function setFlash($message,$type = 'sucess') {
    $_SESSION['Flash']['message'] = $message;
    $_SESSION['Flash']['typ'] = $type;
}