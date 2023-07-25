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
    <h5>
        el usuario {{$data->name}} {{$data->lastname}} {{$data->secondname}} tiene el rol de <br>
        {{$data->tipo}}
    </h5>
    <hr>
    <p>¿desea cambiar de rol?</p>
    <hr>
    <form id="form_user" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" id="userid" value="{{$data->id}}">
        <div class="form-group ">
            <select name="rol" id="rol" class="form-control">
                <option value="admin">administrador</option>
                <option value="director">director</option>
                <option value="secretario">secretario</option>
                <option value="estudiante">estudiante</option>
                <option value="user">user sin privilegios</option>
            </select>
        </div>
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" id="crear" onclick="editarroldata(this)" class="btn btn-primary">editar rol usuario</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
  
  