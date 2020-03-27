<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>クリ★スタコーディング課題【初級編】</title>
  <meta name="description" content="">
  <link rel="apple-touch-icon" sizes="180x180" href="image/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="image/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="image/favicon/favicon-16x16.png">
  <link rel="manifest" href="image/favicon/site.webmanifest">
  <link rel="mask-icon" href="image/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- Google_Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700|Roboto:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body ontouchstart="">
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__inner">
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
        <a class="p-header__menu">
          <span class="p-header__menuLine"></span>
          <span class="p-header__menuLine"></span>
          <span class="p-header__menuLine"></span>
        </a>
      </div>
    </div>
  </header>
  <main class="l-main">
    <section class="p-mainVisual">
      <div class="p-mainVisual__catch">
        <p>Cresta Design.</p>
      </div>
    </section>
    <section id="about" class="p-about">
      <div class="p-about__inner">
        <h2 class="c-text__sectionTitle">About</h2>
        <h3 class="c-text__sectionSubTitle">
          ミニマルで<br>
          洗練されたデザインを。
        </h3>
        <p class="c-text">
          近年、ミニマルなデザインが流行しています。そこで弊社では、クライアント企業様新規サービス等の課題に対してミニマルで洗練されたデザインを実現させることで解決のサポートを致します。もちろん全てのサービスにおいてミニマルなデザインが課題解決になるわけではないので、課題や今後のサービスの展開等しっかりとヒアリングを行なった上でご提案させて頂きます。
        </p>
      </div>
    </section>
    <section id="service" class="p-service">
      <div class="p-service__inner">
        <h2 class="p-service__sectionTitle c-text__sectionTitle">Service</h2>
        <div class="p-service__container">
          <div class="p-service__textContainer">
            <h3 class="p-service__subTitle c-text__sectionSubTitle">
              リリース時のサポートで<br>
              サービスのブランディングを
            </h3>
            <p class="p-service__text c-text">
              弊社では、リリース時もサポートさせて頂きます。プレスリリース用のサイトや動画制作を通して、サービスのブランディングを行わせて頂きます。
            </p>
          </div>
          <div class="p-service__image">
            <img src="image/service-image@2x.jpg" alt="">
          </div>
        </div>
        <div class="p-service__container">
          <div class="p-service__textContainer">
            <h3 class="p-service__subTitle c-text__sectionSubTitle">
              リリース後のサポートで<br>
              効果を最大化させる
            </h3>
            <p class="p-service__text c-text">
              弊社では、リリース後もサポートさせて頂きます。サービスはリリース後に様々な課題にぶつかります。そこでクライアント様と一緒に改善を行うことで、デザインの効果を最大化させます。
            </p>
          </div>
          <div class="p-service__image">
            <img src="image/service-image02@2x.jpg" alt="">
          </div>
        </div>
      </div>
    </section>
    <section id="news" class="p-news">
      <div class="p-news__inner">
        <h2 class="c-text__sectionTitle">News</h2>
        <div class="p-news__container">
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="image/card-image1@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="image/card-image2@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="image/card-image3@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
        </div>
      </div>
    </section>
    <section id="contact" class="p-contact">
      <div class="p-contact__inner">
        <h2 class="p-contact__sectionTitle c-text__sectionTitle">お問い合わせ</h2>
        <form action="php/contact.php" method="post">
          <div>
            <label for="name">担当者名</label><br>
            <input class="p-contact__textbox" type="text" id="name" name="name" required />
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <input class="p-contact__textbox" type="text" id="tel" name="tel" required />
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <input class="p-contact__textbox" type="text" id="email" name="email" required />
          </div>
          <div class="p-contact__messageArea">
            <label for="message">お問い合わせ内容</label><br>
            <textarea id="message" name="message" required></textarea>
          </div>
          <input type="hidden" id="token" name="token" value="1234567" />
          <div class="p-contact__button c-button">
            <input type="submit" value="送信">
          </div>
        </form>
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
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>