$(function () {
  $('.calendar-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var getDate = $(this).attr('getDate');
    var getPart = $(this).attr('getPart');
    $('.getDate').text(getDate);
    $('.getPart').text(getPart);
    $('.test').val(getDate);
    $('.test-part').val(getPart);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
