<?php
session_start();
session_unset();
session_destroy();
$msg = "Anda telah Logout";
header("Location: index.php?msg=$msg");
?>