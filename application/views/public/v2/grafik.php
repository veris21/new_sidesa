<script src="https://code.highcharts.com/highcharts.src.js"></script>
<div id="container" style="width:100%; height:400px;"></div>
<script>
// $(function () { 
    var myChart = Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Statistik Berdasarkan Jenis Kelamin'
        },
        xAxis: {
            categories: ['Rasau', 'Baru', 'Ganse']
        },
        yAxis: {
            title: {
                text: 'Statistik Penduduk Berdasar Jenis Kelamin'
            }
        },
        series: [{
            name: 'Laki - Laki',
            data: [50, 10, 49]
        }, {
            name: 'Perempuan',
            data: [23, 21, 39]
        }]
    });
// });
</script>