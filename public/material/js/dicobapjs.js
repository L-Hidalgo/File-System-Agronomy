var URL_BASE = 'http://localhost/dicobap/public';

function m(e) {
    $(".modalbase-modal-lg").modal("show");
    var url = URL_BASE + '/getmodaldato/' + 'marca';
    fetch(url)
        .then((response) => response.json())
        .then((data) => document.getElementById("render").innerHTML = data, );
}

function o(e) {
    $(".modalbase-modal-lg").modal("show");
    var url = URL_BASE + '/getmodaldatorigen/';
    fetch(url)
        .then((response) => response.json())
        .then((data) => document.getElementById("render").innerHTML = data, );
}

function r(e) {
    $(".modalbase-modal-lg").modal("show");
    var url = URL_BASE + '/getmodalproduct/';
    fetch(url)
        .then((response) => response.json())
        .then((data) => document.getElementById("render").innerHTML = data, );
}

function save_marca(e) {
    var url = URL_BASE + '/marcasave';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var marca_id = document.getElementById("nombre_marca").value;
    var sigla_id = document.getElementById("sigla_marca").value;
    data = {
        'marca': marca_id,
        'sigla': sigla_id,
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
                    title: data.msn,
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data.msn,
                })
            }
        })

}

function save_origen(e) {
    var url = URL_BASE + '/storageorigen';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //var formData = new FormData($("#formMarca")[0]);
    //formData.append("_token", token);
    var marca_id = document.getElementById("nombre_origen").value;
    var sigla_id = document.getElementById("sigla_origen").value;
    data = {
        'marca': marca_id,
        'sigla': sigla_id,
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
                    title: data.msn,
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data.msn,
                })
            }
        })
}


function save_product() {
    url = URL_BASE + '/saveproduct';

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var codigo = document.getElementById("codigo_product").value;
    var modelo = document.getElementById("modelo_product").value;
    var cargada = document.getElementById("ltr_product").value;
    var precio_C = document.getElementById("precio_product_compra").value;
    var precio_T = document.getElementById("precio_product_tran").value;
    var precio_V = document.getElementById("precio_product_venta").value;
    var origen = document.getElementById("origen_id").value;
    var marca = document.getElementById("marca_id").value;
    var unidad_med = document.getElementById("unidad_id").value;
    var amp_pro = document.getElementById('Amp_product').value;
    var image = converImageToBase64('file_product').then(
        (image) => fetch(url, {
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
            body: JSON.stringify({
                '_token': token,
                'img': image,
                'modelo': modelo,
                'cargado': cargada,
                'precio_c': precio_C,
                'precio_t': precio_T,
                'precio_v': precio_V,
                'origen': origen,
                'marca': marca,
                'unidad': unidad_med,
                'codigo': codigo,
                'amper': amp_pro
            }),
        })
        .then((response) => response.json())
        .then(function(data) {
            console.log(data);
            if (data.status === 200) {
                Swal.fire({
                    icon: 'error',
                    title: data.msn,
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data.msn,
                })
            }
        })
    );
}


function converImageToBase64(inputId) {
    let image = $('#' + inputId)[0]['files']

    if (image && image[0]) {
        const reader = new FileReader();

        return new Promise(resolve => {
            reader.onload = ev => {
                resolve(ev.target.result)
            }
            reader.readAsDataURL(image[0])
        })
    }
}

function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tabcontent.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.classList.add("active");
}

function getComboA(selectObject) {
    var value = selectObject.value;
    var url = URL_BASE + '/getproductview/' + value;
    document.getElementById("renderdatospreviewproduct").innerHTML = ""
    fetch(url)
        .then((response) => response.json())
        .then((data) => document.getElementById("renderdatospreviewproduct").innerHTML = data.datos, );

}

function addprevent(e) {
    var serie = $("#data_r_serie").val();
    sel = $("#data_r_codigo").val();
    p_id = $("#getComboA").val();
    medida = $("#data_r_sigla").val();
    cant = $("#data_r_cant").val();
    precio = parseFloat($("#data_r_precio").val());
    var add_row = '<tr class="text-center" style="font-size:12px;color:#000">';

    add_row += '<td width="10%">' + sel + '</td>';
    add_row += '<td width="5%">' + cant + ' <input type="hidden" name="cantidads[]" value="' + cant + '"> </td>';
    add_row += '<td width="5%">' + medida + '</td>';
    add_row += '<td width="50%">' + ($("#data_r_modelo").val()) + ' <input type="hidden" name="producto_ids[]" value="' + p_id + '"> <input type="hidden" name="descripcions[]" value="' + ($("#data_r_modelo").val()) + '"> </td>';
    add_row += '<td width="10%">' + precio + '<input type="hidden" name="precios[]" value="' + precio + '"></td>';
    add_row += '<td width="5%">' + serie + '<input type="hidden" name="serie[]" value="' + serie + '"></td>';
    add_row += '<td width="5%">' + (precio * cant) + '</td>';
    add_row += '<td width="10%"><a style="padding:5px;background-color: rgb(194, 35, 35);border-radius:50px;color:#fff" onclick="eliminarfila(this)" class="btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="material-icons">delete</i></a></td>';
    add_row += '</tr>';
    $("#add_table_producto").append(add_row);
    total = parseFloat($("#total_monto").val());
    $("#total_monto").val((total + (precio * cant)).toFixed(2));
    conv = $("#total_monto").val();
    var url = URL_BASE + '/numerosletras/' + conv;
    fetch(url)
        .then((response) => response.json())
        .then((data) => $("#monto_literal").html(data));
    document.getElementById("renderdatospreviewproduct").innerHTML = ""
}

function eliminarfila(e) {
    $(e).parent("td").parent("tr").remove();
    resta = $(e).parent("td").parent("tr")[0].children[6].innerHTML;
    console.log(resta)
    total = parseFloat($("#total_monto").val());
    $("#total_monto").val((total - (resta)).toFixed(2));
    var ktotal = parseFloat($("#total_monto").val()).toFixed(2);
    var url = URL_BASE + '/numerosletras/' + ktotal;
    fetch(url)
        .then((response) => response.json())
        .then((data) => $("#monto_literal").html(data));
}

function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() {
            callback.apply(context, args);
        }, ms || 0);
    };
}


function venderproduct(e) {
    var bool = confirm("Esta seguro de Vender los Productos?\nCobre el dinero antes de precionar aceptar.");
    if (bool) {
        ruta = URL_BASE + "/venderproductos";
        var formData = new FormData($("#form_vender")[0]);
        var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log(_token);
        formData.append("_token", _token);
        $.ajax({
            type: 'POST',
            headers: { 'X-CSRF_TOKEN': _token },
            url: ruta,
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                if (data.status == 200) {

                    $("#add_table_producto").html("");
                    $("#nombre").val('');
                    $("#telefono").val('');
                    $("#ci").val('');
                    $("#total_monto").val('0');
                    $("#cliente_id").val("");

                    Swal.fire({
                        title: 'exito',
                        text: data.msn,
                        imageUrl: 'https://mac-softins.com/images/iconospublic/check.png',
                        imageWidth: 400,
                        imageHeight: 300,
                        imageAlt: 'Custom image',
                    })
                    window.open(URL_BASE + '/imprimirventa/' + data.data.id, '_blank', "Imprimir", "menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes").focus();
                } else {
                    Swal.fire({
                        title: 'error',
                        text: data.msn,
                        imageUrl: 'https://mac-softins.com/images/iconospublic/error.png',
                        imageWidth: 400,
                        imageHeight: 300,
                        imageAlt: 'Custom image',
                    })
                }
            }
        })
    }
}