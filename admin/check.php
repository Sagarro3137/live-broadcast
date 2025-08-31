<?php
$user = $_GET['username'];
$data = json_decode(file_get_contents("../users.json"), true);
foreach ($data as $u) {
    if ($u['username'] == $user) {
        echo json_encode($u);
        exit;
    }
}
echo json_encode(["coins"=>0]);
?>
