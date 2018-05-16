<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
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
    <title>Sistem Informasi Dokumentasi Data Desa - Si-DESA ID</title>
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
                      <a href="#" class="nav-link active">Home</a>
                    </li>
                    
                     
                    <li class="nav-item has-sub-menu has-mega-menu">
                      <a href="#" class="nav-link ">Kependudukan</a>
                      <div class="sub-menu mega-menu">
                        <ul>
                          <li>
                            <strong>Kelompok Umur</strong>
                          </li>
                          <li><a href="#">Balita /Bawah 5 (lima) Tahun)</a></li>
                          <li><a href="#">Remaja</a></li>
                          <li><a href="#">Dewasa</a></li>
                          <li><a href="#">Lansia ( >60 Tahun )</a></li>
                        </ul>
                        <ul>
                          <li>
                            <strong>Kelompok Pekerjaan</strong>
                          </li>
                          <li><a href="#">Pertanian &amp; Perkebunan</a></li>
                          <li><a href="#">Pertambangan</a></li>
                          <li><a href="#">Pegawai Pemerintah/Honorer</a></li>
                          <li><a href="#">Pengusaha / Swasta</a></li>
                          <li><a href="#">Belum Bekerja/ Pengangguran</a></li>
                        </ul>
                        <ul>
                          <li>
                            <strong>Kelompok Pendidikan</strong>
                          </li>
                          <li><a href="#">Belum/ Tidak Tamat SD</a></li>
                          <li><a href="#">Tamat SD/Sederajat</a></li>
                          <li><a href="#">Tamat SMP/Sederajat</a></li>
                          <li><a href="#">Tamat SMA/Sederajat</a></li>
                          <li><a href="#">Tamat Perguruan Tinggi/Sederajat</a></li>
                        </ul>
                        <ul>
                          <li>
                            <strong>Kelompok Penerima Bantuan</strong>
                          </li>
                          <li><a href="#">Bantuan Raskin/ Ranstra</a></li>
                          <li><a href="#">Bantuan PKP/PKH</a></li>
                          <li><a href="#">Bantuan KIS/KIP</a></li>
                          <li><a href="#">Bantuan Jamkesda/Setara</a></li>
                          <li><a href="#">Bantuan RTRH/ Perumahan</a></li>
                          <li><a href="#">Bantuan CSR</a></li>
                          <li><a href="#">Lain - Lain</a></li>
                        </ul>
                      </div>
                      <!-- /.mega-menu -->
                    </li>

                    <li class="nav-item has-sub-menu">
                      <a href="#" class="nav-link ">Pertanahan &amp; Aset Desa</a>
                      <ul class="sub-menu">
                        <li><a href="#">Fasilitas Umum</a></li>
                        <li><a href="#">Pertanian &amp; Perkebunan</a></li>
                        <li><a href="#">Kelompok Usaha</a></li>
                        <li><a href="#">Pertanahan Masyarakat</a></li>
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
    <script type="text/javascript" src="<?php echo base_url().V2;?>js/jquery.js"></script>
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
<script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url().THEME; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!--      -->


    <script type="text/javascript" >/*/ Base Setting /*/ var baseUrl = '<?php echo base_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url().APPS.'auth.js';?>"></script>
  </body>
</html>