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
       <?php 
        $no=1;
        foreach ($list as $el) {
            echo "<li>".$no."</li>";
            $no++;
        }?>
       </div>

    </div>
</section>