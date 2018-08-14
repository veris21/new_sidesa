<section class="content-header">
<h1>
  Master Pemutihan Koordinat Tanah
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Pemutihan Koordinat Tanah</li>
</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header">
                    <h5 class="box-title">Daftar List</h5>
                </div>
                <div class="box-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="koordinat_tengah_all">
                    <thead>
                    <tr valign="center" align="center" style="font-weight:bolder;">
                        <td>No. NIK</td>    
                        <td>Status Dokumen</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $k) {
                         $verified = $k->verified;
                     ?>
                        <tr>
                            <td align='left'><?php echo $k->nik; ?></td>
                            <td align='center'> 
                            <?php $status_lengkap = ($verified == 1 ? 
                            "<button disabled='disabled' class='btn btn-sm btn-flat btn-success'>Data Lengkap</button> " : 
                            "<button disabled='disabled' class='btn btn-sm btn-flat btn-warning'>Belum Lengkap</button> ");
                            echo $status_lengkap;
                            ?>
                            </td>
                            <td align='center'>
                            <?php if ($verified == 1) {  ?>
                            <button onclick="view_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-success'><i class='fa fa-eye'></i></button> 
                            <button onclick="edit_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button> 
                           <?php } else { ?>
                            <button onclick="view_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-success'><i class='fa fa-eye'></i></button> 
                            <button onclick="edit_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button> 
                           <?php } ?>
                            </td>

                        </tr>
                    <?php } ?>
                    </tbody> 
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="box box-warning">
                <div class="box-header">
                    <h5 class="box-title">Kelengkapan Berkas</h5>
                </div>
                <div class="box-body">
                    <center id="loader" style="display:none;">
                        <img width="25%" class="img img-responsive" src="<?php echo base_url().'assets/';?>nyapu.gif" />
                    </center>
                    <div id="data-show" hidden>
                    <div class="row">
                        <div class="col-md-12">
                            <div  style="height: 480px;" id="map-view"></div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-6">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td>No Nik</td>
                                    <td><b id="nik"></b></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6"
                        
                        ></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</secttion>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script>
var titik_tengah;
var nik;


function view_data_pemutihan_one(id) {
    $('#data-show').hide();
    $('#loader').show();    
    var url = "<?php echo base_url('pemutihan/one/');?>";
    $.ajax({
        'url' : url+id,
        'success' : function(data){
            // var obj = JSON.parse(data);
            $('#loader').hide();
            if (data != null) {
                titik_tengah = new google.maps.LatLng(parseFloat(data.latitude), parseFloat(data.longitude));
                nik = data.nik;
                // console.log(data);
                // console.log(titik_tengah);
                $('#nik').text(data.nik);
                initialize();
                validasi_data(nik)
                $('#data-show').show();
            } else {
                
            }
            

        }
    });
}

function validasi_data(nik){
    var url = '<?php echo base_url("titik_berdasar_nik/") ?>';
    $.ajax({
        'url': url+nik,
        'success' : function(data){
            console.log(data);
        }
    });
}


function initialize() {
   var map = new google.maps.Map(document.getElementById('map-view'), {
    zoom: 20,
    center: titik_tengah,
    mapTypeId: 'terrain',
  });

    const mapIcon = 'https://si-desa.id/assets/house-icon.png';
    const marker = new google.maps.Marker({
            position: titik_tengah,
            icon: mapIcon,
            map: map
    });
               

}

// google.maps.event.addDomListener(window, 'load', initialize);
</script>