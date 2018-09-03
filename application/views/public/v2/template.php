<?php $active_link = $this->uri->segment(3);?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Aplikasi Manajemen Data Masyarakat Tingkat Desa yang di kembangkan oleh BUMDES Gantung Makmur Sejahtera dalam Naungan UNIT Usaha Bidang Pengembangan Teknologi Informasi, diharapkan aplikasi ini dapat membantu pemerintah tingkat desa untuk memanajemen data pertanahan masyarakat dan surat menyurat terkait untuk data desa dan pertanahan masyarakat yang lebih baik.">
    <meta name="keywords" content="Desa, Gantung, Desa Gantung, Kecamatan Gantung, Laskar Pelangi, Sistem Informasi, Pertanahan, Data Masyarakat, tanah, BPN, INdonesia, Belitung Timur, Desa terbaik, informasi desa, PPID, si-desa.id, sidesa.id, sidesa, masyarakat, kepala desa, informasi desa, bangka belitung, pantai, danau nujau, nujau, persawahan, teknologi, mudong, perkantoran, pemerintahan desa, pejabat desa, BUMDES, badan usaha, badan usaha milik desa, BUMDES GMS, gantung makmur sejahtera, bumdes gantung, rasau, baru, ganse, timah, pertambangan, pertanian, persawahan, kelompok tani, kelompok petani, petani, padi, beras, beras danau nujau, berenas wangi, beras berenas wangi, jalan sudirman, pasar gantong, desa gantong, gantong, andrea hirata, kata, museum kata, sma negeri 1 gantong, juara, desa broadband, desa mandiri, desa sejahtera">
    <meta name="author" content="Unit Pengembangan Teknologi BUMDesa Gantung Makmur Sejahtera">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="<?php echo base_url().V2;?>libraries/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().V2;?>libraries/slick/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().V2;?>css/trackpad-scroll-emulator.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().V2;?>css/chartist.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().V2;?>css/jquery.raty.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().V2;?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().V2;?>css/nouislider.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().V2;?>css/explorer.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().V2;?>img/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().THEME; ?>sweetalert.css">
    <script src="<?php echo base_url().THEME; ?>sweetalert.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>


    <title><?php echo $title; ?></title>
  </head>
  <body class="">
    <div class="page-wrapper">
      <div class="header-wrapper">
        <div class="header">
          <div class="container">
            <div class="header-inner">
              <div class="navigation-toggle toggle">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <!-- /.header-toggle -->
              <div class="header-logo">
                <a href="<?php echo base_url();?>">
                  <img src="<?php echo base_url().'assets/new-logo.png'; ?>" class="svg" alt="Home">
                </a>
                <a href="<?php echo base_url();?>" class="header-title">Si-DESA ID</a>
              </div>
              <!-- /.header-logo -->
              <div class="header-nav">
                <div class="primary-nav-wrapper">
                  <ul class="nav">
                    <li class="nav-item">
                      <a href="<?php echo base_url();?>" class="nav-link <?php  echo ($active_link == '' ? 'active' : ''); ?>">Home</a>
                    </li>

                    <li class="nav-item">
                      <a href="<?php echo base_url().'public/grafik'; ?>" class="nav-link <?php echo ($active_link == 'grafik' ? 'active' : ''); ?>">Grafik Data Penduduk</a>
                    </li>                    
                    <li class="nav-item has-sub-menu">
                      <a href="#" class="nav-link <?php echo ($active_link == 'data' ? 'active' : ''); ?>">Pertanahan &amp; Aset Desa</a>
                      <ul class="sub-menu">
                        <li><a href="<?php echo base_url('public/data/fasilitas_umum');?>">Fasilitas Umum</a></li>
                        <li><a href="<?php echo base_url('public/data/pertanian');?>">Pertanian &amp; Perkebunan</a></li>
                        <li><a href="<?php echo base_url('public/data/kelompok_usaha');?>">Kelompok Usaha</a></li>
                        <li><a href="<?php echo base_url('public/data/grafik_pertanahan');?>">Pertanahan Masyarakat</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <!-- /.primary-nav-wrapper -->
              </div>
              <div class="header-toggle toggle">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
            <!-- /.header-inner -->
          </div>
          <!-- /.container -->
        </div>
        <!-- /.header -->
      </div>
      <!-- /.header-wrapper -->


      <div class="map-wrapper">
      <?php $this->load->view($main_content); ?>
      </div>
      <!-- /.map-wrapper -->

      
    </div>
    <div class="side-wrapper">
      <div class="side">
        <div class="side-inner">         
          <h3>Welcome To Our System</h3>
          <?php echo form_open('',array('id'=>'auth','class'=>'form-dark')); ?>
            <div class="form-group">
            <!-- <input type="text" class="form-control" id="kode_desa" name="kode_desa"  data-inputmask="'mask': ['999.99-99.999', '999.99-99.999']" data-mask> -->
            <input type="text" class="form-control" id="kode_desa" name="kode_desa"  >
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="uid" placeholder="Username">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <!-- /.form-group -->
            <a onclick="validate()" name="login"  class="btn btn-primary pull-right" >Login</a>
          </form>
        </div>
        <!-- /.side-inner -->
      </div>
      <!-- /.side -->
    </div>
    <!-- /.side-wrapper -->
    <div class="side-overlay"></div>
    <!-- /.side-overlay -->
	<script>
	//	var base_url = '<?php //echo base_url().V2; ?>'; 
  </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/chartist.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/google-map-richmarker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/google-map-infobox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/google-map-markerclusterer.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/google-map.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.trackpad-scroll-emulator.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.inlinesvg.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.affix.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>libraries/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/nouislider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.raty.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/wNumb.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/particles.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/explorer.js"></script>
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/explorer-map-search.js"></script>

<!--      -->

    <!--  -->

    <script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!--      -->


    <script type="text/javascript" >/*/ Base Setting /*/ var baseUrl = '<?php echo base_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url().APPS.'auth.js';?>"></script>
    <script type="text/javascript" src="<?php //echo base_url().APPS.'chart_data.js';?>"></script>


  </body>
</html>