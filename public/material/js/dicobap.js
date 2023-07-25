var token = $('input[name=_token]').val();
$("#add_sucursal").click(function() {
    $.ajax({
        url: URL_BASE + '/addsuscur',
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

function savedatasucu(e) {
    var data = new FormData(document.getElementById("FormAddSucu"), [0]);
    data.append('_token', token);
    $.ajax({
        type: 'POST',
        headers: { 'X-CSRF_TOKEN': token },
        url: URL_BASE + '/savesucu',
        dataType: "json",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data == 'se requiere una imagen') {
                Swal.fire({
                    icon: 'error',
                    title: data,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
            } else {
                if (data == 'La Sucursal fue almacenada exitosamente') {
                    Swal.fire({
                        icon: 'error',
                        title: 'se agrego datos ala base de datos ',
                        text: data,
                    })
                    document.getElementById("savedatasucu").disabled = true;
                } else {

                }
            }
        }
    })
}
$("#addmarca").click(function() {
    $.ajax({
        url: URL_BASE + '/addmarca',
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

function savedatacantidad(e) {
    var data = new FormData(document.getElementById("FormAddCantidad"), [0]);
    data.append('_token', token);
    $.ajax({
        type: 'POST',
        headers: { 'X-CSRF_TOKEN': token },
        url: URL_BASE + '/guardar',
        dataType: "json",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            document.getElementById("aquielcontenido").innerHTML = '';
            if (data.status === 200) {
                Swal.fire({
                    title: 'fabuloso',
                    text: data.msn,
                    imageUrl: 'https://static.vecteezy.com/system/resources/previews/002/779/558/non_2x/online-learning-concept-teacher-at-chalkboard-video-lesson-distance-study-at-school-illustration-flat-style-vector.jpg',
                    imageWidth: 400,
                    imageHeight: 300,
                    imageAlt: 'Custom image',
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data.msn,
                })
            }
            document.getElementById("aquielcontenido").innerHTML = data.datos
        }
    })
}