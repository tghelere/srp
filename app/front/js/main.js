$(document).ready(function () {
  var colorbar = new Nanobar({target: document.getElementById('color')});
  colorbar.go(100);

  new WOW().init();

    $('#ChangeToggle').click(function() {
     $('#navbar-menu').toggleClass('hidden');
     $('#navbar-close').toggleClass('hidden');
   });


  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=936028466417582";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

   //#main-slider
   var pag = window.document.activeElement.classList[0];
   if (pag == "index") {
       var slideHeight = $(window).height() - 58; //altura da tela* menos a altura do menu
   } else {
       var slideHeight = 445;
   }
   $('#banners .item').css('height', slideHeight);
   $(window).resize(function () {
       'use strict', $('#banners .item').css('height', slideHeight);
   });
   //Scroll Menu
   $(window).on('scroll', function () {
       if ($(window).scrollTop() > slideHeight) {
           $('.main-nav').addClass('navbar-fixed-top');
       } else {
           $('.main-nav').removeClass('navbar-fixed-top');
       }
   });
 });
