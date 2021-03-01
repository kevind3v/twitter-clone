$(function () {
  $(document).on('submit', "form:not('.ajax_off')", function (e) {
    e.preventDefault();
    var form = $(this);
    var load = $('#loading');
    var flashClass = 'ajax_response';
    var flash = $('#' + form[0].getAttribute('id') + ' .' + flashClass);

    form.ajaxSubmit({
      url: form.attr('action'),
      type: 'POST',
      dataType: 'json',
      beforeSend: function () {
        load.show();
      },
      success: function (response) {
        //redirect
        if (response.redirect) {
          window.location.href = response.redirect;
        } else {
          //message
          if (response.message) {
            flash.html(response.message).fadeIn(100);
          } else {
            flash.html('').fadeOut(100);
            window.location.reload();
          }
        }
      },
      complete: function () {
        load.hide();
        if (form.data('reset') === true) {
          form.trigger('reset');
        }
      },
    });
  });
});
