<section class="content-header">
  <h1>
    Data Aset Pertanahan Desa
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Aset Tanah Desa</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-body">
        <div style="height:480px;" id="map-desa"></div>
          <hr>
      </div>
    </div>
  </div>
  <div class="col-md-4">
            <div class="box">
              <div class="box-header">
                <h4 class="box-title">Data Jalan</h4>
              </div>
              <div class="box-body">
              
              </div>
            </div>
  </div>
</div>


        <div class="row">
          <div class="col-md-6">    
              <div class="box">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-map"></i> Data Administrasi Desa</h3>
              </div>
              <div class="box-body">                       
              <table width="100%" class="table table-striped table-bordered table-hover" id="list_rtrw">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>Kode Data</th>
                    <th>Keterangan</th>
                    <th>Dasar Penetapan</th>
                    <th>#</th>
                  </tr>
                </thead>
              </table>
                </div>
              </div> 
              <hr>
              <button id="input_form_button" class="btn btn-primary btn-block" onclick="input_rtrw()">Input Master Batas</button>
              <div class="box box-warning" id="input_form" hidden>
                <?php echo form_open('', array('id'=>'form_rtrw')); ?>
                <div class="box-header">
                  <h5 class="box-title">Input Data Master Dasar Batas Administrasi Pertanahan</h5>
                </div>
                <div class="box-body">
                <div class="form-group">
                  <label for="">Kode RTRW</label>
                  <input type="text" name="kode_rtrw" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Dasar Hukum</label>
                  <input type="text" name="dasar_hukum" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Keterangan Lanjutan</label>
                  <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                </div>
                <div class="box-footer">
                <div class="pull-right">
                <button type="reset" class="btn btn-warning btn-flat btn-sm" onclick="reset()" >Reset <i class="fa fa-ban"></i> </button>
                <button type="button" class="btn btn-success btn-flat btn-sm" onclick="save_rtrw()">Posting Data <i class="fa fa-save"></i> </button>
                </div>
                </div>
                </form>
              </div>
          </div>
          <div class="col-md-6">
              <div class="box box-warning">
              <div class="box-header">
                <h4 class="box-title">Data Aset</h4>
              </div>
              <div class="box-body">
              <table width="100%" class="table table-striped table-bordered table-hover" id="list_aset">
                  <thead>
                    <tr>
                      <td>Keterangan</td>
                      <td>Foto</td>
                      <td>Koordinat</td>
                      <td>#</td>
                    </tr>                  
                  </thead>        
                </table>
                </div>
                <div class="box-footer">
                  <div class="pull-right">
                    <button onclick="input_aset()" class="btn btn-success btn-block btn-md">Input Data Lokasi Aset Tanah <i class="fa fa-map-o"></i></button>
                  </div>
                </div>
              </div>
          </div>         
        </div>

</section>


<!--  -->
<div class="modal fade" id="modal_aset_desa" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input Info Aset Pertanahan Desa</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'aset_desa_form','class'=>'form-horizontal'));?>
      <div class="modal-body form">
            <!--  -->
            <div id="foto-patok" class="form-group">
               <img src="" class=" col-sm-12 img img-rounded img-responsive" alt="FOTO PATOK">
            </div>
            <div id="keterangan">
                  <div class="form-group">
                    <label  class="control-label col-sm-4" for="">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" name="keterangan" class="form-control" id="">                        
                    </div>                        
                  </div>
            </div>
            <div id="LatLng">
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
            </div>
            <div id="foto" class="form-group">
                  <label  class="control-label col-sm-4" for="">Foto Tempat <br> <small style="font-size:11px;">Format (.jpg/.jpeg) max.4 MB</small></label>
                  <div class="col-sm-8">
                      <input type="file" name="patok" class="form-control" id="">                        
                  </div>                        
             </div>
            <!--  -->
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="tengah_id" value="">
            <input type="hidden" name="tanah_id" value="<?php echo 'DESA-'.$this->session->userdata('desa_id');?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_aset()" class="btn btn-success">Save Data Aset <i class="fa fa-map-o"></i></button>
      </div>
    </div>
   </div>
 </div>



