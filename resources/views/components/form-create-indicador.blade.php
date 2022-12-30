<form id="form" novalidate>
    <div class="row">
        <div class="col-md-6 col-12 mt-3">
            <label for="" class="form-label">Indicador</label>
            <select name="nombre" id="nombre" class="form-select" required>
                <option value="" selected disabled>Seleccione un indicador</option>
                @foreach ($indicadores as $indicador)
                <option value="{{ $loop->index }}">{{ $indicador->nombreIndicador }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Debe seleccionar un indicador
            </div>
        </div>

        <div class="col-md-3 col-12 mt-3">
            <label for="" class="form-label">Código</label>
            <input type="text" class="form-control pe-none" name="codigo" id="codigo" placeholder="Código" readonly>
        </div>

        <div class="col-md-3 col-12 mt-3">
            <label for="" class="form-label">Unidad de medida</label>
            <input type="text" class="form-control pe-none" name="unidadMedida" id="unidadMedida"
                placeholder="Unidad de medida" readonly>
        </div>

        <div class="col-md-4 col-12 mt-3">
            <label for="" class="form-label">Valor</label>
            <input type="text" class="form-control" name="valor" id="valor" placeholder="Indique el valor" required>
            <div class="invalid-feedback">
                Debe indicar el valor
            </div>
        </div>

        <div class="col-md-4 col-12 mt-3">
            <label for="" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Indique la fecha" required>
            <div class="invalid-feedback">
                Debe seleccionar una fecha
            </div>
        </div>

        <div class="col-md-4 col-12 mt-3">
            <label for="" class="form-label">Origen</label>
            <input type="text" class="form-control" name="origen" id="origen" placeholder="Indique el origen" required>
            <div class="invalid-feedback">
                Debe indicar el origen
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="alert alert-danger d-none" role="alert" id="errores">

            </div>
        </div>

        <div class="col-12 d-grid mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

    </div>
</form>

<script>
    const indicadores = {{ Illuminate\Support\Js::from($indicadores) }};

    const form = $('#form');

    $('#nombre').change(function() {
        $('#codigo').val(indicadores[$(this).val()].codigoIndicador);
        $('#unidadMedida').val(indicadores[$(this).val()].unidadMedidaIndicador);
    });

    form.submit(function (e) {
        e.preventDefault();

        $('#errores').addClass('d-none').empty();

        $(this).addClass('was-validated');

        if (document.getElementById('form').checkValidity()) {

            $.ajax({
                type: 'POST',
                url: '{{ env('APP_URL') }}/api/create-indicador',
                data: {
                    'nombre': $('#nombre').val() != null ? indicadores[$('#nombre').val()].nombreIndicador : '',
                    'codigo': $('#codigo').val(),
                    'unidadMedida': $('#unidadMedida').val(),
                    'valor': $('#valor').val(),
                    'fecha': $('#fecha').val(),
                    'origen': $('#origen').val()
                },

                success: function() {
                    location.href = '/';
                },

                error: function(error) {
                    const errors = error.responseJSON.errors;

                    $.each(errors, function() {
                        $('#errores').append($(this)[0] + '<br>');
                    });

                    $('#errores').removeClass('d-none')
                }
            });

        }
        
    });

</script>