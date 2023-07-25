<table class="table" style="border-collapse:collapse; table-collapse:collapse;text-align:center;width:105%;" >
    <thead style="background-color: aquamarine">
      <tr style="border: 2px solid black;">
        <th style="width:20%; border: 2px solid black;text-align:center">Documento</th>
        <th style="width:5%; border: 2px solid black;text-align:center;letter-spacing:1px">Usuario</th>
        <th style="width:5%; border: 2px solid black;text-align:center;letter-spacing:0px">Categoria</th>
        <th style="width:8%; border: 2px solid black;text-align:center;letter-spacing:0px">Tipo De Documento</th>
        <th style="width:5%; border: 2px solid black;text-align:center;letter-spacing:0px">Archivos</th>
        <th style="width:8%; border: 2px solid black;text-align:center;letter-spacing:0px">creado</th>
        <th style="width:8%; border: 2px solid black;text-align:center;letter-spacing:0px">actualizado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($invoices as $key => $value)
        @php
            $dat=App\Archivo::where('documento_id',$value->id)->get();
        @endphp
        <tr style="border-bottom: none !important;">
          <td style="border: 1px solid black;">
            <span style="font-weight: bold">{{$value->titulo}}</span>
          </td>
          <td style="padding:5px 8px 5px 8px;border:1px solid black;font-size:11px;text-align:left;">
            <span style="text-align:left;">{{$value->Username->name}}</span><br>
          </td>
          <td style="padding:5px 8px 5px 8px;border: 1px solid black;font-size:11px;text-align:left;">
            <span style="text-align:left;">{{$value->categoria->nombre}}</span><br>
          </td>
          <td style="border: 1px solid black;font-size:11px;">
            <span>{{$value->estado}}</span>
          </td>
          <td style="border: 1px solid black;font-size:11px;">
            <span>{{count($dat)}}</span>
          </td>
          <td style="border: 1px solid black;font-size:11px;">
            <span>{{$value->created_at}}</span>
          </td>
          <td style="border: 1px solid black;font-size:11px;">
            <span>{{$value->updated_at}}</span>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>