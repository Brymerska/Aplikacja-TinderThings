<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if (!in_array('admin', $_SESSION['role'])) {
    var_dump($_SESSION['role']);
    die('You do not have permission to watch this page!');
}
?>
