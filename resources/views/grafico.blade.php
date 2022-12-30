<x-app-layout>

    <div class="container my-5">
        <h1>Ver gráfico</h1>
        <hr>
        <div class="my-3">
            <a href="/">Volver al inicio</a>
        </div>

        <x-form-grafico />

        <canvas class="mt-5" id="grafico"></canvas>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('grafico');

        let grafico = new Chart(ctx, {});

        $('#form').change(function(e) {

            const nombre = $('#nombre').val();
            const fecha_inicial = $('#fecha_inicial').val();
            const fecha_final = $('#fecha_final').val();

            if (nombre != 0 && fecha_inicial != '' && fecha_final != '') {

                grafico.destroy();

                $.ajax({
                    type: 'GET',
                    url: `{{ env('APP_URL') }}/api/grafico-data/${nombre}/${fecha_inicial}/${fecha_final}`,
                    success: function(data) {

                        console.log(data.indicadores);

                        let labels = [];
                        $.each(data.indicadores, function(index, value) {
                            // console.log(value);
                            labels.push(value.fechaIndicador)
                        });

                        let valores = [];
                        $.each(data.indicadores, function(index, value) {
                            valores.push(value.valorIndicador);
                        });

                        // console.log(labels, valores);

                        grafico = new Chart(ctx, {
                            type: 'line',
                            data: {
                            labels: labels,
                            datasets: [{
                                label: `${nombre} (${data.indicadores[0].unidadMedidaIndicador})`,
                                data: valores,
                                borderWidth: 1
                            }]
                            },
                            options: {
                                scales: {
                                    y: {
                                    beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                });
            }

        });

        
    </script>

</x-app-layout>