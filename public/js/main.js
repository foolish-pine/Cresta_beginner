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
    $headerMenu = $(".p-header__menu"),
    $headerMenuLine = $(".p-header__menu-line");

  $(window).on("resize", function () {
    if (mq.matches) {
      // 画面幅767px以下のとき
      // navを非表示にする
      $headerNav.hide();
      // メニューアイコンを非activeにする
      $headerMenuLine.removeClass("active");
    } else {
      // 画面幅768px以上のとき
      // navを表示させる
      $headerNav.show();
    }
  });

  // メニューアイコンをクリックしてnavを開閉する
  $headerMenu.on("click", function () {
    $headerMenuLine.stop(true).toggleClass("active");
    $headerNav.stop(true).fadeToggle();
  });

  // ナビの余白クリックでメニュー閉じる
  $headerNav.on("click", function () {
    if ($headerMenuLine.hasClass("active")) {
      $headerMenuLine.stop(true).toggleClass("active");
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
});
