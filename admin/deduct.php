<?php
$user = $_GET['username'];
$amount = intval($_GET['amount']);
$data = json_decode(file_get_contents("../users.json"), true);

foreach ($data as &$u) {
    if ($u['username'] == $user) {
        $u['coins'] -= $amount;
    }
}
file_put_contents("../users.json", json_encode($data, JSON_PRETTY_PRINT));
echo "Deducted";
?>
