<form id="form">
    <div class="row">
        <div class="col-4">
            <label for="nombre">Indicador</label>
            <select class="form-select" id="nombre">
                <option value="0" selected disabled>Seleccione un indicador</option>
                @foreach ($indicadores as $indicador)
                <option value="{{ $indicador->nombreIndicador }}">{{ $indicador->nombreIndicador }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <label for="fecha_inicial">Fecha inicial</label>
            <input type="date" class="form-control" id="fecha_inicial">
        </div>
        <div class="col-4">
            <label for="fecha_final">Fecha final</label>
            <input type="date" class="form-control" id="fecha_final">
        </div>
    </div>
</form>