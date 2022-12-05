<x-header />
<x-navbar :navbar="$navbar"/>


<div class="dashboard-container main">
    <section class="chart dc">
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
                        <th>Nº Pedido</th>
                        <th>Massa</th>
                        <th>Borda</th>
                        <th>Sabor(es)</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>


                    <?php if($data): ?>

                            <?php for($i = 0; $i < count($data); $i++): ?>
                                <tr>
                                    <td><?= $data[$i]["pizza_id"] ?></td>

                                    <td><?= $data[$i]["massa"] ?></td>
                                    <td><?= $data[$i]["borda"] ?></td>

                                    <td>
                                        <?php for($n = 0; $n < count($saboresPizza[$i]); $n++): ?>
                                            <?php echo $saboresPizza[$i][$n]["nome"]; ?>
                                        <?php endfor; ?>
                                    </td>

                                    <td>
                                        <select>
                                            <option value="1">Em produção</option>
                                            <option value="2">Entrega</option>
                                            <option value="3">Concluído</option>
                                        </select>
                                    </td>

                                    <td>
                                        <form action="{{ route('dashboard.destroy', $data[$i]["pizza_id"]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            
                                            <button type='submit'><ion-icon name='trash-outline'></ion-icon></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endfor; ?>

                    <?php else: ?>
                        <tr>
                            <td>Nenhum pedido registrado ainda...</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                        
                </tbody>
            </table>
        </div>
    </section>
</div>