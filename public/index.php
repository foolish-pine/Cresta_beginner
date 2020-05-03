<!-- コンタクトフォーム用PHPここから -->
<?php
session_start();

// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

// トークン生成
if (!isset($token)) {
  $token = sha1(random_bytes(30));
  $_SESSION['token'] = $token;
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
  <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png" />
  <link rel="icon" href="./img/favicon/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css" />
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
          <li class="p-header__item"><a class="js-smoothscroll" href="#about">About</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#service">Service</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#news">News</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#contact">Contact</a></li>
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
    <!-- メインビジュアルここから -->
    <div class="p-main-visual">
      <div class="p-main-visual__catch">
        <p>Cresta Design.</p>
      </div>
    </div>
    <!-- メインビジュアルここから -->
    <!-- aboutコンテンツここから -->
    <div id="about" class="p-about">
      <div class="p-about__inner">
        <h2 class="c-text__section-heading">About</h2>
        <h3 class="c-text__section-sub-heading">
          ミニマルで<br>
          洗練されたデザインを。
        </h3>
        <p class="c-text">
          近年、ミニマルなデザインが流行しています。そこで弊社では、クライアント企業様新規サービス等の課題に対してミニマルで洗練されたデザインを実現させることで解決のサポートを致します。もちろん全てのサービスにおいてミニマルなデザインが課題解決になるわけではないので、課題や今後のサービスの展開等しっかりとヒアリングを行なった上でご提案させて頂きます。
        </p>
      </div>
    </div>
    <!-- aboutコンテンツここまで -->
    <!-- serviceコンテンツここから -->
    <div id="service" class="p-service">
      <div class="p-service__inner">
        <h2 class="p-service__section-heading c-text__section-heading">Service</h2>
        <div class="p-service__container">
          <div class="p-service__text-container">
            <h3 class="p-service__sub-heading c-text__section-sub-heading">
              リリース時のサポートで<br>
              サービスのブランディングを
            </h3>
            <p class="p-service__text c-text">
              弊社では、リリース時もサポートさせて頂きます。プレスリリース用のサイトや動画制作を通して、サービスのブランディングを行わせて頂きます。
            </p>
          </div>
          <div class="p-service__image  js-scroll-fadein">
            <img src="img/service-image@2x.jpg" alt="">
          </div>
        </div>
        <div class="p-service__container">
          <div class="p-service__text-container">
            <h3 class="p-service__sub-heading c-text__section-sub-heading">
              リリース後のサポートで<br>
              効果を最大化させる
            </h3>
            <p class="p-service__text c-text">
              弊社では、リリース後もサポートさせて頂きます。サービスはリリース後に様々な課題にぶつかります。そこでクライアント様と一緒に改善を行うことで、デザインの効果を最大化させます。
            </p>
          </div>
          <div class="p-service__image  js-scroll-fadein">
            <img src="img/service-image02@2x.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- serviceコンテンツここまで -->
    <!-- newsコンテンツここから -->
    <div id="news" class="p-news">
      <div class="p-news__inner">
        <h2 class="c-text__section-heading">News</h2>
        <div class="p-news__container">
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="img/card-image1@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="img/card-image2@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="img/card-image3@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- newsコンテンツここまで -->
    <!-- コンタクトフォームここから -->
    <div id="contact" class="p-contact">
      <div class="p-contact__inner">
        <h2 class="p-contact__section-heading c-text__section-heading">お問い合わせ</h2>
        <div id="app">
          <form method="post" action="contact/index.php" onsubmit="return (confirm('この内容で送信します。\nよろしいですか？'));">
            <input type="hidden" name="token" value="<?= $token ?>">
            <div class="p-contact__textbox-container">
              <label class="p-contact__textbox-label" for="name">担当者名</label>
              <span v-if="nameEmptyError" class="p-contact__error">「担当者名」は必ず入力してください。</span>
              <span v-if="nameValidationError" class="p-contact__error">「担当者名」は20文字以内で入力してください。</span>
              <div>
                <input class="p-contact__textbox" type="text" id="name" name="name" v-model="name" :class="{'p-contact__textbox--error': nameEmptyError || nameValidationError}" @input="nameValidationCheck" @blur="nameEmptyCheck">
              </div>
            </div>
            <div class="p-contact__textbox-container">
              <label class="p-contact__textbox-label" for="tel">電話番号</label>
              <span v-if="telEmptyError" class="p-contact__error">「電話番号」は必ず入力してください。</span>
              <span v-if="telValidationError && !telEmptyError" class="p-contact__error">「電話番号」は
                「-」を含む半角数字で入力してください。</span>
              <div>
                <input class="p-contact__textbox" type="text" id="tel" name="tel" v-model="tel" :class="{'p-contact__textbox--error': telEmptyError || telValidationError}" @input="telValidationCheck" @blur="telEmptyCheck">
              </div>
            </div>
            <div class="p-contact__textbox-container">
              <label class="p-contact__textbox-label" for="email">メールアドレス</label>
              <span v-if="emailEmptyError" class="p-contact__error">「メールアドレス」は必ず入力してください。</span>
              <span v-if="emailValidationError && !emailEmptyError" class="p-contact__error">「メールアドレス」は「＠」を含むものを入力してください。</span>
              <div>
                <input class="p-contact__textbox" type="text" id="email" name="email" v-model="email" :class="{'p-contact__textbox--error': emailEmptyError || emailValidationError}" @input="emailValidationCheck" @blur="emailEmptyCheck">
              </div>
            </div>
            <div class="p-contact__textarea">
              <label class="p-contact__textbox-label" for="message">お問い合わせ内容</label>
              <span v-if="messageEmptyError" class="p-contact__error">「お問い合わせ内容」は必ず入力してください。</span>
              <div>
                <textarea id="message" name="message" v-model="message" :class="{'p-contact__textbox--error': messageEmptyError}" @input="messageEmptyCheck" @blur="messageEmptyCheck"></textarea>
              </div>
            </div>
            <div :class="['p-contact__button', !enteredAll || !validatedAll ? 'c-button--inactive' : 'c-button--default']">
              <input type="submit" name="confirmation" value="確認画面へ" :disabled="!(enteredAll && validatedAll)">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- コンタクトフォームここまで -->
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
  <script src="./js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="./js/Vue.js/vue.min.js"></script>
  <script src="./js/main.js"></script>
</body>

</html>