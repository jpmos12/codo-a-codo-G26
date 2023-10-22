function recibir() {
    var name = document.getElementById("txtName").value;
    var lastName = document.getElementById("txtLastName").value;
    var email = document.getElementById("txtEmail").value;
    var area = document.getElementById("txtArea").value;
    
    document.getElementById("btnSend").style.display = 'none';
    document.getElementById("cargando").style.display = 'block';
    
    $.post('http://localhost/ProyectoPython/Process/PHP/Business/sendEmailBusiness.php', {
        accion: 'sendEmail',
        name: name,
        lastName: lastName,
        email: email,
        area: area
    }, function () {}).done(function (response) {
        var respuesta = JSON.parse(response);
        if (parseInt(respuesta["Status"]) === 200) {
            setTimeout(function () {
                document.getElementById("btnSend").style.display = 'block';
                document.getElementById("cargando").style.display = 'none';
                swal("Alerta", "Enviado Correctamente", "success");
                setInterval("location.reload()",1000);
            }, 1000);
        } else {
            setTimeout(function () {
                document.getElementById("btnSend").style.display = 'block';
                document.getElementById("cargando").style.display = 'none';
                swal("Alerta", "Ha sucedido un error, intente nuevamente", "info");
            }, 1000);
        }
    });
}