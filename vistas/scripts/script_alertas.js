
//funcion para imprimir alertas generales 
function Alerts(param,e){
    if (param=='sinCambios') {
    Swal.fire({
        html: '<i class="fa fa-question text-dark t-100 bg-warning"></i><br><h1>No se realizaron cambios</h1>',
        footer: ' no se activo <i class="fa  fa-spinner text-dark"></i>',
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true
    });
    }else if (param=='datosAsalvo') {
    Swal.fire({
        html: '<i class="fa fa-wrench text-dark t-100 bg-warning"></i><br><h1>Tus datos estan a salvo</h1>',
        footer: 'No se elimino ningun dato <i class="fa  fa-spinner text-dark"></i>',
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true
    });
    }else if (param=='datosEliminados') {
        Swal.fire({html: '<i class="fas fa-trash t-100  alert-dark text-danger"></i>',
         title: e,
         footer: "Los datos se eliminaron satisfactoriamente",
         showConfirmButton: false,
         timer: 3500,
         timerProgressBar: true
        });
    }else if(param=='desactivados'){
        Swal.fire({
        icon:'error',
        title:e,
        footer:"Se desactivo  satisfactoriamente",
        showConfirmButton:false,
        timer:3500,
        timerProgressBar:true
        });
    }else if(param=='activados'){
        Swal.fire({
         icon: 'success',
         title: e,
         footer: "Se activo  satisfactoriamente",
         showConfirmButton: false,
         timer: 3500,
         timerProgressBar: true
        });
    }else if(param=='guardados'){
        Swal.fire({icon: 'success',
         title: e,
         footer: "Se Guardaron los datos satisfactoriamente",
         showConfirmButton: false,
         timer: 3500,
         timerProgressBar: true
                     })
}



    
}