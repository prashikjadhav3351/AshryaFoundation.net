<?php
session_start();
session_destroy();
header("Location: reglog.php");
exit();
?>
