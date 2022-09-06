function actualizar_image(){
        
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        if( (typeof file === "object") && (file !== null) )
        {
          $("#cargando_img").text('Cargando...'); 
          var data = new FormData();
          data.append('imagefile',file);
          
          
          $.ajax({
            url: "../ajax/logo/a_logo.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,         // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
              $("#cargando_img").html(data);
              
            }
          }); 
        }
      }

function actualizar_background(){
        
        var inputFileImage = document.getElementById("imagefilea");
        var file = inputFileImage.files[0];
        if( (typeof file === "object") && (file !== null) )
        {
          $("#cargando_background").text('Cargando...'); 
          var data = new FormData();
          data.append('imagefilea',file);
          
          
          $.ajax({
            url: "../ajax/logo/a_background.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,         // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
              $("#cargando_background").html(data);
              
            }
          }); 
        }
      }


function actualizar_historia(){
        
        var inputFileImage = document.getElementById("imagefilee");
        var file = inputFileImage.files[0];
        if( (typeof file === "object") && (file !== null) )
        {
          $("#cargando_historia").text('Cargando...'); 
          var data = new FormData();
          data.append('imagefilee',file);
          
          
          $.ajax({
            url: "../ajax/logo/a_historia.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,         // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
              $("#cargando_historia").html(data);
              
            }
          }); 
        }
      }
