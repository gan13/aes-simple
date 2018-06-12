
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
    $('#spinners_data').show();
    $.ajax({
      type: 'POST',
      async: true,
      data: {
        id_users:<?php echo $this->session->userdata('id_users'); ?>
      },
      dataType: 'json',
      url: '<?php echo base_url(); ?>profil/json_all_profil/',
      success: function(json) {
        if (json.length == 0) {
          alert ('Data Tidak Ada');
          $('#spinners_data').fadeOut('slow');
        } else {
          for (var i = 0; i < json.length; i++) {
          $('#users_name').html(json[i].users_name );
          $('#nama_users').html(json[i].nama_users );
          $('#prodi').html(json[i].prodi );
          $('#angkatan').html(json[i].angkatan );
          }
          $('#spinners_data').fadeOut('slow');
        }
      }
    });
});
</script>

