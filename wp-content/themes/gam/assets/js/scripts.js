var isSafari = false;
$(document).ready(function() {
  $("#menu-toggle").on('click', function() {
    navToggle();
  })

  if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
    isSafari = true;
    $("header").addClass('safariDisplay');
  }

  catMenu(isSafari);

  $('main, footer').on('click', function() {
    if ($("nav").hasClass('active')) {
      navToggle();
    }
  })

  $("#cats").on('click', function() {
    $("#cats .categories").toggleClass('clicked');
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
    catMenu(isSafari);
  }
  if ($(window).width() > 768) {
    $("nav, header form, #cats").removeAttr("style");
    catMenu(isSafari);
  }
})

$(window).on('scroll', function() {
  if ($(window).width() < 768) {
    fixHeader();
  }
})

function navToggle() {
  if ($('nav').hasClass('active')) {
    $('#menu-toggle .material-icons').text('menu');
    $("header form").slideUp(200, function() {
      $("#cats").slideUp(200, function() {
        $("nav").slideUp(200, function() {
          $("nav, header form, #cats").removeClass('active');
        })
      })
    })
  } else {
    $('#menu-toggle .material-icons').text('close');
    $('nav').addClass('active').slideDown(200, function() {
      $("#cats").addClass('active').slideDown(200, function() {
        var id = window.setTimeout(mobileSearchBar, 200);
      });
    });
  }
}

function catMenu(safariFlag) {
 if ($(window).width() > 768 && !safariFlag) {
    var pos = $("#cats").position().top;
    var ulHeight = $("#cats ul").height();
    var liCount = $("#cats ul li").length;
    var offset = pos - ulHeight - ((liCount * 20) - (liCount * 1.3));
    $("#cats ul").css({"top": offset});
  } else {
    $("#cats ul").removeAttr("style");
  }
}

function mobileSearchBar() {
  var ulHeight = $("#cats").height();
  var navHeight = $("nav").height();
  var headerHeight = $("header").height();
  var offset = ulHeight + navHeight + headerHeight;
  $("header form").css({"top": offset});
  $("header form").addClass('active').slideDown();
}

function fixHeader() {
  var pageY = window.pageYOffset;
  var pos = $("header").position().top;
  if (!$('nav').hasClass('active')) {
    $("header").css({
      "top": pageY
    });
  } else {
    if (pos > pageY) {
      $("header").css({
        "top": pageY
      });
    }
  }
}
