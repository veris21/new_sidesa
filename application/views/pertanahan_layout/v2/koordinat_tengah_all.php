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
                    <img src="<?php echo base_url('assets/no-img.jpg');?>" alt="detaiils" class="img img-rounded img-responsive img-details" />
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
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3><?php echo count($data->result_array());?></h3>
                    <p>Total Titik Sesuai DDK</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-map"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
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
                <button class="btn btn-lg btn-flat btn-success btn-block" onclick="verifikasi_tengah_one()" >Verifikasi Titik<i class="fa fa-plus"></i></button>
                </div>
                </div>
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
<!--
<hr>
<?php 
    // switch ($this->session->userdata('jabatan')) {
    // case 'ROOT' || 'MASTER' || 'PERTANAHAN' :
?>
<div class="box box-success">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#list_koordinat_all" data-toggle="tab">Koordinat Terinput</a></li>
                <li ><a href="#list_koordinat_publik" data-toggle="tab">koordinat tampil publik</a></li> 
            </ul>

            <div class="tab-content">
                <!-- START TAB Pertama -->
                <!-- <div class="tab-pane active" id="list_koordinat_all"> -->
        <?php 
        // switch ($this->session->userdata('jabatan')) {
        //     case 'ROOT' :
        ?>
        <!-- <hr/> 
        <button class="btn btn-sm btn-flat btn-success" onclick="input_tengah_one()" >Input Titik <i class="fa fa-plus"></i></button>
        <?php 
        //  break;
        //  case 'MASTER' :
        ?> 
        <hr/>
        <button class="btn btn-sm btn-flat btn-success" onclick="input_tengah_one()" >Input Titik <i class="fa fa-plus"></i></button>
        <?php 
        //  break;
        //  case 'PERTANAHAN' :
        ?>
        <hr/>
        <button class="btn btn-sm btn-flat btn-success" onclick="input_tengah_one()" >Input Titik <i class="fa fa-plus"></i></button>
        <?php 
        //  break;
        //  default:
        //  break;
        // }
        ?>
        <hr/>
        <table width="100%" class="table table-striped table-bordered table-hover" id="master_koordinat_tengah_all">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>No. NIK</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Dokumentasi</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
            <?php             
            // if($dataAll!= '' || $dataAll !=null){
            // foreach ($dataAll->result() as $semua) {
            // echo "<tr>";
            // echo "<td>No NIK.".$semua->nik."</td>";
            // echo "<td>".$semua->latitude."</td>";
            // echo "<td>".$semua->longitude."</td>";
            // echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$semua->dokumentasi."' /></td>";
            // switch ($this->session->userdata('jabatan')) {
            //     case 'ROOT':            
            // echo "<td align='center'>";
            
            // echo "<a href='".base_url('koordinat')."' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>";
            
            ?>
            <button onclick="delete_tengah_one(<?php //echo $semua->id;?>)" class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button> 
            <?php 
            // break;
            // case 'MASTER':            
            // echo "<td align='center'>";
            
            // echo "<a href='".base_url('koordinat')."' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>";
            
            ?>
            <button onclick="delete_tengah_one(<?php //echo $semua->id;?>)" class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button> 
            <?php 
            // break;
            // case 'PERTANAHAN':            
            // echo "<td align='center'>";
            
            // echo "<a href='".base_url('koordinat')."' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>";
            
            ?>
            <button onclick="delete_tengah_one(<?php //echo $semua->id;?>)" class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button> 
            <?php 
            // break;
            //     default:
            //     echo "<td width='40' align='center'> <button class='btn btn-md btn-warning'>Access <i class='fa fa-ban'></i></button> </td>";
            //     break;
            // }
            // echo "</td>";
            // echo "</tr>";
            // } 
            // }else{
            //     echo "<tr>";
            //     echo "<td colspan='6' align='center'><h3>Data Yang Matching Kosong !!</h3></td>";
            //     echo "</tr>";
            // }
             ?>
        </tbody>
        </table>

        </div>
        <!-- END -->
        <!-- START TAB Kedua --
        <div class="tab-pane" id="list_koordinat_publik">
        <hr>
        <?php 
        // switch ($this->session->userdata('jabatan')) {
        // case 'ROOT': 
        ?>        
        <button class="btn btn-sm btn-flat btn-success" onclick="verifikasi_tengah_one()" >Verifikasi Titik<i class="fa fa-plus"></i></button>
        <hr>
        <?php 
        // break;
        // case 'MASTER': 
        ?>        
        <button class="btn btn-sm btn-flat btn-success" onclick="verifikasi_tengah_one()" >Verifikasi Titik<i class="fa fa-plus"></i></button>
        <hr>
        <?php 
        // break;
        // case 'PERTANAHAN': 
        ?>        
        <button class="btn btn-sm btn-flat btn-success" onclick="verifikasi_tengah_one()" >Verifikasi Titik<i class="fa fa-plus"></i></button>
        <hr>
        <?php 
        // break;
        // default:
        // break;
        // }
        ?>
        <table width="100%" class="table table-striped table-bordered table-hover" id="master_koordinat_tengah">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>Nama/ NIK</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Dokumentasi</td>

            <!-- <td>Action</td> --

        </tr>
        </thead>
        <tbody>
        <?php             
            // if($data!= '' || $data !=null){

            // foreach ($data->result() as $koor) {
            // echo "<tr>";
            // echo "<td>a/n. : ".$koor->nama." <br> No NIK.".$koor->nik."</td>";
            // echo "<td>".$koor->latitude."</td>";
            // echo "<td>".$koor->longitude."</td>";
            // echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$koor->dokumentasi."' /></td>";
            // // echo "<td align='center'> <button onclick='v2_edit_koordinat_tengah()' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button> <button onclick='v2_hapus_koordinat_tengah()' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button> </td>";
            // echo "</tr>";
            // } 


            // }else{
            //     echo "<tr>";
            //     echo "<td colspan='6' align='center'><h3>Data Yang Matching Kosong !!</h3></td>";
            //     echo "</tr>";
            // }
             ?>
        </tbody>
        </table>                        
                    
                </div>
                 <!-- END -->
            <!-- </div>
        </div>
    </div>