<!-- Modal Setuju Dan Pilihan Rekomedasi -->
<div class="modal fade" id="modal_geo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input GeoJSON Koordinat Batas Desa</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'data_geo','class'=>'form-horizontal'));?>
      <div class="modal-body form">
          
            <div class="box box-warning">
                <div class="box-body"> 
                   <!--  -->                  
                  <div class="well">
                    <p>Pastikan Data yang di upload merulakan hasil export KML batas desa berformat .geojson atau .json Silahkan Download Contoh Format Data GeoJSON <a target"__blank" href="<?php echo base_url().GEOJSON.'batas-desa.geojson'; ?>">Disini ! </a></p>
                  </div>
                    <div id="geojson" class="form-group">
                        <label  class="control-label col-sm-4" for="">File Format (.geojson/.json)</label>
                        <div class="col-sm-8">
                            <input type="file" name="geofile" class="form-control" id="">                        
                        </div>                        
                    </div>                

                    <!-- <div id="keterangan" class="form-group">
                        <label  class="control-label col-sm-4" for="">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea rows="4" cols="8" class="form-control" name="keterangan"></textarea>                  
                        </div>                        
                    </div> -->
                    <!--  -->
                </div>
            </div>
                    
      </div>
      <input type="hidden" name="desa_id" value="<?php echo $this->session->userdata('desa_id');?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_geo()" class="btn btn-success">Save GeoJSON <i class="fa fa-map-o"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>


<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script>



// var infowindow = null;
// RTRW
var table;
var allTitik = [];
// var marker = [];
var map;
var color = '#'+Math.random().toString(16).substr(-6);
infowindow = new google.maps.InfoWindow({
	content: "holding..."
});
var baseIcon = '<?php echo base_url();?>assets/administration.png';
function initialize() {
  map = new google.maps.Map(document.getElementById('map-desa'), {
    zoom: 13,
    center: { lat: -2.974813, lng: 108.159151 },
    mapTypeId: 'terrain',
    // mapTypeControl: false,
    // disableDefaultUI: true
  });
  <?php 
  foreach ($marker as $marker) {
  ?>
  var marker = new google.maps.LatLng(<?php echo $marker->lat; ?>,<?php echo $marker->lng; ?>);
  var foto_tanah = '<?php echo $marker->foto_tanah; ?>';
  var keterangan = '<?php echo $marker->keterangan; ?>';
  var titik = new google.maps.Marker({
      position: marker,
      map: map,
      icon: baseIcon,
      html:
        '<div class="markerPop">' +
        '<center><img width="160" src="<?php echo base_url();?>assets/uploader/patok/' + foto_tanah + '"></center>' +
        '<hr><h5> ' + keterangan + '</h5>' +
        '<div>'
      });
      allTitik.push(marker);
      google.maps.event.addListener(titik, 'click', function () {
            infowindow.setContent(this.html);
            infowindow.open(map, this);
			});
  <?php
  }
  ?>
  var bounds = new google.maps.LatLngBounds();
	for (var i = 0, LtLgLen = allTitik.length; i < LtLgLen; i++) {
		//  And increase the bounds to take this point
		bounds.extend(allTitik[i]);
	}
	//  Fit these bounds to the map
	map.fitBounds(bounds);
  // map.data.setStyle({
  // strokeColor:'#FF0000',
  // strokeWeight: 1,
  // fillColor: color,  
  // fillOpacity: 0.6
  // });
  // map.data.loadGeoJson('<?php //echo base_url().GEOJSON.$titik['json'];?>');
  init_rtrw();
  init_aset();
}

function view_rtrw(id) {
  
}

function init_aset() {
  $('#list_aset').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('pertanahan/get_aset');?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
        destroy: true,
        responsive: true
        });
}

function init_rtrw(){
  // evt.preventDefault();
  $('#list_rtrw').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('rtrw/get_master');?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
        destroy: true,
        responsive: true
        });
}

function input_rtrw(){
  $('#input_form').show();
  $('#input_form_button').hide();
}

function reset() {
  $('#input_form').hide();
  $('#input_form_button').show();
  location.reload();
}

function save_rtrw(){
  $.ajax({
    url: '<?php echo base_url('rtrw/save');?>',
    type : 'POST',
    dataType: 'JSON',
    data : $('#form_rtrw').serialize(),
    success : function (data){
      init_rtrw();
      // $('[name="kode_rtrw"]').val('');
      // $('[name="dasar_hukum"]').val('');
      // $('[name="keterangan"]').val('');
      $('#form_rtrw')[0].reset();
      swal('Selamat !', 'Berhasil Menyimpan Data RTRW di Sistem!', 'success');
     
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>