<?php
$file = "../uploads/".$_GET['file'];
unlink($file);
header("Location: admin.php");
?>
