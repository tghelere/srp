$(document).ready(function(){

//nanobar - barra de carregamento da pagina
      var colorbar = new Nanobar({target: document.getElementById('color')})
      colorbar.go(100)

// Alertas
      var alertas = $("#alertas")
      $.ajax({
          type: "POST",
          url: "/alert/",
          dataType: "json",
          success: function (data) {
            if(data != null){
              new Noty({
                text: data.msg,
                type: data.type,
                layout: 'top',
                timeout: 5000,
              }).show();
            }
          }
      })

//menu mobile
      $('.menu-open').click( function() {
        $('.open-menu').toggleClass('hidden')
        $('#navbar-close').toggleClass('hidden')
      })

// modal
      $('.modal-img').on('blur',function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'))
      })

// beneficios pilates
      var active = false
      $('.beneficio').click(function() {
        active = !active
        if (active) {
          $(this).addClass("active")
        } else {
          $(this).removeClass("active")
        }        
      })

//Scroll Menu desktop 
      $(window).on('scroll', function() {
          if ($(window).scrollTop() > $('.carousel').height()) {
              $('.main-nav').addClass('navbar-fixed-top')
          } else {
              $('.main-nav').removeClass('navbar-fixed-top')
          }
      })

// mascara do form contato
      var maskBehavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
        options = {
          onKeyPress: function(val, e, field, options){
            field.mask(maskBehavior.apply({}, arguments), options);
          }
        };

      $('.phone').mask(maskBehavior, options);



      if(navigator.userAgent.indexOf("Speed Insights") == -1) { 
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j, f);})(window, document, 'script', 'dataLayer', 'GTM-KMCXTXJ')
      }

      new LazyLoad({
        elements_selector: "iframe"
      })

})



