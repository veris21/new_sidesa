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

<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Titik Peta Terekam Sistem
        </h3>
    </div>
    <div class="box-body">
        <div style="height: 640px;" id="map-canvas"></div>
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
<hr>
<?php 
    switch ($this->session->userdata('jabatan')) {
    case 'ROOT' || 'MASTER' || 'PERTANAHAN' :
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
                <div class="tab-pane active" id="list_koordinat_all">
        <?php 
        switch ($this->session->userdata('jabatan')) {
            case 'ROOT' || 'MASTER' || 'PERTANAHAN' :
        ?>
        <hr/>
        <button class="btn btn-sm btn-flat btn-success" onclick="input_tengah_one()" >Input Titik <i class="fa fa-plus"></i></button>
        <?php 
         break;
         default:
         break;
        }
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
            if($dataAll!= '' || $dataAll !=null){
            foreach ($dataAll as $semua) {
            echo "<tr>";
            echo "<td>No NIK.".$semua->nik."</td>";
            echo "<td>".$semua->latitude."</td>";
            echo "<td>".$semua->longitude."</td>";
            echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$semua->dokumentasi."' /></td>";
            switch ($this->session->userdata('jabatan')) {
                case 'ROOT':            
            echo "<td align='center'>";
            
            // echo "<a href='".base_url('koordinat')."' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>";
            
            ?>
            <button onclick="delete_tengah_one(<?php echo $semua->id;?>)" class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button> 
            <?php 
            break;
                default:
                echo "<td align='center'> <button class='btn btn-sm btn-block btn-danger disabled'> Tidak Memiliki Hak Akses </button> </td>";
                break;
            }
            echo "</td>";
            echo "</tr>";
            } 
            }else{
                echo "<tr>";
                echo "<td colspan='6' align='center'><h3>Data Yang Matching Kosong !!</h3></td>";
                echo "</tr>";
            }
             ?>
        </tbody>
        </table>

                </div>
                <!-- END -->
                <!-- START TAB Kedua -->
                <div class="tab-pane" id="list_koordinat_publik">

                            <hr>
                            <button class="btn btn-sm btn-flat btn-success" onclick="verifikasi_tengah_one()" >Verifikasi Titik<i class="fa fa-plus"></i></button>
                            <hr>
                           <table width="100%" class="table table-striped table-bordered table-hover" id="master_koordinat_tengah">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>Nama/ NIK</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Dokumentasi</td>

            <!-- <td>Action</td> -->

        </tr>
        </thead>
        <tbody>
        <?php             
            if($data!= '' || $data !=null){

            foreach ($data as $koor) {
            echo "<tr>";
            echo "<td>a/n. : ".$koor->nama." <br> No NIK.".$koor->nik."</td>";
            echo "<td>".$koor->latitude."</td>";
            echo "<td>".$koor->longitude."</td>";
            echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$koor->dokumentasi."' /></td>";
            // echo "<td align='center'> <button onclick='v2_edit_koordinat_tengah()' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button> <button onclick='v2_hapus_koordinat_tengah()' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button> </td>";
            echo "</tr>";
            } 


            }else{
                echo "<tr>";
                echo "<td colspan='6' align='center'><h3>Data Yang Matching Kosong !!</h3></td>";
                echo "</tr>";
            }
             ?>
        </tbody>
        </table>                        
                    
                </div>
                 <!-- END -->
            </div>
        </div>
    </div>
</div>


<?php 
    }
?>
</section>



<!-- Modal Input Data Penduduk Baru -->
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
                    <!-- <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Verified</label>
                        <div class="col-sm-8">
                        <input type="radio" name="verified" id="" value="1"> Telah di Verifikasi                      
                        <input type="radio" name="verified" id="" value="0"> Belum di Verifikasi                      
                        </div>                        
                    </div> -->
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Status</label>
                        <div class="col-sm-8">
                        <input type="radio" name="status" id="" value="SURAT KETERANGAN" checked> SURAT KETERANGAN <br>
                        <input type="radio" name="status" id="" value="BERSERTIFIKAT"> BERSERTIFIKAT <br>
                                                   
                        </div>                        
                    </div>

       <!--  -->
       </div> 
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <button type="submit" onclick="save_tengah_one()" class="btn btn-primary">Save</button>
       </div>
     </form>
     </div> 
   </div> 
 </div>
 


