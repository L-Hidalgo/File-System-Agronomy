<style>
    .Form__content {
  background: #fff;
  border-radius: 2rem;
  padding: 1rem;
  max-width: 100%;
  flex: 1 0 auto;
  box-shadow: 0 10px 20px rgb(0 0 0 / 15%);
  text-align: center
}
.Form_control {
  position: relative;
}
.Form__label {
  cursor: pointer;
  display: flex;
  padding: 2rem;
  border-radius: 2rem;
  border: 3px dashed #8b13fc;
  flex-direction: column;
  align-items: center;
}
.Form__label i {
  font-size: 5rem;
  color: #8b13fc;
  margin-bottom: 0.75rem;
}

.Form__label span {
  color: #ababab;
  text-align: center;
}

.Form__input {
  background-color: #ffffff;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
  opacity: 0;
}

  </style>
  <div class="modal-header" style="background-color: #9c27b0;color:azure">
    <h5 class="modal-title">{{$title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body" >
    <div class="col-sm-12">
        <div class="row">
            @foreach($data as $key => $value)
            @if($value->tipo ==='pdf')
            <div class="col-lg-3 cards">
                <div class="card card-pricing card-raised">
                    <div class="card-body">
                        <center>
                            
                            <i class="material-icons" witch="30%" heigth="30%">picture_as_pdf</i>
                        </center>
                    </div>
                    <div class="card-footer">
                        <div class="aling-rigth">
                            <a onclick="eliminararchivo(this)" data-idfind="{{$value->id}}"><i class="material-icons">close</i></a>
                            <a onclick="viewarchivo(this)" data-idfind="{{$value->id}}"><i class="material-icons">local_printshop</i></a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3 cards">
                <div class="card card-pricing card-raised">
                    <div class="card-body">
                        <center>
                            
                            <i class="material-icons" witch="30%" heigth="30%">insert_photo</i>
                        </center>
                    </div>
                    <div class="card-footer">
                        <div class="aling-rigth">
                            <a onclick="eliminar(this)" data-idfind="{{$value->id}}"><i class="material-icons">close</i></a>
                            <a onclick="viewarchivoimg(this)" data-idfind="{{$value->id}}"><i class="material-icons">local_printshop</i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @endforeach
        </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
<script>
    function viewarchivo(e){
        var docu = e.getAttribute('data-idfind');
        $.ajax({
            url: URL_BASE + '/viewarchivo',
            type: 'GET',
            headers: {
                'X-CSRF_TOKEN': token
            },
            data: {
                '_token': token,
                'documento':docu
            },
            success: function(data) {
                var URL_BASE='{{url("/archivos")}}';
                var txt1=URL_BASE+"/"+data.replace(/['"]+/g, '');
                console.log(txt1);
                imprimir(txt1);
            }
        })
    }
    function imprimir(pdf) {
        var iframe = document.createElement('iframe');
        iframe.style.visibility = "hidden";
        iframe.src = pdf;
        document.body.appendChild(iframe);
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
    }
    function viewarchivoimg(e){
        var docu = e.getAttribute('data-idfind');
        $.ajax({
            url: URL_BASE + '/viewarchivopng',
            type: 'GET',
            headers: {
                'X-CSRF_TOKEN': token
            },
            data: {
                '_token': token,
                'documento':docu
            },
            success: function(data) {
                var URL_BASE='{{url("/archivos")}}';
                var txt1=URL_BASE+"/"+data.replace(/['"]+/g, '');
                console.log(txt1);
                imprimir(txt1);
            }
        })
    }
</script>
