let transition = () => {
  $('html').addClass('transition')
  window.setTimeout(() => {
    $('html').removeClass('transition')
  }, 1000)
}
$('#theme-checkbox').on('change', function () {
  if (this.checked) {
    transition()
    $('html').attr('data-theme', 'dark')
  } else {
    transition()
    $('html').attr('data-theme', 'light')
  }
})
