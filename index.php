<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="これはWebサイト制作の練習をするためのサイトです。">
  <meta name="keyword" content="Webサイト, 制作, 練習">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4象限ToDoタスク管理くん</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  $id = $_SESSION['id'];
  echo "$id";
  ?>

  <h1>4象限ToDoタスク管理くん</h1>
  このwebアプケーションは、4象限マトリクスを用いたtodoタスク管理術を提供するアプリです。
  <h2>第1象限:緊急かつ重要</h2>
  <p>todo1</p>
  <h2>第2象限:緊急ではないが重要</h2>
  <p>todo2</p>
  <h2>第3象限:緊急だが重要ではない</h2>
  <p>todo3</p>
  <h2>第4象限:緊急でも重要でもない</h2>
  <p>todo4</p>
  <div>
    <a href="new.php">
      <p>新規作成</p>
    </a>
  </div>
  <section>
    <h2>緊急度と重要度のマトリクス</h2>
    <p>全てのタスクは「緊急度」と「重要度」の２軸で、「必須」「効果性」「錯覚」「浪費・過剰」の領域（象限）に振り分けることができます。</p>
    <ul>
      <li>（第1象限）重要度も緊急度も高いタスク＝「必須」</li>
      <li>（第2象限）重要度が高いが、緊急度が低いタスク＝「効果性」</li>
      <li>（第3象限）緊急度が高いが、重要度が低いタスク＝「錯覚」</li>
      <li>（第4象限）重要度も緊急度も低いタスク＝「浪費・過剰」</li>
    </ul>
    <p>上記の4象限に分けてタスク管理を行うことで、効率よくタスクを処理できます。</p>
  </section>
</body>
<footer>
  <p>Copy-Right</p>
</footer>
</html>