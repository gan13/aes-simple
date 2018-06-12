
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SOFAST | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url(); ?>boots/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
     Theme style -->
    <link href="<?php echo base_url(); ?>boots/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>boots/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  </head>
  <body class="login-page">
    <div class="login-box" id="form_login">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b>Selamat</b> Datang</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login</p>
        <form action="<?php echo base_url(); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="users_name_login" placeholder="NIM"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password_login" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <button type="submit" id="login_submit" class="btn btn-warning btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <button type="button" id="halaman_register" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <div class="login-box" id="form_register" style="display:none;">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b>Register</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Isikan Data Pribadi Anda</p>
            <div class="alert alert-warning alert-dismissable" id="loading_login" style="display:none;">
              <h4><i class="fa fa-refresh fa-spin"></i> Mohon tunggu....</h4>
            </div>
          <div class="form-group has-feedback">
            <label class="control-label">NIM</label>
            <input type="text" class="form-control" id='users_name' placeholder="NIM Minimal 8 Karakter"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label">Password</label>
            <input type="password" class="form-control" id='password' placeholder="Password Minimal 8 Karakter"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <!-- <div class="form-group has-feedback">
            <label class="control-label">Ulangi Password</label>
            <input type="password" class="form-control" id='password2' placeholder="Password Minimal 8 Karakter"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div> -->
          <div class="form-group has-feedback">
            <label class="control-label">Nama Lengkap</label>
            <input type="text" class="form-control" id='nama_users' placeholder="Nama Lengkap"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label">Program Studi</label>
            <select type="text" class="form-control" id='prodi'>
              <option value="">Program Studi</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
              <option value="Manajenem Informatika">Manajenem Informatika</option>
              <option value="Teknik Arsitektur">Teknik Arsitektur</option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label">Tahun Angkatan</label>
            <select type="text" class="form-control" id='angkatan'>
              <option value="">Tahun Angkatan</option>
              <?php 							
                for ($x = 2008; $x <= 2018; $x++) {
                    echo '<option value="'.$x.'">'.$x.'</option>';
                } 
              ?>
            </select>
          </div>
          <div class="row">
            <div class="col-xs-6">    
              <button type="button" id='register_submit' class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
            <div class="col-xs-6">    
              <button type="button" id='kembali_login' class="btn btn-warning btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script type = "text/javascript" >
      $(document).ready(function () {
        $("#login_submit").on("click", function (e) {
          e.preventDefault();
          // $('#login_error').hide();
          $('#loading_login').show();
          var users_name = $("#users_name_login").val();
          var password = $("#password_login").val();
          if (users_name == '') {
            $('#users_name_login').css('background-color', '#DFB5B4');
          } else {
            $('#users_name_login').removeAttr('style');
          }
          if (password == '') {
            $('#password_login').css('background-color', '#DFB5B4');
          } else {
            $('#password_login').removeAttr('style');
          }
          $.ajax({
            type: "POST",
            async: true,
            data: {
              users_name: users_name,
              password: password,
            },
            dataType: "text",
            url: '<?php echo base_url(); ?>login/login_users',
            success: function (text) {
             if (text == 0) {
                alert('Login Gagal ');
                $('#loading_login').fadeOut('slow');
              } else if(text=='berhasil'){
                $('#loading_login').fadeOut('slow');
                $('#form_login').show();
                $('#form_register').hide();
                $("#users_name_login").val('');
                $("#password_login").val('');
                window.location = "<?php echo base_url(); ?>welcome";
              }else{
                alert('Login Gagal ');
                $('#loading_login').fadeOut('slow');
              }
            }
          });
        });
        $("#register_submit").on("click", function (e) {
          e.preventDefault();
          // $('#login_error').hide();
          $('#loading_login').show();
          var users_name = $("#users_name").val();
          var password = $("#password").val();
          var nama_users = $("#nama_users").val();
          var prodi = $("#prodi").val();
          var angkatan = $("#angkatan").val();
          if (users_name == '') {
            $('#users_name').css('background-color', '#DFB5B4');
          } else {
            $('#users_name').removeAttr('style');
          }
          if (password == '') {
            $('#password').css('background-color', '#DFB5B4');
          } else {
            $('#password').removeAttr('style');
          }
          if (nama_users == '') {
            $('#nama_users').css('background-color', '#DFB5B4');
          } else {
            $('#nama_users').removeAttr('style');
          }
          if (prodi == '') {
            $('#prodi').css('background-color', '#DFB5B4');
          } else {
            $('#prodi').removeAttr('style');
          }
          if (angkatan == '') {
            $('#angkatan').css('background-color', '#DFB5B4');
          } else {
            $('#angkatan').removeAttr('style');
          }
          $.ajax({
            type: "POST",
            async: true,
            data: {
              users_name: users_name,
              password: password,
              nama_users: nama_users,
              prodi: prodi,
              angkatan: angkatan,
            },
            dataType: "text",
            url: '<?php echo base_url(); ?>login/register',
            success: function (text) {
             if (text == 0) {
                alert('Register Gagal');
                $('#loading_login').fadeOut('slow');
              }else if(text == 99){
                alert('Nim Anda sudah Terdaftar');
                $('#loading_login').fadeOut('slow');
                $('#users_name').css('background-color', '#DFB5B4');
              } else {
                alert('Register Berhasil');
                $('#loading_login').fadeOut('slow');
                $('#form_login').show();
                $('#form_register').hide();
                $("#users_name").val('');
                $("#password").val('');
                $("#nama_users").val('');
                $("#prodi").val('');
                $("#angkatan").val('');
              }
            }
          });
        });
        $("#kembali_login").on("click", function (e) {
          e.preventDefault();
            $('#form_login').show();
            $('#form_register').hide();
        });
        $("#halaman_register").on("click", function (e) {
          e.preventDefault();
            $('#form_register').show();
            $('#form_login').hide();
        });
      });
    </script>
    <!-- jQuery 2.1.3 -->
		<script src="<?php echo base_url(); ?>js/uutv1.js"></script>
    <script src="<?php echo base_url(); ?>boots/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>boots/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>boots/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>