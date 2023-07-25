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
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">tengo los archivos en mano</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group bmd-form-group is-filled">
                            <a href="{{route('admin.asis.document')}}" class="btn btn-suceess"> ingresar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-icon">
                            <i class="material-icons">camera_alt</i>
                        </div>
                        <h4 class="card-title">Tengo Que tomar foto</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group bmd-form-group is-filled">
                            <a href="{{route('admin.asiscam.document')}}" class="btn btn-suceess"> ingresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
  