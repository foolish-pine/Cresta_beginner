<!-- コンタクトフォーム用PHPここから -->
<?php
session_start();

// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
$clean = array();

// 前後にある半角全角スペースを削除する関数
function spaceTrim ($str) {
  // 行頭
  $str = preg_replace('/^[ 　]+/u', '', $str);
  // 末尾
  $str = preg_replace('/[ 　]+$/u', '', $str);
  return $str;
}

// サニタイズ
if (!empty($_POST)) {
  foreach ($_POST as $key => $value) {
    $clean[$key] = spaceTrim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
  }
}

// トークンを確認する
if (!(hash_equals($clean['token'], $_SESSION['token']))) {
  echo "不正アクセスの可能性があります";
  exit();
}

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
$auto_reply_text .= "この度は、お問い合わせいただきありがとうございます。\n下記の内容でお問い合わせを受け付けました。\n\n";
$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
$auto_reply_text .= "氏名：" . $clean['name'] . "\n";
$auto_reply_text .= "電話番号：" . $clean['tel'] . "\n";
$auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
$auto_reply_text .= "お問い合わせ内容：\n" . $clean['message'] . "\n\n";
$auto_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com";

// 利用者へメール送信
mb_send_mail($clean['email'], $auto_reply_subject, $auto_reply_text, $header);

$admin_reply_subject = "お問い合わせ受け付けました";

$admin_reply_text = "※※※このメールはテストメールです※※※\n\n";
$admin_reply_text .= "下記の内容でお問い合わせがありました。\n\n";
$admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
$admin_reply_text .= "氏名：" . $clean['name'] . "\n";
$admin_reply_text .= "電話番号：" . $clean['tel'] . "\n";
$admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
$admin_reply_text .= "お問い合わせ内容：\n" . $clean['message'] . "\n\n";
$admin_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com";

// 管理者へメール送信
mb_send_mail($clean['email'], $admin_reply_subject,$admin_reply_text, $header);

?>
<!-- コンタクトフォーム用PHPここまで -->






<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>クリ★スタコーディング課題【初級編】</title>
  <meta name="description" content="" />
  <!-- 検索結果から除外する -->
  <meta name="robots" content="none" />
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png" />
  <link rel="icon" href="../img/favicon/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <!-- ヘッダーここから -->
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__logo">
        <a href="#">
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
      <button class="p-header__menu js-hamburger-menu">
        <span class="p-header__menu-line js-hamburger-menu-line"></span>
        <span class="p-header__menu-line js-hamburger-menu-line"></span>
        <span class="p-header__menu-line js-hamburger-menu-line"></span>
      </button>
    </div>
  </header>
  <!-- ヘッダーここまで -->
  <!-- メインここから -->
  <main class="l-main">
    <!-- contactコンテンツここから -->
    <div id="contact" class="p-contact">
      <div class="p-contact__inner">
        <!-- お問い合わせフォーム完了ページここから -->
        <h2 class="p-contact__section-heading c-text__section-heading">送信が完了しました。</h2>
        <div class="p-contact__button c-button--top">
          <a href="../index.php">トップへ戻る</a>
        </div>
        <!-- お問い合わせフォーム完了ページここまで -->
      </div>
    </div>
    <!-- contactコンテンツここまで -->
  </main>
  <!-- メインここまで -->

  <!-- フッターここから -->
  <footer class="l-footer">
    <div class="p-footer">
      <div class="p-footer__inner">
        <p>©︎cresta.design all rights reserved</p>
      </div>
    </div>
  </footer>
  <!-- フッターここまで -->
  <!-- jQuery -->
  <script src="../js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="../js/Vue.js/vue.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>