</div>


<?php 
    //}
?> 
<!-- -->
</section>



<!-- Modal Input Data Penduduk Baru --
<div class="modal fade" id="modal_master_titik" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input Data Titik Sebagai Master</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'input_master_titik','class'=>'form-horizontal'));?>
      <div class="modal-body form">
                    
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">No. NIK</label>
                        <div class="col-sm-8">
                           <input type="text" name="nik" class="form-control" id="">                        
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Latitude</label>
                        <div class="col-sm-8">
                           <input type="text" name="lat" class="form-control" id="">                        
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Longitude</label>
                        <div class="col-sm-8">
                           <input type="text" name="lng" class="form-control" id="">                        
                        </div>                        
                    </div>
                    <div id="patok" class="form-group">
                        <label  class="control-label col-sm-4" for="">Foto Titik / Tempat</label>
                        <div class="col-sm-8">
                            <input type="file" name="patok" class="form-control" id="">                        
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Area</label>
                        <div class="col-sm-8">
                           <input type="text" name="area" class="form-control" id="">                        
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Verified</label>
                        <div class="col-sm-8">
                        <input type="radio" name="verified" id="" value="1"> Telah di Verifikasi                      
                        <input type="radio" name="verified" id="" value="0"> Belum di Verifikasi                      
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Status</label>
                        <div class="col-sm-8">
                        <input type="radio" name="status" id="" value="SURAT KETERANGAN" checked> SURAT KETERANGAN <br>
                        <input type="radio" name="status" id="" value="BERSERTIFIKAT"> BERSERTIFIKAT <br>
                                                   
                        </div>                        
                    </div>

       <!--  --
       </div> 
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <button type="submit" onclick="save_tengah_one()" class="btn btn-primary">Save</button>
       </div>
     </form>
     </div> 
   </div> 
 </div>
 <!--  -->


