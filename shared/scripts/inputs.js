$('.i-form').on('keyup', function () {
  console.log('dsa');
  var length = $(this).val().length;
  var id = $(this)[0].getAttribute('id');
  if (length > 0) {
    $('[for=' + id + ']').addClass('l-form');
  } else {
    $('[for=' + id + ']').removeClass('l-form');
  }
});

$('#bio').on('keyup click', function () {
  var length = $(this).val().length;
  $('.forms .count-bio span').html(length);
  if (length >= 160) {
    this.value = this.value.substring(0, 159);
  }
});

$('#location').on('keyup click', function () {
  var length = $(this).val().length;
  $('.forms .count-location span').html(length);
  if (length >= 30) {
    this.value = this.value.substring(0, 29);
  }
});
