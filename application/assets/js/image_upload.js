$(document).ready(function() {
  var 
  img_width = 239,
  img_height = 239,
  upload_btn = $('#upload'),
  img_name = '',
  baseUrl = 'localhost';

  $('input[type=file]').on('change', preUpload);

  function preUpload(event)
  {
    files = event.target.files;
  }

  $('.chg_img').on('click', function(e) {
    e.stopPropagation();
    e.preventDefault();
    url = $(this).attr('rel');
    upload_btn.click();

  });

  upload_btn.on('change', function () {
    var selected_file = $('#upload')[0].files;
    processUpload(selected_file);

    return false;
  });

  function processUpload(file) {
    var form_data = new FormData();
    form_data.append('filename', file.name);
    form_data.append('filetype', file.type);
    form_data.append('file', file);
    var cover_upload = 'cover_upload.php';
    $.ajax({
      url: '/application/assets/php/' + cover_upload,
      type: 'POST',
      data: form_data,
      processData: false,
      contentType: false,
      success: function(response) {
        response = $.parseJSON(response);
        console.log(response);
        if(response['status'] == 2){

        }
        else{
        processDimensions(response);
            $('#dropOutline').hide();
            $('#'+url+'_photo').css('background','url('+baseUrl+'application/media/images/'+imgName+')');
            $('#'+url+'_photo').css('background-size','cover');
            $('#'+url+'_photo').css('background-position','center center');
            $('#'+url+'_photo').css('display','block');
            $('#'+url+'_photo').attr('rel',imgName);
            $('#'+url+'_image').val(imgName);
            $('#'+url+'-photo-container').show();
          }
        }
      });
  }

  function processDimensions(scale){
    var dimensions = scale.split(',');
    img_width = dimensions[0];
    img_height = dimensions[1];
    img_name = dimensions[2];
  }

  if (typeof FileReader === "undefined") {
    //$('.extra').hide();
    $('#err').html('Hey! Your browser does not support <strong>HTML5 File API</strong> <br/>Try using Chrome or Firefox to have it works!');
  } else {
    $('#err').text('');
  }
});