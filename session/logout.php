<?php
session_start();


session_unset();
session_destroy();


if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '../home.php') !== false) {
    header('Location: ../index.php');
} else {
    header('Location: ../home.php');
}
exit;
?>
