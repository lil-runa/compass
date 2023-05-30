$(function () {
  $('.search_conditions').on('click', function () {
    $(this).next().slideToggle(200);
    $(this).toggleClass('open', 200);
  });

  $('.subject_edit_btn').on('click', function () {
    $(this).next().slideToggle(200);
    $(this).toggleClass('open', 200);
  });
});
