
<script>
  function overlay_show(){
      $('#overlay_form_input').show();
  }
  function overlay_fadeout(){
      $('#overlay_form_input').fadeOut('slow');
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#ganti_password").on("click", function (e) {
      e.preventDefault();
      // $('#login_error').hide();
      $('#spinners_data').show();
      var password_lama = $("#password_lama").val();
      var password_baru = $("#password_baru").val();
      if (password_lama == '') {
        $('#password_lama').css('background-color', '#DFB5B4');
      } else {
        $('#password_lama').removeAttr('style');
      }
      if (password_baru == '') {
        $('#password_baru').css('background-color', '#DFB5B4');
      } else {
        $('#password_baru').removeAttr('style');
      }
      $.ajax({
        type: "POST",
        async: true,
        data: {
          password_lama: password_lama,
          password_baru: password_baru,
        },
        dataType: "text",
        url: '<?php echo base_url(); ?>ganti_password/ganti',
        success: function (text) {
         if (text == 0) {
            alert('Ganti Password Gagal');
            $('#spinners_data').fadeOut('slow');
          }else if(text == 1){
            alert('Ganti Password Berhasil');
            $('#spinners_data').fadeOut('slow');
            $("#password_baru").val('');
            $("#password_lama").val('');
          } else {
            alert('Ganti Password Gagal');
            $('#spinners_data').fadeOut('slow');
          }
        }
      });
    });
  });
</script>

