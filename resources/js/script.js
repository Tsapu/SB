//======================================
// Globals
//======================================

jQuery.fn.swapOut = function() {
    return this.css("display", "none");
};
jQuery.fn.swapIn = function() {
    return this.css("display", "initial");
};

//======================================
// Book preview carousel
//======================================

import carouselControl from './carouselControl';
carouselControl();

//======================================
// Audio
//======================================

import musicPlayer from './musicPlayer';
musicPlayer();

//======================================
// Menu:
//======================================
(function menuDropdown() {
  let nav_open = false;
  $(".menu-open").click(function() {
    nav_open = true;
  	$(".menu-open").toggle();
  	$(".menu-close").toggle();
    $("#nav-header").css({"max-height": "600px"});

    // allows room for one more menu item to be added, can increase the value but that decreases animation performance
  });

  // A weird way to fix padding issues on the animation:
  $("#nav-header").on('transitionstart', function() {
    if (nav_open) {
      $(this).addClass("headerpad");
    }
  }).on('transitionend', function() {
    if (!nav_open) {
      $(this).removeClass("headerpad");
    }
  });

  $(".menu-close").click(function() {
    nav_open = false;
  	$(".menu-open").toggle();
  	$(".menu-close").toggle();
    $("#nav-header").css({"max-height": "0"});
  });
})();

//======================================
// Video
//======================================
(function videoPlayer() {
  const $videos = $('.embed-container'); let $currentVideo, videoIndex, videoUrl;
  $(".video-item").click(function() {
    videoIndex = $('.video-item').index(this);
    $("#video-overlay").show();
    $currentVideo = $videos.eq(videoIndex);
    $currentVideo.toggle();
  });
  $("#video-close").click(function() {
    $currentVideo.toggle();
    $("#video-overlay").hide();
    videoUrl = $currentVideo.children('iframe').attr("src"); // reloading video stops it from playing
    $currentVideo.children('iframe').attr("src", videoUrl);
  });
})();

//======================================
// Poem library
//======================================
(function poemList() {
  try {
    $(".poem-list").niceScroll(".scroll-js", {
      cursorcolor: "#92C6ED",
      cursorwidth: "12px",
      background: "#FFF",
      cursorborder: "none",
      cursorborderradius: 5,
      autohidemode: false,
      bouncescroll: false,
      zindex: 5,
      scrollbarid: 'poem-scroll'
    });

    let poemTitle, poemContent;
    $(".poem-item").click(function() {
      $(".poem-item > .poem-title").removeClass('fw-600');
      $(this).children('.poem-title').addClass('fw-600');
      poemTitle = $(this).children('.poem-title').text();
      poemContent = $(this).children('.poem-text').text();
      $("#poem-title").text(poemTitle);
      $("#poem-text").text(poemContent);
    });
    $(".poem-item").eq(2).trigger('click'); // Initiate with third item
  } catch (e) { return; } //  if not loaded on page, quit
})();

//======================================
// Email validation
//======================================
(function emailValidation() {
  function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
  }
  let errMsg = false;
  $(".wpcf7-email").keyup(function() {
    let input = $(this).val();
    let validEmail = validateEmail(input);

    if ( !validEmail && !errMsg ) { // if email not valid and msg not been set
      $(this).addClass('bg-red');
      $('.correct').hide();
      $(this).after([$('#email-error').show(), $('.incorrect').show()]);
      errMsg = true;
    } else if (validEmail) {
      $(this).removeClass('bg-red')
      $('#email-error, .incorrect').hide();
      $(this).after( $('.correct').show() );
      errMsg = false;
    } else if (!input.length) { // if input is blank
      $(this).removeClass('bg-red')
      $('#email-error, .incorrect, .correct').hide();
      errMsg = false;
    }
  });

  $('.wpcf7-form').submit(function() {
    $('.correct, #success-icon').hide();
    $(".wpcf7-textarea, .wpcf7-text").keyup(function() {
      if ($(this).val().length > 0) {
        $(this).css({"box-shadow" : "none"});
      } else { $(this).css({"box-shadow" : ""}) }
    })
  });

  $('.wpcf7').on('wpcf7mailsent', function() {
    $('.wpcf7-response-output').after($('#success-icon').show());
  });
})();


//======================================
