
$(document).on("click", "#btningresar", function (){
    var usu_alias = $('#alias').val();
    var usu_pass = $('#clave').val();

    if(usu_alias == '' || usu_pass == ''){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Ingrese todos los campos',
            showConfirmButton: false,
            timer:1500
        });  
    }else {
        $.post("../../controller/usuariocontrolador.php?op=ingresar",{alias : usu_alias, clave : usu_pass},function (data) {
            console.log(data);
            if(data == 0){
                /*Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Las credenciales no coinciden',
                    showConfirmButton: false,
                    timer:1500
                });*/
                Swal.fire({
                    title: 'Las credenciales no coinciden',
                    text: '',
                    icon: 'error',
                    showConfirmButton: false,
                    timer:1500
                  })

            }else{
                //window.open('http://localhost/SISPEN_CRUD/view/Inicio/','_self');
                window.location.href="../Post/index.php";
                //console.log("Ingreso");
            }
        
        });
    }

});

