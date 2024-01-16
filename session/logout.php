<?php
session_start();


session_unset();
session_destroy();


if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '../home') !== false) {
    header('Location: ..https://bleachmehowtodoggie.com/');
} else {
    header('Location: ../home');
}
exit;
?>
