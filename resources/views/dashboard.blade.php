<x-header />
<x-navbar />

<div class="dashboard-container">
    <section class="chart">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Sabores', 'quantidade'],

                    ['4 Queijos', 2],
                    ['Frango com Catupiry', 2],
                    ['Calabresa', 2],
                    ['Lombinho', 2],
                    ['Filé com Cheddar', 2],
                    ['Portuguesa', 2],
                    ['Margherita', 2],

                ]);

                var options = {
                    title: 'Sabores mais vendidos',
                    backgroundColor: {
                        'fill': '#000',
                        'fillOpacity': 0.3 
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
                        left: 10,
                        right: 30
                    },
                }

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>

        <div id="piechart"></div>
    </section>

    <section class="tables">
        <div class="header_fixed">
            <table>
                <thead>
                    <tr>
                        <!-- <th>Id</th> -->
                        <th>Massa</th>
                        <th>Borda</th>
                        <th>Sabor(es)</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </section>
</div>