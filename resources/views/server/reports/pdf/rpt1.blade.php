<head>
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      html{
      font-family: Arial;
    }
    .J_XjMod {
      place-items: center;
      position: relative;
    }
    .J_XjMod::before {
      content: "";
      width: 460px;
      height: 530px;
      opacity: .15;
      position: absolute;
      margin-top: 5%;
      margin-left: 20%;
      background-size: cover;
      background-repeat: no-repeat;
    }
    .J_XjMod-inside {
      position: relative;
    }
  
    .grid-container {
      grid-template-columns: auto auto auto;
      grid-gap: 1px;
    }
  
    .grid-container > div {
      background-color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      margin-left: -35px;
    }
  
    .J_iTmVllP {
      grid-column-start: 4;
      grid-column-end: 1;
    }
    .J_iTmPls
    {
      grid-column-start: 2;
      grid-column-end: 4;
      text-align: right;
    }
    .J_iTPlXs
    {
      grid-column-start: 4;
      grid-column-end: 1;
      text-align: center;
    }
    .J_iTPlFoC
    {
      grid-column-start: 4;
      grid-column-end: 1;
    }
    .J_iTPlFoC > div {
      text-align: left;
    }
    .J_iTPlFiVs
    {
      grid-column-start: 4;
      grid-column-end: 1;
    }
    .column {
      float: left;
      width: 50%;
      text-align: center;
      font-size: 25px;
    }
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    .column2 {
      float: right;
      width: 50%;
      font-size: 25px;
      margin-bottom:-20px;
      height: 70px;
    }
    .J_iTNroS{
      font-size: 13px;
      position: relative;
      right: -40px;
      top:-10px;
    }
    .J_iTNQSty{
      position: relative;
      right: -50px;
    }
    #J_iTFoTrs {
      position: fixed;
      bottom: 0px;
      left: 0px;
      right: 0px;
      margin-bottom: 0px;
      text-align:center;
    }
    </style>
  </head>
  <body style="background-image:url({{ asset('material') }}/img/agro.jpg);opacity:0.15;background-position: 2em 1.5cm;position: relative; background-size: 560px 650px;background-repeat: no-repeat;background-position:50% 56%;background-attachment:fixed;">
    <div class="row">
      <div class="grid-container" style="">
        <div class="J_iTmVllP">
            <table width="100%" height="150px" class="table_present" >
                <tr>
                  <td width="20%" style="border:none">
                    <table style="float:left;">
                      <tr>
                        <td style="text-align: center; border:none">
                          <img src="{{ asset('material') }}/img/batery.png" alt="" width="100px" height="105px">
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td width="40%" class="text-center" style="margin-top: 10px;border:none">
                    <table width="100%">
                      <tr>
                        <td style="text-align: center; font-size:15px; border:none">UNIVERSIDAD AUTÓNOMA "TOMÁS FRÍAS"</td>
                      </tr>
                      <tr>
                        <td style="text-align: center; font-size:12px; border:none">Carrera De Ingenieria Agronomica</td>
                      </tr>
                      <tr>
                        <td style="text-align: center; font-size:11px; border:none">Potosí - Bolivia</td>
                      </tr>
                      <tr>
                        <td></td>
                      </tr>
                    </table>
                  </td>
                  <td width="20%" style="; border:none">
                    <table style="float:right; ">
                      <tr>
                        <td style="text-align: center; border:none">
                          <img src="{{ asset('material') }}/img/logo.png" alt="" width="70px" height="90px">
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
        </div>
        <div style="margin-left:10px;margin-top:+50px">
          <table style="text-align:center;margin:0 auto">
            <thead>
            <tr  style="width:100px">
              <td style="width:200px" style="background:rgba(255, 255, 255, 0);">
                <h4 style="letter-spacing:3px;margin-top:10px;font-size:16px">Reporte De Documentos</h4>
              </td>
            </tr>
            <tr  style="width:100px">
                <td style="width:200px" style="background:rgba(255, 255, 255, 0);">
                  <h4 style="letter-spacing:3px;margin-top:10px;font-size:16px">Correspondiente al mes de {{$fi}} al  {{$ff}}</h4>
                </td>
              </tr>
          </thead>
          </table>
        </div>
        <div class="J_iTPlFiVs J_XjMod" >
          <div class="container">
            <div class="J_XjMod-inside" style="padding:0 10px 0 10px;margin-top:-18px;">
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
                  @foreach($data as $key => $value)
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
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <script type="text/php">
      if (isset($pdf)) {
        $text = " {PAGE_NUM} / {PAGE_COUNT}";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        $x = ($pdf->get_width() - $width) / 1;
        $y = $pdf->get_height() - 22;
        $pdf->page_text($x, $y, $text, $font, $size, array(.16, .16, .16));
      }
    </script>
  </body>
  </html>
  