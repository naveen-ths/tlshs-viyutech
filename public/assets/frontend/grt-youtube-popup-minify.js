/*!
 * GRT Youtube Popup - jQuery Plugin
 * Version: 1.0
 * Author: GRT107
 *
 * Copyright (c) 2017 GRT107
 * Released under the MIT license
*/ !function(t){t.fn.grtyoutube=function(e){return this.each(function(){var o=t(this).attr("youtubeid"),u=t.extend({videoID:o,autoPlay:!0,theme:"dark"},e);!0===u.autoPlay?u.autoPlay=1:!1===u.autoPlay&&(u.autoPlay=0),"dark"===u.theme?u.theme="grtyoutube-dark-theme":"light"===u.theme&&(u.theme="grtyoutube-light-theme"),o&&t(this).on("click",function(){t("body").append('<div class="grtyoutube-popup '+u.theme+'"><div class="grtyoutube-popup-content"><span class="grtyoutube-popup-close"></span><iframe class="grtyoutube-iframe" src="https://www.youtube.com/embed/'+u.videoID+"?rel=0&wmode=transparent&autoplay="+u.autoPlay+'&iv_load_policy=3" allowfullscreen frameborder="0" allow="autoplay; fullscreen"></iframe></div></div>')}),t(this).on("click",function(e){e.preventDefault(),t(".grtyoutube-popup-close, .grtyoutube-popup").click(function(){t(".grtyoutube-popup").remove()})}),t(document).keyup(function(e){27==e.keyCode&&t(".grtyoutube-popup").remove()})})}}(jQuery);