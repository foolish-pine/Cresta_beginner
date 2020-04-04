<?php
$page_flag = 1;

if (!empty($_POST['back'])) {
  $page_flag = 0;

} elseif (!empty($_POST['confirmation'])) {
  $page_flag = 1;

} elseif (!empty($_POST['submit'])) {
  $page_flag = 2;

  $auto_reply_subject = null;
  $auto_reply_text = null;
  $admin_reply_subject = null;
  $admin_reply_text = null;
  date_default_timezone_set('Asia/Tokyo');

  $header = "MIME-Version: 1.0\n";
  $header .= "From: Cresta Design <noreply@test.com>\n";
  $header .= "Reply-To: Cresta Design <noreply@test.com>\n";

  $auto_reply_subject = 'お問い合わせありがとうございます。';

  $auto_reply_text = "※※※このメールはテストメールです※※※\n\n";
  $auto_reply_text .= "この度は、お問い合わせいただきありがとうございます。下記の内容でお問い合わせを受け付けました。\n\n";
  $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
  $auto_reply_text .= "氏名：" . $_POST['name'] . "\n";
  $auto_reply_text .= "電話番号：" . $_POST['tel'] . "\n";
  $auto_reply_text .= "メールアドレス：" . $_POST['email'] . "\n";
  $auto_reply_text .= "お問い合わせ内容：\n" . $_POST['message'] . "\n\n";
  $auto_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com/index.php";

  mb_send_mail($_POST['email'], $auto_reply_subject, $auto_reply_text, $header);

  $admin_reply_subject = "お問い合わせ受け付けました";

  $admin_reply_text = "※※※このメールはテストメールです※※※\n\n";
  $admin_reply_text .= "下記の内容でお問い合わせがありました。\n\n";
  $admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
  $admin_reply_text .= "氏名：" . $_POST['name'] . "\n";
  $admin_reply_text .= "電話番号：" . $_POST['tel'] . "\n";
  $admin_reply_text .= "メールアドレス：" . $_POST['email'] . "\n";
  $admin_reply_text .= "お問い合わせ内容：\n" . $_POST['message'] . "\n\n";
  $admin_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com/index.php";

  mb_send_mail($_POST['email'], $admin_reply_subject, $admin_reply_text, $header);
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
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#about">About</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#service">Service</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#news">News</a></li>
            <li class="p-header__item"><a class="js-smoothscroll" href="../index.php#contact">Contact</a></li>
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
        <?php if ($page_flag === 0) : ?>
          <h2 class="p-contact__sectionTitle c-text__sectionTitle">お問い合わせ</h2>
          <form action="" method="post">
            <div>
              <label for="name">担当者名</label><br>
              <input class="p-contact__textbox" type="text" id="name" name="name" value="<?php if( !empty($_POST['name']) ){ echo $_POST['name']; } ?>" required/>
            </div>
            <div>
              <label for="tel">電話番号</label><br>
              <input class="p-contact__textbox" type="text" id="tel" name="tel" value="<?php if( !empty($_POST['tel']) ){ echo $_POST['tel']; } ?>" required />
            </div>
            <div>
              <label for="email">メールアドレス</label><br>
              <input class="p-contact__textbox" type="text" id="email" name="email" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>" required />
            </div>
            <div class="p-contact__textarea">
              <label for="message">お問い合わせ内容</label><br>
              <textarea id="message" name="message" required><?php if( !empty($_POST['message']) ){ echo $_POST['message']; } ?></textarea>
            </div>
            <div class="p-contact__button c-button">
              <input type="submit" name="confirmation" value="確認画面へ">
            </div>
          </form>
        <?php elseif ($page_flag === 1) : ?>
          <h2 class="p-contact__sectionTitle c-text__sectionTitle">お問い合わせ</h2>
          <p class="p-contact__text--confirmation c-text">以下の内容で送信します。よろしいですか？</p>
          <form action="" method="post">
            <div>
              <label for="name">担当者名</label><br>
              <?php if (isset($_POST['name'])) {
                echo '<div class="p-contact__textbox--confirmation">' . $_POST['name'] . '</div>';
              } ?>
            </div>
            <div>
              <label for="tel">電話番号</label><br>
              <?php if (isset($_POST['tel'])) {
                echo '<div class="p-contact__textbox--confirmation">' . $_POST['tel'] . '</div>';
              } ?>
            </div>
            <div>
              <label for="email">メールアドレス</label><br>
              <?php if (isset($_POST['email'])) {
                echo '<div class="p-contact__textbox--confirmation">' . $_POST['email'] . '</div>';
              } ?>
            </div>
            <div class="p-contact__textarea">
              <label for="message">お問い合わせ内容</label><br>
              <?php if (isset($_POST['message'])) {
                echo '<div class="p-contact__textarea--confirmation">' . nl2br($_POST['message']) . '</div>';
              } ?>
            </div>
            <div class="p-contact__buttonContainer">
              <div class="p-contact__button p-contact__button--back c-button">
                <input type="submit" name="back" value="戻る">
              </div>
              <div class="p-contact__button c-button">
                <input type="submit" name="submit" value="送信">
              </div>
            </div>
            <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
            <input type="hidden" name="tel" value="<?php echo $_POST['tel'] ?>">
            <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
            <input type="hidden" name="message" value="<?php echo $_POST['message'] ?>">
          </form>
        <?php elseif ($page_flag === 2) : ?>
          <h2 class="p-contact__sectionTitle c-text__sectionTitle">送信が完了しました。</h2>
          <div class="p-contact__button c-button">
            <a href="../index.php">トップへ戻る</a>
          </div>
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