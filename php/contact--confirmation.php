<?php
$page_flag = 0;

if(!empty($_POST['submit'])) {
  $page_flag = 1;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>クリ★スタコーディング課題【初級編】</title>
  <meta name="description" content="">
  <!-- 検索結果から除外する -->
  <meta name="robots" content="none">
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../image/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../image/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../image/favicon/favicon-16x16.png">
  <link rel="manifest" href="../image/favicon/site.webmanifest">
  <link rel="mask-icon" href="../image/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- Google_Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700|Roboto:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="../css/style.css">
</head>

<body ontouchstart="">
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__inner">
        <div class="p-header__logo">
          <a href="../index.php">
            <h1>クリ★スタ</h1>
          </a>
        </div>
        <nav class="p-header__nav">
          <ul class="p-header__list">
            <li class="p-header__item"><a class="js-smoothscroll" href="#about">About</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#service">Service</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#news">News</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="#contact">Contact</a></li>
          </ul>
        </nav>
        <a class="p-header__menu">
          <span class="p-header__menuLine"></span>
          <span class="p-header__menuLine"></span>
          <span class="p-header__menuLine"></span>
        </a>
      </div>
    </div>
  </header>
  <main class="l-main">
    <section id="contact" class="p-contact">
      <div class="p-contact__inner">
        <?php if ($page_flag === 0): ?>
        <h2 class="p-contact__sectionTitle c-text__sectionTitle">お問い合わせ</h2>
        <form action="" method="post">
          <div>
            <label for="name">担当者名</label><br>
            <?php if (isset($_POST['name'])) {
              echo $_POST['name'];
            } ?>
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <?php if (isset($_POST['tel'])) {
              echo $_POST['tel'];
            } ?>
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <?php if (isset($_POST['email'])) {
              echo $_POST['email'];
            } ?>
          </div>
          <div class="p-contact__messageArea">
            <label for="message">お問い合わせ内容</label><br>
            <?php if (isset($_POST['email'])) {
              echo $_POST['email'];
            } ?>
          </div>
          <div class="p-contact__button c-button">
            <input type="submit" name="submit" value="送信">
          </div>
          <div class="p-contact__button c-button">
            <input type="submit" name="back" value="戻る">
          </div>
          <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
          <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
          <input type="hidden" name="message" value="<?php echo $_POST['message'] ?>">
        </form>
        <?php elseif ($page_flag === 1): ?>
          <h2 class="p-contact__sectionTitle c-text__sectionTitle">送信が完了しました。</h2>
        <?php endif; ?>
      </div>
    </section>
  </main>
  <footer class="l-footer">
    <div class="p-footer">
      <div class="p-footer__inner">
        <p>©︎cresta.design all rights reserved</p>
      </div>
    </div>
  </footer>
</body>

</html>