<section class="content-header">
  <h1>
    Data Dasar Pertanahan Desa
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">RTRW Desa</li>
  </ol>
</section>
<section class="content">


<div class="row">
    <div class="col-md-8">
    <div class="box box-warning">
        <div class="box-header">
        <h2 class="box-title"><?php echo $data['kode_rtrw'];?></h2>
        </div>
        <div class="box-body">
            <div class="well">
                <dd>Dasar Hukum Penetapan</dd>
                <dt><?php echo $data['dasar_hukum'];?></dt>
                <br>
                <dd>Keterangan </dd>
                <dt><?php echo $data['keterangan'];?></dt>
                <dd>Kode Warna</dd>
                <dt><p><?php echo $data['color'];?></p> </dt>
                <div style="background-color: <?php echo $data['color'];?>;width:80px;height:24px;padding:14px;"></div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-4">
    
    <div class="box box-warning">
        <?php echo form_open('', array('id' => 'koordinat_rtrw'));?>
        <div class="box-header">
        <h3 class="box-title">Form Input Batas</h3>
        </div>
        <div class="box-body">
        <input type="hidden" name="id_batas" value="<?php echo $data['id']; ?>">
        <div class="form-group">
            <label for="">Latitude</label>
            <input type="text" name="lat" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Longitude</label>
            <input type="text" name="lng" class="form-control">
        </div>
        </div>
        <div class="box-footer pull-right">
        <button class="btn btn-warning btn-flat btn-sm" type="reset">Reset <i class="fa fa-ban"></i></button>
        <button onclick="save_koordinat_rtrw()" class="btn btn-success btn-flat btn-sm">Posting <i class="fa fa-upload"></i></button>
        </div>
        </form>
    </div>

    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="box">
            <div class="box-body">
            <div style="height:480px;" id="map-rtrw"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

    <div class="box box-success">
            <div class="box-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="list_rtrw_koordinat">
                <thead>
                    <tr>
                        <!-- <th>No</th> -->
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody id="data_koordinat">
                </tbody>
            </table>
            </div>
        </div>

    </div>
</div>
</section>


<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script>
var map;
var table;
var patok = [];
function initialize() {
  map = new google.maps.Map(document.getElementById('map-rtrw'), {
    zoom: 12,
    center: new google.maps.LatLng(-2.965819, 108.167219),
    mapTypeId: 'terrain',
    // mapTypeControl: false,
    // disableDefaultUI: true
  });
  init_koordinat();  
}

function init_koordinat() {
    $.ajax({
        url:'<?php echo base_url('rtrw/koordinat/').$data['id']; ?>',
        success : function (data) {
        if (data != null) {
        for (let i = 0; i < data.length; i++) {
            const id = data[i]['id'];
            const lat = data[i]['lat'];
            const lng = data[i]['lng'];
            patok.push(new google.maps.LatLng(parseFloat(lat),parseFloat(lng)));

            table += "<tr>"+
            // "<td width='8' align='center'>"+(i+1)+"</td>"+
            "<td >"+lat+"</td>"+
            "<td >"+lng+"</td>"+
            "<td align='center'><button class='btn btn-flat btn-xs btn-warning' onclick='edit_koor_rtrw("+id+")'><i class='fa fa-edit'></i></button> . <button class='btn btn-flat btn-xs btn-danger' onclick='hapus_koor_rtrw("+id+")'><i class='fa fa-trash'></i></button></td>"+
            "</tr>";
        }
      } else {
      table = "<tr><td colspan='4' align='center'>Data Belum Ada</td></tr>";
      }
      $("#data_koordinat").html(table);     
        var polygon = new google.maps.Polygon({
            paths: patok,
            strokeColor:'#000000',
            strokeOpacity: 1,
            strokeWeight: 1,
            fillColor:'<?php echo $data['color']; ?>',
            fillOpacity: 0.3,
        });
        polygon.setMap(map);
     }
    });
}

function save_koordinat_rtrw(){
    $.ajax({
        url:'<?php echo base_url('rtrw/koordinat/posting'); ?>',
        type : 'POST',
        dataType: 'JSON',
        data: $('#koordinat_rtrw').serialize(),
        success : function (data) {            
            // swal('Selamat !', 'Berhasil Menyimpan Data RTRW di Sistem!', 'success');
            $('#koordinat_rtrw')[0].reset();
            initialize();
        }
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>