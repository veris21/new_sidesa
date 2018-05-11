<section class="content-header">
<h1>
  Master Data Koordinat Tanah
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Input Data Koordinat Tanah</li>
</ol>
</section>
<section class="content">
<div class="box box-info">
    <div class="box-header">
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
        <button type="submit" name="upload" class="btn btn-sm btn-flat btn-warning btn-block">Import Excel <i class="fa fa-excel-o"></i> </button>
      </div>
    <?php 
    echo form_close();
        break;
    default:
        ?> 
    <h3 class="box-title">Apa Anda ingin menginput Data Koordinat Baru ?</h3>       
        <button class="btn btn-sm btn-flat btn-success" onclick="v2_input_koordinat_tengah()" >Iya, Input Data <i class="fa fa-plus"></i></button>
        <?php
        break;
        
    }
    ?>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="master_koordinat_tengah">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>Nama/ NIK</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Dokumentasi</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
            <?php             
            // if($data!= '' || $data !=null){
            foreach ($data as $koor) {
            echo "<tr>";
            echo "<td>a/n. : ".$koor->nama." <br> No NIK.".$koor->nik."</td>";
            echo "<td>".$koor->latitude."</td>";
            echo "<td>".$koor->longitude."</td>";
            echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$koor->dokumentasi."' /></td>";
            echo "<td align='center'> <button onclick='v2_edit_koordinat_tengah()' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button> <button onclick='v2_hapus_koordinat_tengah()' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button> </td>";
            echo "</tr>";
            } 
            // }else{
            //     echo "<tr>";
            //     echo "<td colspan='6' align='center'><h3>Data Yang Matching Kosong !!</h3></td>";
            //     echo "</tr>";
            // }
             ?>
        </tbody>
        </table>
    </div>
</div>

<hr>
<?php 
        switch ($this->session->userdata('jabatan')) {
        case 'ROOT':
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Semua Koordinat Tersimpan</h3>
        <hr>
        <button class="btn btn-sm btn-flat btn-success" onclick="input_tengah_one()" >Input Titik <i class="fa fa-plus"></i></button>
    </div>
    <div class="box-body">
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
            foreach ($dataAll as $data) {
            echo "<tr>";
            echo "<td>No NIK.".$data->nik."</td>";
            echo "<td>".$data->latitude."</td>";
            echo "<td>".$data->longitude."</td>";
            echo "<td align='center'><img width='70' class='img img-thumbnail img-rounded' src='".base_url().PATOK.$data->dokumentasi."' /></td>";
            echo "<td align='center'> <a href='".base_url('koordinat')."' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a> <a href='".base_url('koordinat')."' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></a> </td>";
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
 