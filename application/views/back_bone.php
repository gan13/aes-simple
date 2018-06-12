<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$ses=$this->session->userdata('id_users');
if(!$ses) { return redirect(''.base_url().'login');  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sosial Media Fastikom</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url(); ?>boots/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url(); ?>boots/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url(); ?>boots/font-awesome/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris charts -->
    <link href="<?php echo base_url(); ?>css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>boots/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>boots/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/alertify/alertify.core.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/alertify/alertify.default.css" id="toggleCSS" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/Typeahead-BS3-css.css" id="toggleCSS" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>boots/dist/css/bootstrap-timepicker.min.css" />
		<!-- Progress bar -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-combined.min.css" id="toggleCSS" />
		
		<style>
		tr:hover {
				background-color: #337ab7;
				color:red;
		}

		tr:hover td {
				background-color: transparent; /* or #000 */
		}
		</style>
    
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="skin-blue layout-top-nav">
	<div class="overlay" id="overlay_loading" style="display:none;" >
		<i class="fa fa-refresh fa-spin"></i>
	</div>
    <div class="wrapper">
      <header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="<?php echo base_url(); ?>" class="navbar-brand"><b>SOSMED</b>Fastikom</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url(); ?>profil">Profil</a></li>
              <li><a href="<?php echo base_url(); ?>ganti_password">Ganti Password</a></li>
            </ul>
						<ul class="nav navbar-nav navbar-right">
             <!--  <li class="nav-item dropdown-itempdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">!</span>
                </a>
                
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <div class="dropdown-divider"></div>
                  <a href="<?php echo base_url(); ?>login/logout"  class="dropdown-item"> <i class="fa fa-envelope mr-2"></i> Keluar</a>
                </div>

                
              </li> -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo( $this->session->userdata ('nama_users'))?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="">
                    <p>
                      <strong><?php echo( $this->session->userdata ('nama_users'))?></strong>
                      <small>Web Developer</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>profil" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>

            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid">
          <?php if(!empty($header)){ echo $header; } ?>
          <section class="content"> 
            <div class="row">          
              <?php $this -> load -> view($main_view);  ?>
            </div>
          </section><!-- /.content -->
        </div><!-- /.container -->
				<div style="display:none;">

				</div>	
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container-fluid">
        <?php $this->load->view('footer') ?>
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->
		
    <script type="text/javascript">
      //----------------------------------------------------------------------------------------------
      function reset() {
        $('#toggleCSS').attr('href', '<?php echo base_url(); ?>css/alertify/alertify.default.css');
        alertify.set({
          labels: {
            ok: 'OK',
            cancel: 'Cancel'
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: 'ok'
        });
      }
      //----------------------------------------------------------------------------------------------
    </script>
            
		<!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url(); ?>boots/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>boots/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>boots/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url(); ?>boots/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>boots/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    
		<!-- alertify -->
		<script src="<?php echo base_url(); ?>js/alertify.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url(); ?>js/plugins/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js" type="text/javascript"></script>
		<!--- -->
		<script src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url(); ?>js/hogan-2.0.0.js"></script>
		<!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>boots/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/jquery.form.js"></script>
		<script src="<?php echo base_url(); ?>boots/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
		
    <script type="text/javascript" src="<?php echo base_url(); ?>boots/dist/js/moment-with-locales.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>boots/dist/js/bootstrap-datetimepicker.js"></script>
    
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
      $(function () {
        $("[data-mask]").inputmask();
      });
    </script>

  </body>
</html>
