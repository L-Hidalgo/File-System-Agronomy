@foreach($data as $key => $value)
<tr>
    <td>
        {{$value->titulo}}
    </td>
    <td>
        {{$value->Username->nombres}}
    </td>
    <td>
        @if($value->subido_por)
        {{$value->Subido->nombres}}
        
        @else
            <p style="color: brown">corrigiendo ultimo no tiene</p>
        @endif
        
    </td>
    <td>
        {{$value->estado}}
    </td>
    <td>
        {{$value->categoria->nombre}}
    </td>
    <td>
        <a onclick="datadoc(this)" data-doc="{{$value->id}}"><i class="material-icons">search</i></a>
        <a onclick="datadocinfo(this)" data-info="{{$value->id}}"><i class="material-icons">info_outline</i></a>
        <a href=""><i class="material-icons">delete_sweep</i></a>
    </td>
</tr>
@endforeach