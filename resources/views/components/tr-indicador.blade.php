<tr id="tr-{{ $indicador->id }}">
    <td>{{ $indicador->id }}</td>
    <td>{{ $indicador->nombreIndicador }}</td>
    <td>{{ $indicador->codigoIndicador }}</td>
    <td>{{ $indicador->unidadMedidaIndicador }}</td>
    <td>{{ $indicador->valorIndicador }}</td>
    <td>{{ date('d-m-Y', strtotime($indicador->fechaIndicador)) }}</td>
    <td>{{ $indicador->origenIndicador }}</td>
    <td>
        <a href="edit-indicador/{{ $indicador->id }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
        <button class="btn btn-danger" onclick="deleteIndicador({{ $indicador->id }})"><i class="fa-solid fa-trash"></i></button>
    </td>
</tr>