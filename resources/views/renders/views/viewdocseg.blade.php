
  <div class="modal-header" style="background-color: #9c27b0;color:azure">
    <h5 class="modal-title">{{$title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body" >
    <div class="col-sm-12">
        <ul class="timeline">
            @foreach($data as $key => $dat)
                <li class="timeline-inverted">
                    <div class="timeline-badge danger">
                        <i class="material-icons">timer</i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <span class="badge badge-pill badge-danger">{{$dat->created_at}}</span>
                        </div>
                        <div class="timeline-body">
                            <p>El Documento paso De {{$dat->de_donde}} a {{$dat->a_donde}}</p>
                        </div>
                    </div>
                </li>
            @endforeach            
        </ul>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>

