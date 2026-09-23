$('.header-search-wrapper .search-main').click(function(){
    $('.search-form-main').toggleClass('active-search');
    $('.search-form-main .search-field').focus();
});


$('.search-icon').on('click', function() {
  $(this).toggleClass('active');
})