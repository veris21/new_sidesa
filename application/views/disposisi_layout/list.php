<section class="content-header">
  <h1>
    List Disposisi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Disposisi</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">

       <div class="box-body">
       <table width="100%" class="table table-striped table-bordered table-hover" id="list_disposisi">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
          <td>Dari</td>
          <td>Kepada</td>
          <td>ARSIP Link</td>
          <td>Isi Disposisi</td>
          <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php 
        
        foreach ($list as $el) {
            
        ?>
          <tr>
          <td><?php echo $el->dari_id;?></td>
          <td><?php echo $el->kepada_id;?></td>
          <td><?php echo $el->arsip_id;?></td>
          <td><?php echo $el->isi_disposisi;?></td>
          <td><?php echo $el->status;?></td>
          </tr>
          <?php 
          $no++;
          }?>
        </tbody>       
       </table>
      
       </div>

    </div>
</section>