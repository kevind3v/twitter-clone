$(function () {
  let textarea = $('textarea#post-text');
  textarea.emojioneArea({
    pickerPosition: 'bottom',
    search: false,
    template: '<editor/>',
  });
  $('.emoji_picker').on('click', function (e) {
    if (textarea.get(0).emojioneArea.isOpened()) {
      textarea.get(0).emojioneArea.hidePicker();
    } else {
      textarea.get(0).emojioneArea.showPicker();
    }
  });
});
