<?php
$file = "../uploads/".$_GET['file'];
$coins = intval($_GET['coins']);
$user = explode("_", $_GET['file'])[0];

$data = json_decode(file_get_contents("../users.json"), true);

foreach ($data as &$u) {
    if ($u['username'] == $user) {
        $u['coins'] += $coins;
    }
}
file_put_contents("../users.json", json_encode($data, JSON_PRETTY_PRINT));

unlink($file);

header("Location: admin.php");
?>
