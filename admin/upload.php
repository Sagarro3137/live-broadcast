<?php
$user = $_POST['username'];
$target = "../uploads/".$user."_".time().".jpg";
move_uploaded_file($_FILES["screenshot"]["tmp_name"], $target);
echo "Uploaded! Please wait for admin approval.";
?>
