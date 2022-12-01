<x-header />
<x-navbar :navbar="$navbar"/>

<div class="charts-container">
    <section class="charts">

        <div class="chart">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Sabores', 'quantidade'],

                        
                        <?php 
                            for($i = 0; $i < count($sabores); $i++){
                                echo "['" . $sabores[$i]->nome . "', " . $saboresQtd[$i][0] . "],";
                            }
                        ?>

                    ]);

                    var options = {
                        title: 'Sabores mais vendidos',
                        backgroundColor: {
                            'fill': '#000',
                            'fillOpacity': 0.6 
                        },
                        colors: [
                            '#cccc00', 
                            '#ff0000', 
                            '#ff9900', 
                            '#0000ff', 
                            '#00cc00',
                            '#cc0099',
                            '#cc0000'
                        ],
                        titleTextStyle: {
                            color: 'white'
                        },
                        legend: {
                            textStyle: {
                                color: 'white'
                            },
                            position: 'bottom',
                            alignment: 'center',
                            width: 10
                        },
                        width:'100%',
                        height:'100%',
                        position: 'relative',
                        is3D: true,
                        chartArea: {
                            left: 20,
                            right: 30
                        },
                    }

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            </script>

            <div id="piechart"></div>
        </div>

        <div class="chart">
            
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Bordas', 'quantidade'],
                        <?php 
                            for($i = 0; $i < count($bordas); $i++){
                                echo "['" . $bordas[$i]->tipo . "', " . $bordasQtd[$i][0] . "],";
                            }
                        ?>
                    ]);

                    var options = {
                        title: 'Bordas mais vendidas',
                        backgroundColor: {
                            'fill': '#000',
                            'fillOpacity': 0.6 
                        },
                        colors: [
                            '#cccc00', 
                            '#ff0000', 
                            '#ff9900', 
                            '#0000ff', 
                            '#00cc00',
                            '#cc0099',
                            '#cc0000'
                        ],
                        titleTextStyle: {
                            color: 'white'
                        },
                        legend: {
                            textStyle: {
                                color: 'white'
                            },
                            position: 'bottom',
                            alignment: 'center',
                            width: 10
                        },
                        width:'100%',
                        height:'100%',
                        position: 'relative',
                        is3D: true,
                        chartArea: {
                            left: 20,
                            right: 30
                        },
                    }

                    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                    chart.draw(data, options);
                }
            </script>

            <div id="piechart2"></div>
        </div>

        <div class="chart">
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Massas', 'quantidade'],

                        <?php 
                            for($i = 0; $i < count($massas); $i++){
                                echo "['" . $massas[$i]->tipo . "', " . $massasQtd[$i][0] . "],";
                            }
                        ?>

                    ]);

                    var options = {
                        title: 'Massas mais vendidas',
                        backgroundColor: {
                            'fill': '#000',
                            'fillOpacity': 0.6 
                        },
                        colors: [
                            '#cccc00', 
                            '#ff0000', 
                            '#ff9900', 
                            '#0000ff', 
                            '#00cc00',
                            '#cc0099',
                            '#cc0000'
                        ],
                        titleTextStyle: {
                            color: 'white'
                        },
                        legend: {
                            textStyle: {
                                color: 'white'
                            },
                            position: 'bottom',
                            alignment: 'center',
                            width: 10
                        },
                        width:'100%',
                        height:'100%',
                        position: 'relative',
                        is3D: true,
                        chartArea: {
                            left: 20,
                            right: 30
                        },
                    }

                    var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

                    chart.draw(data, options);
                }
            </script>
            <div id="piechart3"></div>
        </div>
    </section>
</div>