/****************************************************************
Project:  proyecto_mercado                                      *
Version:  1.0                                                   *
Last change:  01/09/2022 La primera version de este proyecto    *
Assigned to:  https://github.com/barry503                       *
Primary use:  Open Source                                       *
****************************************************************/
//Funcion para cerrar session
function FCerrandOSecion()
{
	

   var Usalir= document.getElementsByName("usuario0salirXD")[0].value;
   var IMg= document.getElementsByName("ImgSalirXD")[0].value;
   
  bootbox.confirm("<div class='text-center'><img width='100px' src='../files/usuarios/"+IMg+"' class='user-image img-circle elevation-2'><br><div>Cerrar la Session de <br>"+Usalir+" ? </div></div>", function(result) {

      if(result)
      {
       $.post("../ajax/a_usuario.php?op=salir", function(e){
         // bootbox.alert(e);
         window.location.href = "../index.php";         
        
       });  
          }
      }

          );

}

