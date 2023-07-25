var token = $('input[name=_token]').val();
$("#add_category").click(function() {
    $.ajax({
        url: URL_BASE + '/addcategoryform',
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
});
$("#adduser").click(function() {
    $.ajax({
        url: URL_BASE + '/adduserform',
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
});
function save_category(e) {
    var url = URL_BASE + '/categoriasave';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var nombre = document.getElementById("nombre_marca").value;
    var descripcion = document.getElementById("descripcion").value;
    data = {
        'nombre': nombre,
        'descripcion': descripcion,
        '_token': token
    }
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then(function(data) {
            console.log(data);
            if (data.status === 200) {
                Swal.fire({
                    icon: 'error',
                    title: data,
                    type: "success"
                }).then(function(){ 
                    location.reload();
                    })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data,
                    type: "success"
                }).then(function(){ 
                    location.reload();
                    })
            }
        })

}


function validaVacio(valor) {
    valor = valor == undefined ? "" : valor;
    valor = valor.replace("&nbsp;", "");
    
    if (!valor || 0 === valor.trim().length) {
        return true;
        }
    else {
        return false;
        }
}
function save_user(e) {
    var url = URL_BASE + '/saveuser';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var nombre = document.getElementById("name_user").value;
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( validaVacio(nombre) ){                                                            //COMPRUEBA MAIL
        var titleerror="Error: el campo nombre es requerido"
        Swal.fire({
            icon: 'error',
            title: titleerror,
            type: "error"
        });
        return false;
    }
    var correo = document.getElementById("correo").value;
    var lastname = document.getElementById("lastname_user").value;
    var secondname = document.getElementById("secondname_user").value;
    if ( validaVacio(lastname) && validaVacio(secondname)){                                                            //COMPRUEBA MAIL
        var titleerrored="tiene que tener por lo menos un apellido"
        Swal.fire({
            icon: 'error',
            title: titleerrored,
            type: "error"
        });
        return false;
    }
    var ci = document.getElementById("ci_user").value;
    var select = document.getElementById("rol").value;
    data = {
        'nombre': nombre,
        'descripcion': correo,
        'lastname':lastname,
        'secondname':secondname,
        'ci':ci,
        'rol': select,
        '_token': token
    }
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then(function(data) {
            if(data==='usuario almacenado correctammente')
            {
                Swal.fire({
                    icon: 'error',
                    title: data,
                    type: "success"
                }).then(function(){ 
                    location.reload();
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: data,
                    type: "error"
                });
            }
        })
}
function datadoc(e){
    var docu = e.getAttribute('data-doc');
    $.ajax({
        url: URL_BASE + '/viewdataDoc/'+docu,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}
function datacompartir(e){
    var docu = e.getAttribute('data-doca');
    $.ajax({
        url: URL_BASE + '/shareddoc/'+docu,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}
function datadocinfo(e){
    var docu = e.getAttribute('data-info');
    $.ajax({
        url: URL_BASE + '/infodoc/'+docu,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}
function datasegm(e){
    var docu = e.getAttribute('data-seg');
    $.ajax({
        url: URL_BASE + '/addseg/'+docu,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}
function save_seguimiento(e) {
    var url = URL_BASE + '/addseguimiento';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var id_doc = document.getElementById("val_doc").value;
    var ddonde = document.getElementById("de_donde").value;
    var adonde = document.getElementById("a_donde").value;
    data = {
        'iddoc': id_doc,
        'ddonde': ddonde,
        'adonde': adonde,
        '_token': token
    }
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    }).then((response) => response.json()).then(function(data) {
        window.location.reload();
    })
}
function datashowseg(e){
    var docu = e.getAttribute('data-showseg');
    $.ajax({
        url: URL_BASE + '/showseg/'+docu,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}
function dataeditcat(e){
    var idcam = e.getAttribute('data-catdit');
    $.ajax({
        url: URL_BASE + '/editcat/'+idcam,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}

function edit_category(e) {
    var url = URL_BASE + '/categoriaedit';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var nombre = document.getElementById("nombre_marca").value;
    var descripcion = document.getElementById("descripcion").value;
    var id_cat = document.getElementById("id_cat").value;
    
    data = {
        'idcat':id_cat,
        'nombre': nombre,
        'descripcion': descripcion,
        '_token': token
    }
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then(function(data) {
                window.location.reload()
        })

}
function datepadus(e){
    var idus = e.getAttribute('data-usdet');
    $.ajax({
        url: URL_BASE + '/editusr/'+idus,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}
function edit_user_dat(e) {
    var url = URL_BASE + '/edithdatauser';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var nombre = document.getElementById("name_user").value;
    var correo = document.getElementById("correo").value;
    var lastname = document.getElementById("lastname_user").value;
    var secondname = document.getElementById("secondname_user").value;
    var ci = document.getElementById("ci_user").value;
    var userid = document.getElementById("userid").value;
    
    data = {
        'id':userid,
        'nombre': nombre,
        'descripcion': correo,
        'lastname':lastname,
        'secondname':secondname,
        'ci':ci,
        '_token': token
    }
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then(function(data) {
            window.location.reload();
        })
}
function editroldata(e){
    var idus = e.getAttribute('data-usdetrol');
    $.ajax({
        url: URL_BASE + '/userrol/'+idus,
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
}
function editarroldata(e){
    var url = URL_BASE + '/editrolus';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var rol = document.getElementById("rol").value;
    var userid = document.getElementById("userid").value;
    
    data = {
        'id':userid,
        'rol': rol,
        '_token': token
    }
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then(function(data) {
            window.location.reload();
        })
}

function editupdateprofile(e){
    var url = URL_BASE + '/updateprofile';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var password1 = document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;
    var password3 = document.getElementById("password3").value;
    var userid = document.getElementById("userid").value;
    
    data = {
        'id':userid,
        'password1': password1,
        'password2': password2,
        'password3': password3,
        '_token': token
    }
    
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then(function(data) {
            if (data.status === 200) {
                Swal.fire({
                    title: 'fabuloso',
                    text: data.message,
                    imageUrl: 'https://static.vecteezy.com/system/resources/previews/002/779/558/non_2x/online-learning-concept-teacher-at-chalkboard-video-lesson-distance-study-at-school-illustration-flat-style-vector.jpg',
                    imageWidth: 400,
                    imageHeight: 300,
                    imageAlt: 'Custom image',
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data.message,
                })
            }
        })
}

$(document).on('click','#send_form', function(e){
    e.preventDefault();
    $('span.msgerror').html('');
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var data = new FormData($("#form_data")[0]);
    var input=$('#input-pr')[0].files[1];
    console.log(input);
    data.append("_token", token);
    $.ajax({
      url:URL_BASE+'/savefiles',
      type:'POST',
      data:data,
      processData: false,
      contentType: false,
      beforeSend:function(){
        // document.getElementById("statusEnDis").disabled = true;
        // document.getElementById("cancel_mod").disabled = true;
      },
      success:function(data){
           if(data==='revise su archivo, que este seleccionado correctamente'){
                Swal.fire({
                    icon: 'error',
                    title: data,
                })
           }else{
                window.location.replace('documentos');
                Swal.fire({
                    icon: 'error',
                    title: data,
                })
           }
      }
    });
  });

  $(document).on('click','.swal2-confirm',function(e){
    console.log('reload');
  });

  function cancelbtn(){
    location.reload();
  }
  $("#modaldat").click(function() {
    $.ajax({
        url: URL_BASE + '/asistido',
        type: 'GET',
        headers: {
            'X-CSRF_TOKEN': token
        },
        data: {
            '_token': token,
        },
        success: function(data) {
            $(".modalbase-modal-lg").modal("show");
            $('#render').html(data);
        }
    })
});


$(document).on('click','#send_form_as', function(e){
    e.preventDefault();
    $('span.msgerror').html('');
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var data = new FormData($("#form_data")[0]);
    var input=$('#input-pr')[0].files[1];
    console.log(input);
    data.append("_token", token);
    $.ajax({
      url:URL_BASE+'/savefiles',
      type:'POST',
      data:data,
      processData: false,
      contentType: false,
      beforeSend:function(){
        // document.getElementById("statusEnDis").disabled = true;
        // document.getElementById("cancel_mod").disabled = true;
      },
      success:function(data){
           if(data==='revise su archivo, que este seleccionado correctamente'){
                Swal.fire({
                    icon: 'error',
                    title: data,
                })
           }else{
                window.location.replace('bandejaentrada');
                Swal.fire({
                    icon: 'error',
                    title: data,
                })
           }
      }
    });
  });
  

  