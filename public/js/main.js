/* ================================================================
  javascript
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // ハンバーガーメニュー
  // ---------------------------------------------
  var mq = window.matchMedia("screen and (max-width:767px)");

  function checkBreakPoint(mq) {
    // 画面幅767px以下で有効
    if (mq.matches) {
      // メニューアイコン開閉有効
      $(".p-header__menu").on("click", function () {
        $(".p-header__menuLine").stop(true).toggleClass("active");
        $(".p-header__nav").stop(true).fadeToggle();
      });

      // ナビの余白クリックでメニュー開閉
      $(".p-header__nav").on("click", function () {
        if ($(".p-header__menuLine").hasClass("active")) {
          $(".p-header__menuLine").stop(true).toggleClass("active");
          $(".p-header__nav").stop(true).fadeToggle();
        }
      });
    }
  }
  checkBreakPoint(mq);

  // ---------------------------------------------
  // スムーススクロール（ページ内リンク）
  // ---------------------------------------------

  $(".js-smoothscroll").click(function () {
    var speed = 500,
      href = $(this).attr("href"),
      target = $(href == "#" || href == "" ? "html" : href),
      headerHeight = $(".p-header").outerHeight(),
      position = target.offset().top - headerHeight; // ヘッダーの高さ分スクロール量を減らす
    $("html, body").animate({ scrollTop: position }, speed);
  });
});
