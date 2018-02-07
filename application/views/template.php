<?php 
// Controller Level Navigasi
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>Font_Awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url().THEME;?>plugins/datatables-plugins/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url().THEME;?>plugins/datatables-responsive/dataTables.responsive.css">
<!-- iCheck -->
<!-- <link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/iCheck/flat/blue.css"> -->
<!-- Morris chart -->
<!-- <link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/morris/morris.css"> -->
<!-- jvectormap -->
<!-- <link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/datepicker/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/daterangepicker/daterangepicker-bs3.css">
<!--  -->
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/select2/select2.min.css">
<!-- bootstrap wysihtml5 - text editor --
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!--  -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url().THEME; ?>sweetalert.css">
<script src="<?php echo base_url().THEME; ?>sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/fancybox/jquery.fancybox.css">

<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/fancybox/helpers/jquery.fancybox-buttons.css">
<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/fancybox/helpers/jquery.fancybox-thumbs.css">

<link rel="stylesheet" href="<?php echo base_url().THEME;?>sidesa.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo base_url().'assets/';?>new-logo.png" type="image/x-icon">
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<script type="text/javascript" >/*/ Base Setting /*/ var baseUrl = '<?php echo base_url();?>';</script>
<div class="wrapper">
<?php $this->load->view('top-navbar'); ?>
<?php $this->load->view('side-navbar'); ?>
<div class="content-wrapper">
<?php $this->load->view($main_content); ?>
</div>
<footer class="main-footer">
<div class="pull-right hidden-xs">
<b>Version</b> 1.0.0
</div>
<strong>Copyright &copy; 2017 <a href="#">Pemerintah Desa Gantung</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url().THEME; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url().THEME; ?>plugins/jQueryUI/jquery-ui2.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url().THEME; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url().THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/datatables-plugins/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/datatables-responsive/dataTables.responsive.js"></script>
<!-- Input Mask -->
<script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- JQUERY upload -->
<script src="<?php echo base_url().THEME; ?>plugins/jquery.ajaxfileupload.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url().THEME; ?>raphael-min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url().THEME; ?>jquery.form.min.js"></script>
<!-- <script src="<?php echo base_url().THEME; ?>plugins/morris/morris.js"></script> -->
<!-- Sparkline -->
<script src="<?php echo base_url().THEME; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="<?php echo base_url().THEME; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="<?php echo base_url().THEME; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url().THEME; ?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url().THEME; ?>moment.min.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url().THEME; ?>plugins/datepicker/bootstrap-datepicker.js"></script>

<!--  -->
<script src="<?php echo base_url().THEME; ?>plugins/select2/select2.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url().THEME; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url().THEME; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url().THEME; ?>plugins/fastclick/fastclick.min.js"></script>
<!-- Download JS -->
<!-- AdminLTE App -->
<script src="<?php echo base_url().THEME; ?>dist/js/app.min.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<!-- <script src="<?php echo base_url().THEME; ?>plugins/fancybox/jquery.mousewheel.pack.js"></script> -->
<script src="<?php echo base_url().THEME; ?>plugins/fancybox/jquery.fancybox.pack.js"></script>
<!--  -->
<script src="<?php echo base_url().THEME; ?>plugins/fancybox/helpers/jquery.fancybox-media.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/fancybox/helpers/jquery.fancybox-buttons.js" ></script>
<script src="<?php echo base_url().THEME; ?>plugins/fancybox/helpers/jquery.fancybox-thumbs.js" ></script>
<!-- <script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/webcamReader/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/webcamReader/js/webcodecamjquery.js"></script>

<script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/webcamReader/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/webcamReader/js/mainjquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(). THEME; ?>plugins/webcamReader/js/decoderworker.js"></script>
<script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/webcamReader/js/main.js"></script> -->
<!--  -->
<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCv9ymzLZLuz9x8AexGZiwd38TpN4VgNzw"></scsript> -->
<script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url().APPS.'config.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().APPS.'apps.js';?>"></script>
<script>
    // $(function(){
    //     $('img').imgPreload()
    // })
</script>
</body>
</html> 