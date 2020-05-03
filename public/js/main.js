/* ================================================================
  javascript
   ================================================================ */
"use strict";

/* ================================================================
  jQuery
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // ハンバーガーメニュー
  // ---------------------------------------------
  const mq = window.matchMedia("screen and (max-width:767px)");

  const $header = $(".p-header"),
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
    const speed = 500,
      href = $(this).attr("href"),
      target = $(href == "#" || href == "" ? "html" : href),
      headerHeight = $header.outerHeight(),
      position = target.offset().top - headerHeight; // ヘッダーの高さ分スクロール量を減らす
    $("html, body").animate({ scrollTop: position }, speed);
  });

  // ---------------------------------------------
  // スクロールフェードイン
  // ---------------------------------------------

  const effectPos = 300, // 画面下からどの位置でフェードさせるか(px)
    effectMove = 50, // どのぐらい要素を動かすか(px)
    effectTime = 2000; // エフェクトの時間(ms) 1秒なら1000

  // フェードする前のcssを定義
  $(".js-scroll-fadein").css({
    opacity: 0,
    transform: `translateY(${effectMove}px)`,
  });

  // スクロールまたはロードするたびに実行
  $(window).on("scroll load", function () {
    const scrollBtm = $(this).scrollTop() + $(this).height(),
      threshold = scrollBtm - effectPos;

    // 要素が可視範囲に入ったとき、エフェクトが発動
    $(".js-scroll-fadein").each(function () {
      const thisPos = $(this).offset().top;
      if (threshold > thisPos) {
        $(this).css({
          opacity: 1,
          transform: "translateY(0)",
          transition: `${effectTime}ms`,
        });
      }
    });
  });
});

var app = new Vue({
  el: "#app",
  data: {
    name: "",
    tel: "",
    email: "",
    message: "",
    nameEmptyError: false,
    telEmptyError: false,
    emailEmptyError: false,
    messageEmptyError: false,
    nameValidationError: false,
    telValidationError: false,
    emailValidationError: false,
  },
  methods: {
    nameEmptyCheck: function () {
      if (this.name === "") {
        this.nameEmptyError = true;
      } else {
        this.nameEmptyError = false;
      }
    },
    nameValidationCheck: function () {
      this.nameEmptyError = false;
      if (this.name.length > 20) {
        this.nameValidationError = true;
      } else {
        this.nameValidationError = false;
      }
    },
    telEmptyCheck: function () {
      if (this.tel === "") {
        this.telEmptyError = true;
      } else {
        this.telEmptyError = false;
      }
    },
    telValidationCheck: function () {
      this.telEmptyError = false;
      var telPattern = /^0\d{1,4}-\d{1,4}-\d{3,4}$/;
      if (!telPattern.test(this.tel)) {
        this.telValidationError = true;
      } else {
        this.telValidationError = false;
      }
    },
    emailEmptyCheck: function () {
      if (this.email === "") {
        this.emailEmptyError = true;
      } else {
        this.emailEmptyError = false;
      }
    },
    emailValidationCheck: function () {
      this.emailEmptyError = false;
      var emailPattern = /^.*@.*/;
      if (emailPattern.test(this.email)) {
        this.emailValidationError = false;
      } else {
        this.emailValidationError = true;
      }
    },
    messageEmptyCheck: function () {
      if (this.message === "") {
        this.messageEmptyError = true;
      } else {
        this.messageEmptyError = false;
      }
    },
  },
  computed: {
    enteredAll() {
      var requiredFields = [this.name, this.tel, this.email, this.message];
      return requiredFields.indexOf("") === -1;
    },
    validatedAll() {
      var validatedValue = [
        this.nameValidationError,
        this.telValidationError,
        this.emailValidationError,
      ];
      return validatedValue.indexOf(true) === -1;
    },
  },
});
