<table class="table table-responsive table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Unidad de medida</th>
            <th>Valor</th>
            <th>Fecha</th>
            <th>Origen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($indicadores as $indicador)
        <x-tr-indicador :indicador="$indicador" />
        @endforeach
    </tbody>
</table>

<div class="row">
    <div class="col-6 mx-auto">
        {{ $indicadores->links() }}
    </div>

</div>

<script>

    function deleteIndicador(id) {

        $.ajax({
            type: 'POST',
            url: 'api/delete-indicador',
            data: {
                id: id
            },
            success: function() {
                $(`#tr-${id}`).remove();
            }
        });

    }

</script>
