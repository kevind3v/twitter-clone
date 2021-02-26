$('.i-form').on('keyup', function () {
  var length = $(this).val().length
  var id = $(this)[0].getAttribute('id')
  console.log($(this).val())
  if (length > 0) {
    $('[for=' + id + ']').addClass('l-form')
  } else {
    $('[for=' + id + ']').removeClass('l-form')
  }
})
$('.textarea')
  .each(function () {
    this.setAttribute('style', 'height:' + this.scrollHeight + 'px;overflow-y:hidden;')
  })
  .on('input', function () {
    this.style.height = 'auto'
    this.style.height = this.scrollHeight + 'px'
  })

$('#bio').on('keyup', function () {
  var length = $(this).val().length
  $('.forms .count-bio span').html(length)
  if (length >= 160) {
    this.value = this.value.substring(0, 159)
  }
})

$('#location').on('keyup', function () {
  var length = $(this).val().length
  $('.forms .count-location span').html(length)
  if (length >= 30) {
    this.value = this.value.substring(0, 29)
  }
})
