<?php
  require 'funcs.php';
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM bookmark");
  $bookmark = $st->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>お気に入り</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
<h1>お気に入り</h1>
  <div>
  <a href="index.php">お買い物に戻る</a>
  <a href="parchased.php">購入履歴</a>
  </div>
</div>

<?php
for ($i = 0; $i < count($bookmark); $i++) {
  // 3項目ごとに新しい行を開く
  if ($i % 5 == 0) {
    echo '<div class="clearfix">';
  }
  ?>
  <div class="content">
    <?php echo img_tag($bookmark[$i]['code']) ?>
    <p class="goods"><?php echo $bookmark[$i]['name'] ?></p>
    <p><?php echo nl2br($bookmark[$i]['comment']) ?></p>
    <p><?php echo $bookmark[$i]['price'] ?> 円</p>
    <form action="cart.php" method="post">
      <select name="num">
        <?php
        for ($j = 0; $j <= 9999; $j++) {
          echo "<option>$j</option>";
        }
        ?>
      </select>
      <input type="hidden" name="code" value="<?php echo $bookmark[$i]['code'] ?>">
      <input type="submit" name="submit" value="カートへ">
      <img src="../images/bookmark_no.jpeg" alt="ブックマーク未" height="24px">
    </form>
  </div>
  <?php
  // 3項目ごとに行を閉じる
  if (($i + 1) % 5 == 0 || $i == count($bookmark) - 1) {
    echo '</div>';
  }
}
?>

</body>
</html>