$(() => {
  var cropperAvatar = $('#cropper_avatar');
  var cropperBanner = $('#cropper_banner');
  var cropper;
  var avatar = document.getElementById('image_avatar');
  var banner = document.getElementById('image_banner');
  $('.image_cropper').on('change', (event) => {
    var files = event.target.files;
    var id = event.target.id;
    var done = (url) => {
      var image = document.getElementById('image_' + id);
      image.src = url;
      $('#cropper_' + id).modal({ backdrop: 'static', keyboard: false });
    };

    if (files && files.length > 0) {
      reader = new FileReader();
      reader.onload = (event) => {
        done(reader.result);
      };
      reader.readAsDataURL(files[0]);
    }
  });
  cropperAvatar
    .on('shown.bs.modal', () => {
      cropper = new Cropper(avatar, {
        aspectRatio: 1,
      });
    })
    .on('hidden.bs.modal', () => {
      cropper.destroy();
      cropper = null;
    });
  cropperBanner
    .on('shown.bs.modal', () => {
      cropper = new Cropper(banner, {
        aspectRatio: 16 / 9,
      });
    })
    .on('hidden.bs.modal', () => {
      cropper.destroy();
      cropper = null;
    });
  $('.crop_avatar').on('click', (event) => {
    var canvas = cropper.getCroppedCanvas({
      minWidth: 500,
      minHeight: 500,
      imageSmoothingQuality: 'high',
    });
    canvas.toBlob((b) => {
      url = URL.createObjectURL(b);
      var reader = new FileReader();
      reader.readAsDataURL(b);
      reader.onloadend = () => {
        var base64 = reader.result;
        $('#profile_avatar').attr('src', base64);
        $('#user_avatar').attr('value', base64);
        $('#avatar').val('');
        cropperAvatar.modal('hide');
      };
    });
  });
  $('.crop_banner').on('click', (event) => {
    var canvas = cropper.getCroppedCanvas({
      minWidth: 600,
      minHeight: 200,
      imageSmoothingQuality: 'high',
    });
    canvas.toBlob((b) => {
      url = URL.createObjectURL(b);
      var reader = new FileReader();
      reader.readAsDataURL(b);
      reader.onloadend = () => {
        var base64 = reader.result;
        $('#profile_banner').css('background-image', "url('" + base64 + "')");
        $('#user_banner').attr('value', base64);
        $('#banner').val('');
        cropperBanner.modal('hide');
      };
    });
  });
});
