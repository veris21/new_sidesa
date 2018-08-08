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
    $num_results = $result->num_rows;
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Gender', 'Jumlah'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$jenis_kelamin}', {$total}],";
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


<div id="container">
    <h1>Statistik Penduduk Berdasar Jenis Kelamin</h1>
    <div id="visualization"></div>
</div>