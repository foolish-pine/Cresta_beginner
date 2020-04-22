/* ================================================================
  javascript
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // ハンバーガーメニュー
  // ---------------------------------------------
  var mq = window.matchMedia("screen and (max-width:767px)");

  var $header = $(".p-header"),
    $headerNav = $(".p-header__nav"),
    $hamburgerMenu = $(".js-hamburger-menu"),
    $hamburgerMenuLine = $(".js-hamburger-menu-line");

  $(window).on("resize", function () {
    if (mq.matches) {
      // 画面幅767px以下のとき
      // navを非表示にする
      $headerNav.hide();
      // メニューアイコンを非activeにする
      $hamburgerMenuLine.removeClass("active");
    } else {
      // 画面幅768px以上のとき
      // navを表示させる
      $headerNav.show();
    }
  });

  // メニューアイコンをクリックしてnavを開閉する
  $hamburgerMenu.on("click", function () {
    $hamburgerMenuLine.stop(true).toggleClass("active");
    $headerNav.stop(true).fadeToggle();
  });

  // ナビの余白クリックでメニュー閉じる
  $headerNav.on("click", function () {
    if ($hamburgerMenuLine.hasClass("active")) {
      $hamburgerMenuLine.stop(true).toggleClass("active");
      $headerNav.stop(true).fadeToggle();
    }
  });

  // ---------------------------------------------
  // スムーススクロール（ページ内リンク）
  // ---------------------------------------------

  $(".js-smoothscroll").click(function () {
    var speed = 500,
      href = $(this).attr("href"),
      target = $(href == "#" || href == "" ? "html" : href),
      headerHeight = $header.outerHeight(),
      position = target.offset().top - headerHeight; // ヘッダーの高さ分スクロール量を減らす
    $("html, body").animate({ scrollTop: position }, speed);
  });

  // ---------------------------------------------
  // スクロールフェードイン
  // ---------------------------------------------

  var effect_move = 50, // どのぐらい要素を動かすか(px)
    effect_time = 800; // エフェクトの時間(ms) 1秒なら1000

  // フェードする前のcssを定義
  $(".js-scroll-fadein").css({
    opacity: 0,
    transform: "translateY(" + effect_move + "px)",
    transition: effect_time + "ms",
  });

  // スクロールまたはロードするたびに実行
  $(window).on("scroll load", function () {
    var windowBtm = $(this).scrollTop() + $(this).height();

    // 要素が可視範囲に入ったとき、エフェクトが発動
    $(".js-scroll-fadein").each(function () {
      var thisPos = $(this).offset().top;
      if (windowBtm > thisPos) {
        $(this).css({
          opacity: 1,
          transform: "translateY(0)",
        });
      }
    });
  });
});
