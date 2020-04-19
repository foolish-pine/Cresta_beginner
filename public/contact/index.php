<!-- コンタクトフォーム用PHPここから -->
<?php
session_start();

// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
$page_flag = 0;
$clean = array();

// サニタイズ
if (!empty($_POST)) {
  foreach ($_POST as $key => $value) {
    $clean[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
}

// 前後にある半角全角スペースを削除する関数
function spaceTrim($str)
{
  // 行頭
  $str = preg_replace('/^[ 　]+/u', '', $str);
  // 末尾
  $str = preg_replace('/[ 　]+$/u', '', $str);
  return $str;
}

if (!empty($clean['back'])) {
  $page_flag = 0;

  // トークン生成
  if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = sha1(random_bytes(30));
  }
} elseif (!empty($clean['confirmation'])) {
  // tokenを変数に入れる
  $token = $_POST['token'];

  // トークンを確認し、確認画面を表示
  if (!(hash_equals($token, $_SESSION['token']) && !empty($token))) {
    echo "不正アクセスの可能性があります";
    exit();
  }

  $error = validation($clean);

  if (empty($error)) {
    $page_flag = 1;

    // セッションの書き込み
    $_SESSION['page'] = true;
  }
} elseif (!empty($clean['submit'])) {

  if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {

    // セッションの削除
    unset($_SESSION['page']);

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
    $auto_reply_text .= "この度は、お問い合わせいただきありがとうございます。\n下記の内容でお問い合わせを受け付けました。\n\n";
    $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $auto_reply_text .= "氏名：" . $clean['name'] . "\n";
    $auto_reply_text .= "電話番号：" . $clean['tel'] . "\n";
    $auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
    $auto_reply_text .= "お問い合わせ内容：\n" . $clean['message'] . "\n\n";
    $auto_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com/index.php";

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
    $admin_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com/index.php";

    // 管理者へメール送信
    mb_send_mail($clean['email'], $admin_reply_subject, $admin_reply_text, $header);
  } else {
    $page_flag = 0;
  }
}

function validation($data)
{
  $error = array();

  // 氏名のバリデーション
  if (20 < mb_strlen($data['name'])) {
    $error[] = "「担当者名」は20文字以内で入力してください。";
  }

  // 電話番号のバリデーション
  if (!preg_match('/^[0-9-]{6,9}$|^[0-9-]{13}$/', $data['tel'])) {
    $error[] = "「電話番号」は正しい形式で入力してください。";
  }

  // メールアドレスのバリデーション
  if (!preg_match('/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email'])) {
    $error[] = "「メールアドレス」は正しい形式で入力してください。";
  }

  return $error;
}
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
      <button class="p-header__menu">
        <span class="p-header__menu-line"></span>
        <span class="p-header__menu-line"></span>
        <span class="p-header__menu-line"></span>
      </button>
    </div>
  </header>
  <!-- ヘッダーここまで -->
  <main class="l-main">
    <div id="contact" class="p-contact">
      <div class="p-contact__inner">
        <!-- お問い合わせフォーム入力ページここから -->
        <?php if ($page_flag === 0) : ?>
        <h2 class="p-contact__section-title c-text__section-title">お問い合わせ</h2>
        <?php if (!empty($error)): ?>
        <ul class="p-contact__error-list">
          <?php foreach ($error as $value): ?>
          <li><?php echo $value; ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <form action="" method="post">
          <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
          <div>
            <label for="name">担当者名</label><br>
            <input class="p-contact__textbox" type="text" id="name" name="name" value="<?php if( !empty($clean['name']) ){ echo $clean['name']; } ?>" required />
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <input class="p-contact__textbox" type="text" id="tel" name="tel" value="<?php if( !empty($clean['tel']) ){ echo $clean['tel']; } ?>" required />
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <input class="p-contact__textbox" type="text" id="email" name="email" value="<?php if( !empty($clean['email']) ){ echo $clean['email']; } ?>" required />
          </div>
          <div class="p-contact__textarea">
            <label for="message">お問い合わせ内容</label><br>
            <textarea id="message" name="message" required><?php if( !empty($clean['message']) ){ echo $clean['message']; } ?></textarea>
          </div>
          <div class="p-contact__button c-button--default">
            <input type="submit" name="confirmation" value="確認画面へ">
          </div>
        </form>
        <!-- お問い合わせフォーム入力ページここまで -->
        <!-- お問い合わせフォーム確認ページここから -->
        <?php elseif ($page_flag === 1) : ?>
        <h2 class="p-contact__section-title c-text__section-title">お問い合わせ</h2>
        <p class="p-contact__text--confirmation c-text">以下の内容で送信します。よろしいですか？<br>※利用者宛と管理者宛のメールが入力されたメールアドレスに送信されます。</p>
        <form action="" method="post">
          <div>
            <label for="name">担当者名</label><br>
            <?php if (isset($clean['name'])) {
              echo '<div class="p-contact__textbox--confirmation">' . $clean['name'] . '</div>';
            } ?>
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <?php if (isset($clean['tel'])) {
              echo '<div class="p-contact__textbox--confirmation">' . $clean['tel'] . '</div>';
            } ?>
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <?php if (isset($clean['email'])) {
              echo '<div class="p-contact__textbox--confirmation">' . $clean['email'] . '</div>';
            } ?>
          </div>
          <div class="p-contact__textarea">
            <label for="message">お問い合わせ内容</label><br>
            <?php if (isset($clean['message'])) {
              echo '<div class="p-contact__textarea--confirmation">' . nl2br($clean['message']) . '</div>';
            } ?>
          </div>
          <div class="p-contact__button-container">
            <div class="p-contact__button c-button--back">
              <input type="submit" name="back" value="戻る">
            </div>
            <div class="p-contact__button c-button--default">
              <input type="submit" name="submit" value="送信">
            </div>
          </div>
          <input type="hidden" name="name" value="<?php echo $clean['name'] ?>">
          <input type="hidden" name="tel" value="<?php echo $clean['tel'] ?>">
          <input type="hidden" name="email" value="<?php echo $clean['email'] ?>">
          <input type="hidden" name="message" value="<?php echo $clean['message'] ?>">
        </form>
        <!-- お問い合わせフォーム確認ページここまで -->
        <!-- お問い合わせフォーム完了ページここから -->
        <?php elseif ($page_flag === 2) : ?>
        <h2 class="p-contact__section-title c-text__section-title">送信が完了しました。</h2>
        <div class="p-contact__button c-button--top">
          <a href="../index.php">トップへ戻る</a>
        </div>
        <?php endif; ?>
        <!-- お問い合わせフォーム完了ページここまで -->
      </div>
    </div>
  </main>

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
  <script src="../js/main.js"></script>
</body>

</html>