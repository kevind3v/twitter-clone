$(function () {
  /* TEXTAREA TWEET */
  let textarea = $('textarea#post-text');
  const button = $('.emoji_picker');
  var e = textarea.emojioneArea({
    search: false,
    pickerPosition: 'bottom',
  });
  e[0].emojioneArea.on('keyup', function (e) {
    e[0].innerHTML.length > 0
      ? $('.preview_images').css('margin-top', '10px')
      : $('.preview_images').css('margin-top', '0px');
  });
  button.on('click', function (e) {
    textarea.data('emojioneArea').showPicker();
  });
  /* MULTIPLE FILES */
  $('input[d-attr="images"]').on('change', function (e) {
    let app = this;
    // let app_el = $(app.$el);
    // console.log(e.target.files);
    let images = e.target.files;
    if (images.length) {
      for (var i = 0; i < images.length; i++) {
        var formData = new FormData();
        var break_loop = false;
        formData.append('image', images[i]);
        $.ajax({
          url: 'http://localhost/twitter/upload_post_image',
          type: 'POST',
          dataType: 'json',
          processData: false,
          data: formData,
          beforeSend: function () {
            $('.btn-icons .btn-icon').attr('disabled', true);
          },
          success: function (data) {
            console.log(data);
          },
          complete: function () {
            $('.btn-icons .btn-icon').attr('disabled', false);
          },
        });
      }
    }
  });
});
