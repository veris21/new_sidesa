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
                       
                     ?>
                        <tr>
                            <td align='left'><?php echo $k->nik; ?></td>
                            <td align='center'> <button disabled='disabled' class='btn btn-sm btn-flat btn-success'>Lengkap</button> </td>
                            <td align='center'>
                            <button onclick="view_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-success'><i class='fa fa-eye'></i></button> 
                            <button onclick="edit_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button> 
                            <button onclick="push_data_pemutihan_one(<?php echo $k->id;?>)" class='btn btn-xs btn-primary'><i class='fa fa-upload'></i></button> 
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
                    <div id="data-show">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</secttion>



<script>
function view_data_pemutihan_one(id) {
    var url = "<?php echo base_url('pemutihan/one/');?>";
    $.ajax({
        'url' : url+id,
        'success' : function(data){
            console.log(data);
        }
    });
}
</script>