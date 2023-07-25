@foreach($response as $key => $value)
@php
    $dat=App\Archivo::where('documento_id',$value->id)->get();
    $mail=App\Shared::where('documento_id',$value->id)->get()
@endphp
<tr>
    <td>
        {{$value->titulo}}
    </td>
    <td>
        {{$value->Username->name}}
    </td>
    <td>
        {{$value->categoria->nombre}}
    </td>
    <td>
        {{$value->estado}}
    </td>
    <td>
        {{$value->seguimiento}}
    </td>
    <td>
        <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">filter</i>
            <span class="notification">
                {{count($dat)}}
            </span>
        </a>
    </td>
    <td>
        <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">insert_emoticon</i>
            <span class="notification">
                {{count($mail)}}
            </span>
        </a>
    </td>
    <td>
        <a onclick="datadocinfo(this)" data-info="{{$value->id}}"><i class="material-icons">info_outline</i></a>
        <a onclick="datashowseg(this)" data-showseg="{{$value->id}}"><i class="material-icons">system_update_alt</i></a>
    </td>
</tr>
@endforeach