<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script>

<script>
var imgUrl = '<?php echo base_url('assets/uploader/patok/'); ?>';
var map;
var color;
var opacity;
var url = '<?php echo base_url(); ?>semua/koordinat';
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

// Array Polygon
// var destination = [];
<?php //$id = 1; $koor = $this->tanah_model->get_data_koordinat_all()->result(); ?>
<?php //foreach ($koor as $koor) { ?>
//     var datalist = '<?php //echo $koor->koordinat;?>';
//     var dataSplit = datalist.split(/\s/);
//     var text = [];
//     for (var i = 0; i < dataSplit.length; i++) {
//       var arr = dataSplit[i].split(",");
//       text.push(new google.maps.LatLng(parseFloat(arr[0]), parseFloat(arr[1])));
//       console.log("lat :"+arr[0]+" Lng : "+arr[1]);
//     }
//     var color = '#'+Math.random().toString(16).substr(-6);
//     var area = google.maps.geometry.spherical.computeArea(text);
//     var contentString = '<b><?php //echo $koor->keterangan;?></b><br><br>Luas :  '+(area).toFixed(2)+' meter<sup>2</sup>';
//     polygon = new google.maps.Polygon({
//         paths: [text],
//         strokeColor:'#FF0000',
//         strokeOpacity: 0,
//         strokeWeight: 2,
//         fillColor:color,
//         fillOpacity: 0.9,
//         html: contentString
//     });
//     var text=[];
//   polygon.setMap(map);
//   infoWindow = new google.maps.InfoWindow();
//   google.maps.event.addListener(polygon, 'click', function(e) {
//     infoWindow.setContent(this.html);
//     infoWindow.setPosition(e.latLng);
//     infoWindow.open(map);
//   });
  <?php
  //}?>
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
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var title ;
    var contentString;
    $.ajax({
        'url': url,
        'success': function (data) {
            var markers = [];
            // console.log(data);
            for (let i = 0; i < data.length; i++) {
                var latLng = new google.maps.LatLng(
                    data[i]['latitude'],
                    data[i]['longitude']
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
                
                // '<p> Latitude : '+ data[i]['latitude'] +' Longitude: '+ data[i]['longitude'] +' <br> Area : &plusmn; '+ data[i]['area'] +' m<sup>2</sup><br> Status Data : '+ data[i]['verified'] +'</p>'+           
                // '</div>'+
                '</div>';
                // var infowindow = new google.maps.InfoWindow({
                //     content: contentString
                // });
                var mapIcon = 'https://si-desa.id/assets/house-icon.png';
                var marker = new google.maps.Marker({
                        position: latLng,
                        title: data[i]['nik'],
                        icon: mapIcon
                });
                marker.addListener('click', function() {
                    // alert(data[i]['id']);
                    show_details(data[i]['latitude'], data[i]['longitude']);
                    
                        // infowindow.open(map, marker);
                        // // console.log(contentString);
                        // // alert('Marker Klik' + data[i]['nik']);
                });
                
                markers.push(marker);                
            }       
            var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
            );
            // var markerCluster = new MarkerClusterer(map, markers);
    
        }
    });
       
        
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
    $('.img-details').attr('src', baseUrl+'assets/'+imgDetails); 
    $("#data_count").hide();
    $("#data_details").show();
    $("#data_loading").show();
    $("#data_details_view").hide();
    
    $.ajax({
        url: '<?php echo base_url('api/get_details/pemilik/'); ?>'+lt+'/'+lg,
        success: function( data){
            console.log(data);
            $("#data_loading").hide();
            $("#data_details_view").show();
        }
    });
   
}

function close_details(){
    $("#data_count").show();
    $("#data_details").hide();
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

