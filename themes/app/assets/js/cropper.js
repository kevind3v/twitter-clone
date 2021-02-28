$(() => {
  var cropperAvatar = $('#cropper_avatar');
  var cropper;
  var avatar = document.getElementById('image_avatar');
  $('#avatar').on('change', (event) => {
    var files = event.target.files;

    var done = (url) => {
      avatar.src = url;
      cropperAvatar.modal({ backdrop: 'static', keyboard: false });
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
  $('#crop_avatar').on('click', () => {
    canvas = cropper.getCroppedCanvas({
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
});