<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script>

<script>
var map;
var url = '<?php echo base_url(); ?>semua/koordinat';
function initialize() {

map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 10,
    center: new google.maps.LatLng(-2.858830, 107.906900),
    mapTypeId: 'terrain',
    // mapTypeControl: false,
    // disableDefaultUI: true
  });

// Array Polygon
var destination = [];
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
//     var contentString = '<b><?php echo $koor->keterangan;?></b><br><br>Luas :  '+(area).toFixed(2)+' meter<sup>2</sup>';
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
// var destinations = [
//     [
//         {lat: -2.977006, lng: 108.156042},
//         {lat: -2.977520, lng: 108.156804},
//         {lat: -2.976695, lng: 108.157716},
//         {lat: -2.976202, lng: 108.156901}
//     ],
//     [
//         {lat: -2.973920, lng: 108.154401},
//         {lat: -2.973074, lng: 108.155281},
//         {lat: -2.974467, lng: 108.156408},
//         {lat: -2.975185, lng: 108.155657}
//         ]];
$.ajax({
    'url': '<?php echo base_url('api/tanah_all/polygon/json');?>',
    'success' : function(data){
        var groupedByData = {};
        var dest = {};
        for (var key in data) {
            var id = data[key].id_data_link;  
            var latlng = new google.maps.LatLng(data[key].lat, data[key].lng);
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
    //    console.log(path);
       var color = '#'+Math.random().toString(16).substr(-6);
       var polygon = new google.maps.Polygon({
          paths: path,
          strokeColor: '#000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: color,
          fillOpacity: 0.35
        });
       polygon.setMap(map);
    }
});




//   Array Marker
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $.ajax({
        'url': url,
        'success': function (data) {
            var markers = [];
            // console.log(data);
            for (let i = 0; i < data.length; i++) {
                const latLng = new google.maps.LatLng(
                    data[i]['latitude'],
                    data[i]['longitude']
                );
                const title = data[i]['nik'];
                // const contentString = '<div id="content">'+
                // '<div id="siteNotice">'+
                // '<p> No NIK. <b>'+ data[i]['nik'] +'</b>' +
                // '</div>'+
                // '<h5 id="firstHeading" class="firstHeading">'+ data[i]['status']+'</h5>'+
                // '<div id="bodyContent">'+
                // '<img class="img img-thumbnail" width="90" src="<?php //echo base_url().PATOK;?>'+data[i]['dokumentasi']+ '" />'+
                
                // '.</p>'+ 
                // '<p> Latitude : '+ data[i]['latitude'] +' Longitude: '+ data[i]['longitude'] +' <br> Area : &plusmn; '+ data[i]['area'] +' m<sup>2</sup><br> Status Data : '+ data[i]['verified'] +'</p>'+           
                // '</div>'+
                // '</div>';
                // var infowindow = new google.maps.InfoWindow({
                //                     content: contentString
                //                     });
                const mapIcon = 'https://si-desa.id/assets/house-icon.png';
                const marker = new google.maps.Marker({
                        position: latLng,
                        title: title,
                        icon: mapIcon

                });
                // marker.addListener('click', function() {
                //         infowindow.open(map, marker);
                //     });
                markers.push(marker);
                
            }       
            var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
            );
            // var markerCluster = new MarkerClusterer(map, markers);
    
        }
    });
       
        



// locations.push(new google.maps.LatLng(floatval(<?php echo $data->latitude;?>), floatval(<?php echo $data->longitude;?>)));



}
google.maps.event.addDomListener(window, 'load', initialize);

</script>

