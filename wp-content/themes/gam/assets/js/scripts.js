$(document).ready(function() {
  $("#menu-toggle").on('click', function() {
    if ($('nav').hasClass('active')) {
      $(this).find('.material-icons').text('menu');
      $('nav').slideUp(400, function() {
        $('nav').removeClass('active');
      });
    } else {
      $(this).find('.material-icons').text('close');
      $('nav').addClass('active').slideDown();
    }
  })

  var socialMenuLength = $(".menu-social-container li").length;
  for (var i = 1; i <= socialMenuLength; i++) {
    var socialClass = $('.menu-social-container li:nth-child(' + i + ')').text().toLowerCase();
    var wrap = "<i class='socicon-" + socialClass + "'></i>";
    $('.menu-social-container li:nth-child(' + i + ') a').html(wrap);
  }

  var input = $("input");
  var textarea = $("textarea");
  input.on('focus', function() {
    $(".input-field").removeClass("active");
    $(this).parent().parent().addClass("active");
  })
  textarea.on('focus', function() {
    $(".input-field").removeClass("active");
    $(this).parent().parent().addClass("active");
  })
  input.on('focusout', function() {
    $(".input-field").removeClass('active');
  })
  textarea.on('focusout', function() {
    $(".input-field").removeClass('active');
  })

  $(".comment-respond input").on('focus', function() {
    $("#commentform p").removeClass('active');
    $(this).parent().addClass("active");
  })
  $(".comment-respond textarea").on('focus', function() {
    $("#commentform p").removeClass('active');
    $(this).parent().addClass('active');
  })
})

$(window).on('resize', function() {
  if ($(window).width() > 575) {
    $('nav').removeClass('active').attr("style", "");
    $('#menu-toggle').find('.material-icons').text('menu');
  }
})
