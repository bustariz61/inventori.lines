function cargarformulario(arg){
//funcion que carga todos los formularios del sistema

		if(arg==1){ var url = "entregaLineas"; } //nombre de function the controller


		$("#contenido_principal").html($("#cargador_empresa").html());
		   
		    $.get(url,function(resul){
		        $("#contenido_principal").html(resul);

		    })


}

function cargartelefonos(arg){
    //funcion que carga todos los formularios del sistema
    
            if(arg==1){ var url = "entregaTelefonos"; } //nombre de function the controller
    
    
            $("#contenido_principal").html($("#cargador_empresa").html());
               
                $.get(url,function(resul){
                    $("#contenido_principal").html(resul);
    
                })
    
    
    }

    function cargarbam(arg){
        //funcion que carga todos los formularios del sistema
        
                if(arg==1){ var url = "entregaBams"; } //nombre de function the controller
        
        
                $("#contenido_principal").html($("#cargador_empresa").html());
                   
                    $.get(url,function(resul){
                        $("#contenido_principal").html(resul);
        
                    })
        
        
        }

        function cargarPuntoVenta(arg){
            //funcion que carga todos los formularios del sistema
            
                    if(arg==1){ var url = "entregaPuntosVentas"; } //nombre de function the controller
            
            
                    $("#contenido_principal").html($("#cargador_empresa").html());
                       
                        $.get(url,function(resul){
                            $("#contenido_principal").html(resul);
            
                        })
            
            
            }

            function cargarComunicacionInterna(arg){
                //funcion que carga todos los formularios del sistema
                
                        if(arg==1){ var url = "comunicacionInterna"; } //nombre de function the controller
                
                
                        $("#contenido_principal").html($("#cargador_empresa").html());
                           
                            $.get(url,function(resul){
                                $("#contenido_principal").html(resul);
                
                            })
                
                
                }
    


 $(document).on("submit",".form_entrada",function(e){

//funcion para atrapar los formularios y enviar los datos

       e.preventDefault();
        
        $('html, body').animate({scrollTop: '0px'}, 200);
        
        var formu=$(this);
        var quien=$(this).attr("id");
        
        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario"; var divresul="notificacion_resul_fanu"; }
   
        $("#"+divresul+"").html($("#cargador_empresa").html());

              $.ajax({

                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){

                        $("#"+divresul+"").html(resul);
                        $('#'+quien+'').trigger("reset");

                    }

                });


})