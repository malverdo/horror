$(function() {
    $('.js-menu-toggle').on('click', function() {
      $(this).toggleClass('is-active').closest('.header').toggleClass('is-menu-open');
    });
  });
// $('.single-item').slick();
$(document).ready(function(){
  $('.slide').slick();
});


