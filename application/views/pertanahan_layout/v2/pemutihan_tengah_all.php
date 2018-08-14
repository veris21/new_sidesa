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
                    <div class="row" id="peta">
                        <div class="col-md-12">
                            <div  style="height: 480px;" id="map-view"></div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row" id="kelengkapan">
                        <div class="col-md-6">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                            <tr><td>No Nik</td><td><b id="nik"></b></td></tr>
                            <tr><td>Nama Lengkap</td><td><b id="nama"></b></td></tr>
                            <tr><td>Alamat</td><td><b id="alamat"></b></td></tr>
                            <tr><td>Status Surat</td><td><b id="status"></b></td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row" id="warning" hidden>
                        <div class="col-md-12">
                            <div class="well">
                            <h3 style="text-align:center;">Data Belum Lengkap</h3>
                            <p>
                            Data Belum Memiliki Kelengkapan Data, Data Penduduk Belum Ada di Sistem, Data Patok Batas, Surat Pengantar dll.
                            Silahkan Lengkapi Data dan Dokumen Pendukung Pertanahan lainnya</p>
                            </div>
                            
                            <center>
                                <button class="btn btn-warning">
                                Lengkapi Data <i class="fa fa-upload"> </i> 
                                </button>
                            </center>
                        </div>
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
    event.preventDefault();
    // $("#data-show")[0].reset();
    $('#data-show').hide();
    $('#loader').show();    
    var url = "<?php echo base_url('pemutihan/one/');?>";
    $.ajax({
        'url' : url+id,
        'success' : function(data){
            console.log(data);
            // var obj = JSON.parse(data);
            $('#loader').hide();
            if (data != null) {
                titik_tengah = new google.maps.LatLng(parseFloat(data.latitude), parseFloat(data.longitude));
                nik = data.nik;                
                initialize();
                validasi_data(nik)
                $('#data-show').show();
            }
            

        }
    });
}

function validasi_data(nik){
    event.preventDefault();
    var url = '<?php echo base_url("pemutihan/validate_nik/") ?>';
    $("#nik").text('');
    $("#nama").text('');
    $("#alamat").text('');
    $("#status").text('');
    
    $.ajax({
        url: url+nik,
        success : function(x){
            if(x == null || x ==''){
            $("#kelengkapan").hide();
            $("#warning").show();
            }else{
            $("#nik").text(x.nik);
            $("#nama").text(x.nama);
            $("#alamat").text(x.alamat);
            $("#status").text(x.status);
            $("#kelengkapan").show();
            $("#warning").hide();
            }
            


        },
        error: function (jqXHR, textStatus, errorThrown) {
            
           
        }
        
    });
}


function initialize() {
   var map = new google.maps.Map(document.getElementById('map-view'), {
    zoom: 20,
    center: titik_tengah,
    mapTypeId: 'terrain',
    mapTypeId: 'terrain',
    mapTypeControl: false,
    disableDefaultUI: true
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