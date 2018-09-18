<section class="content-header">
<h1>
  Master Data Koordinat Tanah
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Koordinat Tanah</li>
</ol>
</section>
<section class="content">

<div class="box box-warning">
    <div class="box-header">
        <h3 class="box-title">
            Titik Peta Terekam Sistem
        </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8">
                <div style="height: 580px;" id="map-canvas"></div>
            </div>
            <div class="col-md-4">

            <div class="box box-success" id="data_details" hidden>
                <div class="box-header">
                    <h3 class="box-title">
                        Details <b id="data_view"></b>
                    </h3>
                </div>
                <div class="box-body">
                <div id="data_loading" hidden>
                    <img src="<?php echo base_url('assets/hamtaro-new.gif');?>" alt="detaiils" class="img img-rounded img-responsive img-details" />
                </div>
                <div id="data_details_view">
                    <img src="#" alt="detaiils" class="img img-rounded img-responsive img-details" />
                </div>
                <hr/>                
                </div>
                <div class="box-footer">
                    <button onclick="close_details()" type="button" class="btn btn-flat btn-lg btn-block btn-warning" > Close </button>
                </div>
            </div>

            
                <!-- <div class="small-box bg-purple">
                    <div class="inner">
                    <h3><?php //echo //count($total_koordinat->result_array());?></h3>
                    <p>Total Titik</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div> -->
            <div id="data_count">
                <div class="small-box bg-maroon">
                    <div class="inner">
                    <h3><?php echo count($dataAll->result_array());?></h3>
                    <p>Total Titik Koordinat</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
                <!-- <div class="small-box bg-yellow">
                    <div class="inner">
                    <h3><?php //echo count($patok_all->result_array());?></h3>
                    <p>Total Titik</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div> -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3><?php echo count($data->result_array());?></h3>
                    <p>Total Titik Sesuai DDK</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>

                 <div class="small-box bg-green">
                    <div class="inner">
                    <h3><?php echo count($dataV->result_array());?></h3>
                    <p>Total Titik Verified</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
<?php 
$akses = $this->session->userdata('jabatan');
 if($akses=='ROOT' || $akses == 'PERTANAHAN'){ ?>        
                <div class="box box-warning">

                <div class="box-header">
                    <h2 class="box-title">
                        Details Visuals
                    </h2>
                </div>

                <div class="box-body">
                    <p class="well">
                        Untuk Melihat Detail Data Pertanahan dan Melakukan Input serta Perubahan anda harus memiliki akses Admin Pertanahan Atau Otentifikasi Login (OTP) terdaftar disistem.
                    </p>
                </div>

                <div class="box-footer">
                    <button class="btn btn-lg btn-flat btn-success btn-block" onclick="<?php echo ($this->session->userdata('jabatan')=='MASTER' ? 'verifikasi_tengah_one()' : 'aktifkan_otp('.$this->session->userdata('id').')'); ?>" >Verifikasi Titik<i class="fa fa-plus"></i></button>
                </div>
                </div>
<?php } ?>
                <!--  -->
                </div>
                <!--  -->
            </div>
        </div>
        
    </div>
</div>


<!-- -->
<div class="box box-info">
    <?php 
        switch ($this->session->userdata('jabatan')) {
        case 'ROOT':
        echo form_open_multipart('', array('id'=>'import'));
    ?>
    <div class="box-footer">
        <div class="form-group">
           <div class="btn btn-default btn-file">
            <i class="fa fa-paperclip"></i> Attachment .xls|.xlsx 
            <input id="import_xls" type="file" name="import_xls">
           </div>
        </div>
        <center id="loader-icon" style="display:none;">
            <img width="50%" class="img img-responsive" src="<?php echo base_url('assets/nyapu.gif');?>" />
        </center>
        <button type="submit" name="upload" class="btn btn-sm btn-flat btn-warning">Import Excel <i class="fa fa-excel-o"></i> </button>
    </div>
    <?php 
    echo form_close();
        break;
    default:
        break;        
    }
    ?>    
</div>
</section>



<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script>

<script>
var imgUrl = '<?php echo base_url('assets/uploader/patok/'); ?>';
var map;
var color;
var opacity;
var url = '<?php echo base_url(); ?>semua/koordinat/valid';
var idx;
var id_batas;
function initialize() {

map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 10,
    center: new google.maps.LatLng(-2.858830, 107.906900),
    mapTypeId: 'terrain',
    // mapTypeControl: false,
    // disableDefaultUI: true
});

$.ajax({
    'url': '<?php echo base_url('api/tanah_all/polygon/json');?>',
    'success' : function(data){
        var groupedByData = {};
        var dest = {};
        for (var key in data) {
            var id = data[key].id_data_link;  
            // var latlng = new google.maps.LatLng(data[key].lat, data[key].lng);
            if (!groupedByData[id]) {
                groupedByData[id] = [];
            }            
            groupedByData[id].push(data[key]);
        }        
       var path = [];
       $.each(groupedByData, function(i, items){
        var poly = [];
        $.each(items, function(x, dataeach){
            var latlng = new google.maps.LatLng(parseFloat(dataeach['lat']), parseFloat(dataeach['lng']));
            poly.push(latlng);
        });
        // console.log(poly);
        path.push(poly);
       });
    //    color = '#'+Math.random().toString(16).substr(-6);
    //    opacity = 0.5;
       add_poly(path);
    }
});




