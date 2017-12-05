$(document).ready(function () {

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
      $('.menu-open').click(function() {
        $('.open-menu').toggleClass('hidden')
        $('#navbar-close').toggleClass('hidden')
      })

// modal
      $('.modal-img').on('click', function () {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'))
      })    

//Scroll Menu desktop 
      $(window).on('scroll', () => {
          if ($(window).scrollTop() > $('.carousel').height()) {
              $('.main-nav').addClass('navbar-fixed-top')
          } else {
              $('.main-nav').removeClass('navbar-fixed-top')
          }
      })

// mascara do form contato
  var maskBehavior = function (val) {
   return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009'
  },
  options = {onKeyPress: function(val, e, field, options) {
   field.mask(maskBehavior.apply({}, arguments), options)
   }
  }

  $('.fone').mask(maskBehavior, options)
})



