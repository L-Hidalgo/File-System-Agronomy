<table class="table" style="border-collapse:collapse; table-collapse:collapse;text-align:center;width:105%;" >
    <thead style="background-color: aquamarine">
      <tr style="border: 2px solid black;">
        <th style="width:20%; border: 2px solid black;text-align:center">Correspondencia</th>
        <th style="width:5%; border: 2px solid black;text-align:center;letter-spacing:1px">Usuario</th>
        <th style="width:5%; border: 2px solid black;text-align:center;letter-spacing:0px">extencion</th>
        <th style="width:8%; border: 2px solid black;text-align:center;letter-spacing:0px">creado</th>
        <th style="width:8%; border: 2px solid black;text-align:center;letter-spacing:0px">actualizado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($invoices as $key => $value)
        <tr style="border-bottom: none !important;">
          <td style="border: 1px solid black;">
            <span style="font-weight: bold">{{$value->Tipodocumento->titulo}}</span>
          </td>
          <td style="padding:5px 8px 5px 8px;border:1px solid black;font-size:11px;text-align:left;">
            <span style="text-align:left;">{{$value->Tipodocumento->Username->name}} {{$value->Tipodocumento->Username->lastname}} {{$value->Tipodocumento->Username->secondname}}</span><br>
          </td>
          <td style="padding:5px 8px 5px 8px;border: 1px solid black;font-size:11px;text-align:left;">
            <span style="text-align:left;">*.{{$value->tipo}}</span><br>
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