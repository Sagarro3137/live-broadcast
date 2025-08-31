<?php
$files = glob("../uploads/*.jpg");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <style>
    body { font-family: Arial; background: #f0f0f0; }
    .box { background: white; margin: 20px; padding: 20px; border-radius: 8px; }
    img { width: 200px; }
  </style>
</head>
<body>
  <h2>📋 Pending Screenshots</h2>
  <?php foreach($files as $file): 
    $name = basename($file); ?>
    <div class="box">
      <p><b>User:</b> <?=explode("_",$name)[0]?></p>
      <img src="<?=$file?>"><br><br>
      <a href="approve.php?file=<?=$name?>&coins=500">✅ Approve (500 coins)</a> |
      <a href="decline.php?file=<?=$name?>">❌ Decline</a>
    </div>
  <?php endforeach; ?>
</body>
</html>