//   Array Marker
    var title ;
    var contentString;
    $.ajax({
        'url': url,
        'success': function (data) {
            var markers = [];
            // console.log(data);
            for (let i = 0; i < data.length; i++) {
                var latLng = new google.maps.LatLng(
                    data[i]['lat'],
                    data[i]['lng']
                );
                // title = data[i]['nik'];
                
                var contentString = '<div id="content">'+
                '<p>KLIK</p>'+
                // '<div id="siteNotice">'+
                // 'No NIK. <b>'+ data[i]['nik'] +'</b>' +
                // '</div>'+
                // '<h5 id="firstHeading" class="firstHeading">'+ data[i]['status']+'</h5>'+
                // '<div id="bodyContent">'+
                // '<img class="img img-thumbnail" width="90" src="'+imgUrl+data[i]['dokumentasi']+ '" />'+
                
                // '<p> lat : '+ data[i]['lat'] +' lng: '+ data[i]['lng'] +' <br> Area : &plusmn; '+ data[i]['area'] +' m<sup>2</sup><br> Status Data : '+ data[i]['verified'] +'</p>'+           
                // '</div>'+
                '</div>';
                // var infowindow = new google.maps.InfoWindow({
                //     content: contentString
                // });
                var mapIcon;
                var string = data[i]['tanah_id'];
                var tipe = string.split('-');
                if(tipe[1]=='ASET'){
                    var mapIcon = 'https://si-desa.id/assets/administration.png';
                }else{
                    var mapIcon = 'https://si-desa.id/assets/house-icon.png';
                }
                var marker = new google.maps.Marker({
                        position: latLng,
                        icon: mapIcon
                });
                marker.addListener('click', function() {
                    // alert(data[i]['id']);
                    show_details(data[i]['lat'], data[i]['lng']);
                    
                        // infowindow.open(map, marker);
                        // // console.log(contentString);
                        // // alert('Marker Klik' + data[i]['keterangan']);
                });
                
                markers.push(marker);                
            }       
            var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
            );
            // var markerCluster = new MarkerClusterer(map, markers);
    
        }
    });
            // LOAD DATA BATAS ADMINISTRASI DESA
    $.ajax({
        'url' : '<?php echo base_url('api/adm_all/polygon/json');?>',
        'success': function (data){
            $.each(data, function (i, x) {
                var id_batas = x.id;
                // console.log(x.color);
                var color_adm = x.color;
                $.ajax({
                    'url' : p<?php echo base_url("i/polygon/one");?>''+id_batas,
                    'success' : function (adm){
                        var path_adm = [];
                        $.each(adm, function(i, p){
                            var latlong = new google.maps.LatLng(parseFloat(p.lat),parseFloat(p.lng));
                            path_adm.push(latlong);
                        });
                        add_poly_adm(path_adm, color_adm);
                    }
                });
            });
        }
    });
}

function add_poly_adm(path_adm, color_adm){
    var polygonAdm = new google.maps.Polygon({
          paths: path_adm,
          strokeColor: color_adm,
          strokeOpacity: 0.9,
          strokeWeight: 2,
          fillColor: color_adm,
          fillOpacity: 0.1
        });
       polygonAdm.setMap(map);
}

function add_poly(path){
    var polygon = new google.maps.Polygon({
          paths: path,
          strokeColor: '#000',
          strokeOpacity: 0.9,
          strokeWeight: 2,
          fillColor: '#fff',
          fillOpacity: 0.0
        });
       polygon.setMap(map);
}


function show_details(lt,lg) {
    event.preventDefault();
    $('#data_view').text(lt +','+lg);
    var imgDetails = 'no-img.jpg';
    $('.img-details').attr('src', s<?php echo base_url("sets/'+imgDet");?>'ils); 
    $("#data_count").hide();
    $("#data_details").show();
    $("#data_loading").show();
    $("#data_details_view").hide();
    
    $.ajax({
        url: '<?php echo base_url('api/get_details/pemilik/'); ?>'+lt+'/'+lg,
        success: function( data){
            console.log(data);
            $('.img-details').attr('src', s<?php echo base_url("sets/uploader");?>'patok/'+data.foto_tanah); 
            $("#data_loading").hide();
            $("#data_details_view").show();
        }
    });
   
}

function close_details(){
    $("#data_count").show();
    $("#data_details").hide();
}

function aktifkan_otp(id){
    event.preventDefault();
    var otpUrl = '<?php echo base_url("user/get/otp/");?>' + id;
    $.ajax({
        url : otpUrl,
        success : function (otp){
            console.log(otp);
            verifikasi_tengah_one();
        }
    });
        
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

