<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

<script type="text/javascript">
       //load package
google.load('visualization', '1', {packages: ['corechart']});
 </script>
		<?php 
		// $jml = json_encode($penduduk->result());		
		// $lk = $laki->num_rows();		
		// $pr = $perempuan->num_rows();		
		// foreach ($penduduk->result() as $x) {
		// 	$label[] = $x->jenis_kelamin;
		// 	$nilai[] = $x->total;
		// }
		?>

<?php $result = $penduduk;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Gender', 'Jumlah'],
                    <?php
                    foreach ($result->result() as $row) {
                        extract($row);
                        echo "['{$row->jenis_kelamin}', {$row->total}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Data Visual Penduduk Berdasar Jenis Kelamin"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>
    </script>

<div class="row">
<div class="col-md-6">
<div id="visualization"></div>
</div>
<div class="col-md-6">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui aliquid omnis ut laboriosam vero quod autem repellendus quas optio voluptatum consequatur, rem facere itaque quibusdam impedit eos incidunt nihil ullam.</p>
</div>
</div>
    
