<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src="{{asset('assets/frontend/css/ho/script.js')}}"></script>
<script src="{{asset('assets/frontend/css/script-minify.js')}}"></script>
<script src="{{asset('assets/frontend/css/nav/script.js')}}"></script>
<script src="{{asset('assets/frontend/css/top-nav/script-minify.js')}}"></script>
<script src="{{asset('assets/frontend/OwlCarousel2/2.3.4/owl.carousel.min.js')}}">
</script>
<script src="{{asset('assets/frontend/sl/script-minify.js')}}"></script>
<script src="{{asset('assets/frontend/css/sh/script-m.js')}}"></script>

<script src="{{asset('assets/frontend/css/sd/slimselect-minify.js')}}"></script>
<script src="{{asset('assets/frontend/css/sd/script.js')}}"></script>
<script src="{{asset('assets/frontend/css/tab-minify.js')}}"></script>
<script src="{{asset('assets/frontend/css/faq.js')}}"></script>

<!--<script type="text/javascript" src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/tlshs/ee-form-widget/form-1/widget.js"></script>-->

<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/pop-minify.css')}}">
<script>
$(function () {
    //----- OPEN
    $('[data-popup-open]').on('click', function (e) {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-close]').on('click', function (e) {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

        e.preventDefault();
    });
});
</script>


<script src="{{asset('assets/frontend/grt-youtube-popup-minify.js')}}"></script>
<!-- Initialize GRT Youtube Popup plugin -->
<script>
$(".youtube-link").grtyoutube({
    autoPlay: true,
    theme: "dark"
});
</script>

<script>
  window.onscroll = function () {
      myFunction()
  };

  var header = document.getElementById("header-id");
  var sticky = header.offsetTop;

  function myFunction() {
      if (window.pageYOffset > sticky) {
          header.classList.add("sticky");
      } else {
          header.classList.remove("sticky");
      }
  }
</script>

<script>
  $(".but").click(function () {
      // Close all open windows
      $(".footerbox").stop().slideUp(300);
      // Toggle this window open/close
      $(this).next(".footerbox").stop().slideToggle(300);
      //hitter test// 
      $(".active").show()
  });

  $('.but').on('click', function () {
      $(this).toggleClass('active');
  })
</script>


<script>
  var btn = $('#button');

  $(window).scroll(function () {
      if ($(window).scrollTop() > 350) {
          btn.addClass('show');
      } else {
          btn.removeClass('show');
      }
  });

  btn.on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({
          scrollTop: 0
      }, '300');
  });
//$.ajaxSetup({
//    headers: {
//        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//    }
//});
  $(document).ready(function () {
      $('#comment-submit-btn').on('click', function () {
          const message = $('#comment_message').val();
          const post_id = $('#post_id').val();
          const parent_id = $('#parent_id').val();
          $.ajax({
              url: 'https://tlshs.com/comment-save',
              type: 'POST',
              headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').val()
              },
              data: {message: message, post_id: post_id, parent_id: parent_id},
              success: function (response) {
                  if (response.status == 'success') {
                      window.location.reload();
                  }
              },
              error: function (xhr) {
                  console.error("Error fetching data:", xhr);
              }
          });
      });
      $('.reply-submit-btn').on('click', function () {
          const parent_comment_id = $(this).data('id');
          console.log('parent_comment_id', parent_comment_id);
          const message = $('#comment-reply-' + parent_comment_id + ' .reply_comment').val();
          const post_id = $('#comment-reply-' + parent_comment_id + ' .reply_post_id').val();
          const parent_id = parent_comment_id;
          $.ajax({
              url: 'https://tlshs.com/comment-save',
              type: 'POST',
              headers: {
                  'X-CSRF-TOKEN': $('#comment-reply-' + parent_comment_id + ' input[name="_token"]').val()
              },
              data: {message: message, post_id: post_id, parent_id: parent_id},
              success: function (response) {
                  if (response.status == 'success') {
                      window.location.reload();
                  }
              },
              error: function (xhr) {
                  console.error("Error fetching data:", xhr);
              }
          });
      });
  });
</script>
<script src="https://in4cdn.npfs.co/js/widget/npfwpopup.js"></script> 
<script>
  let npfWc5b6c4e8c2d57f19409612c15c4ec0bb = new NpfWidgetsInit({
  "widgetId": "c5b6c4e8c2d57f19409612c15c4ec0bb", 
    "baseurl": "widgets.in4.nopaperforms.com",
    "formTitle": "Enquiry Form", 
    "titleColor": "#FF0033", 
    "backgroundColor": "#fff", 
    "iframeHeight": "500px", 
    "buttonbgColor": "#BA1717",
    "buttonTextColor": "#FFF"
  });
</script>