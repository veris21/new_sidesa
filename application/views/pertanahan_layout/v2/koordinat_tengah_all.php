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
            <div id="data_count">
                <div class="small-box bg-maroon">
                    <div class="inner">
                    <h3><?php echo count($dataAll->result_array());?></h3>
                    <p>Total Titik Koordinat</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                </div>

                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3><?php echo count($data->result_array());?></h3>
                    <p>Total Titik Sesuai DDK</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                </div>

                 <div class="small-box bg-green">
                    <div class="inner">
                    <h3><?php echo count($dataV->result_array());?></h3>
                    <p>Total Titik Verified</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                </div>
<?php 
    $akses = $this->session->userdata('jabatan');
    if($akses=='ROOT' || $akses == 'PERTANAHAN' || $akses=='MASTER'){ ?>        
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



<div class="modal fade" id="modal_otp">
    <div class="modal-dialog">
        <?php echo form_open('', array('id'=>'verifikasi_otp')); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verifikasi Data </h4>
            </div>
            <div class="modal-body">
                <p class="well">Untuk Dapat Membuka Data Total Verifikasi Pertanahan  anda harus memiliki akun dan mendapatkan Kode <b><i>One Time Password ( OTP ) </i></b> yang dikirimkan langsung ke Nomor <i>Handphone</i> anda yang terdaftar </p>
                <hr>
                <div class="box box-warning">
                    <div class="box-body">
                    <div class="form-group">
                            <label for="">Nama Pemilik Akun</label>
                            <input type="text" name="fullname" class="form-control"  disabled>
                            </div>
                            <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" name="keterangan_jabatan" class="form-control "  disabled>
                            </div>
                            <input type="hidden" name="id" class="form-control">
                            <hr>
                            <div class="well form-group">
                            <label for="">KODE OTP <i>(One Time Password)</i></label>
                            <input type="text" class="form-control  input-lg" name="otp_code">
                            </div>
                            <hr>
                            <span id="interval_otp"></span>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="push_to_verif()">Verifikasi Data <i class="fa fa-check"></i> </button>
            </div>
        </div>
        </form>
    </div>
</div>



<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script>

<script>
var now = new Date().getTime();
var countDown;
var imgUrl = '<?php echo base_url('assets/uploader/patok/'); ?>';
var map;
var color;
var opacity;
var url = '<?php echo base_url(); ?>semua/koordinat/valid';
var idx;
var id_batas;
var infoWindow;

function initialize() {
map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 10,
    center: new google.maps.LatLng(-2.858830, 107.906900),
    mapTypeId: 'terrain',
});

$.ajax({
    'url': '<?php echo base_url('api/tanah_all/polygon/json');?>',
    'success' : function(data){
        var groupedByData = {};
        var dest = {};
        for (var key in data) {
            var id = data[key].id_data_link;  
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
        path.push(poly);
       });
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
                    show_details(data[i]['lat'], data[i]['lng']);
                });
                
                markers.push(marker);                
            }       
            var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
            );    
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
                    'url' : baseUrl+'api/polygon/one/'+id_batas,
                    'success' : function (adm){
                        var path_adm = [];
                        $.each(adm, function(i, p){
                            var latlong = new google.maps.LatLng(parseFloat(p.lat),parseFloat(p.lng));
                            path_adm.push(latlong);
                        });
                        add_poly_adm(path_adm, color_adm, id_batas);
                    }
                });
            });
        }
    });

}

function add_poly_adm(path_adm, color_adm, id_batas){
    var polygonAdm = new google.maps.Polygon({
          paths: path_adm,
          strokeColor: color_adm,
          strokeOpacity: 0.9,
          strokeWeight: 2,
          fillColor: color_adm,
          fillOpacity: 0.1,
          indexID : id_batas
        });
       polygonAdm.setMap(map);   

       polygonAdm.addListener('click', showArrays);
       infoWindow = new google.maps.InfoWindow;
      
}

// Read Get MAP PRopertirs
function showArrays(event) {
        var contentString = '<b>Geometry Data Properties</b><br>' +
            'Clicked location: <br> Lat :  <b>' + event.latLng.lat() + '</b><br>Lng : <b>' + event.latLng.lng()+'</b>';
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);
        infoWindow.open(map);
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
    $('.img-details').attr('src', baseUrl+'assets/'+imgDetails); 
    $("#data_count").hide();
    $("#data_details").show();
    $("#data_loading").show();
    $("#data_details_view").hide();
    
    $.ajax({
        url: '<?php echo base_url('api/get_details/pemilik/'); ?>'+lt+'/'+lg,
        success: function( data){
            // console.log(data);
            $('.img-details').attr('src', baseUrl+'assets/uploader/patok/'+data.foto_tanah); 
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
    $('[name="user_id"]').val('');
    var otpUrl = '<?php echo base_url(); ?>'+ 'user/get/otp/' + id;
    $.ajax({
        url : otpUrl,
        success : function (otp){
        //    console.log(otp);
           var obj = JSON.parse(otp);
           // Set the date we're counting down to
            var countDownDate = new Date();
            countDownDate.setMinutes(countDownDate.getMinutes() + 1);
            // Update the count down every 1 second
            var x = setInterval(function() {
            // Get todays date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Display the result in the element with id="demo"
            $("#interval_otp").html("<h5>Belum Mendapat Kan SMS Kode OTP ? ( Tunggu <b><i> " + seconds + " </i></b> detik lagi untuk kirim ulang Kode OTP )</h5>" );
            // If the count down is finished, write some text 
            if (distance < 0) {
                clearInterval(x);
                $("#interval_otp").html("<h5>Belum Mendapat Kan SMS Kode OTP ? <button type='button' class='btn btn-flat btn-sm btn-success' onclick='generater_otp("+id+")'> Kirim Ulang Kode OTP </button> </h5>");
            }
            }, 1000);
           $('#modal_otp').modal('show');
           $('[name="id"]').val(obj['id']);
           $('[name="fullname"]').val(obj['fullname']);
           $('[name="keterangan_jabatan"]').val(obj['keterangan_jabatan']);
        }
    });        
}

function generater_otp(id){
    event.preventDefault();
    var generateUrl = '<?php echo base_url(); ?>'+ 'otp/generate/' + id;
    $.ajax({
        url : generateUrl,
        success : function (data){
            swal('Selamat !', 'Berhasil Mengirim SMS OTP !', 'success');
        },
        error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
        }
    });
}

function push_to_verif(){
    event.preventDefault();
    console.log('Clicked');
    var otpCheck = '<?php echo base_url("otp/check"); ?>';
    $.ajax({
        url : otpCheck,
        type: "POST",
        dataType: "JSON",
        data: $('#verifikasi_otp').serialize(),
        success : function (params){
           console.log(params);
           verifikasi_tengah_one();
        },
        error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
        }
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

