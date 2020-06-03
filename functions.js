$(document).ready(function(){
 
    mayuscula(".texto"); 
    
// No copiar, pegar y cortar

    $("input:text").bind('copy', function(e) {
        return false;
    });
    $("input:text").bind('paste', function(e) {
        return false;
    });    
    
    $("input:text").bind('cut', function(e) {
        return false;
    });

// Solo enteros
    $(".entero").keypress(function (e){
     tecla = (document.all) ? e.keyCode : e.which;
    if (tecla===8||tecla===0) return true;   
    patron =/[0-9]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);     
    });

// Solo si y no
    $(".sino").keypress(function (e){
     tecla = (document.all) ? e.keyCode : e.which;
    if (tecla===8||tecla===0) return true;   
    patron =/[1-2]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);     
    });

// Solo Letras

    $(".texto").keypress(function (e){
     tecla = (document.all) ? e.keyCode : e.which;
    if (tecla===8||tecla===0||tecla===32||tecla===37||tecla===39) return true;   
    patron = /[a-zA-Z/ñÑ/áéíóú]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);     
    });

// Opciones 1 a 4

    $(".cuatropciones").keypress(function (e){
     tecla = (document.all) ? e.keyCode : e.which;
    if (tecla===8||tecla===0) return true;   
    patron =/[1-4]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);     
    });



// Pasos en identificación

$("#area").blur(function(){
        if($("#area").val().length  === 4){
           $("#listado").removeAttr('readonly');
           $("#listado").focus();
           $("#listado").selectRange($("#listado").val().length);
        }
        else{
            $('#listado').val("");
            $("#listado").attr('readonly', 'readonly');
            $("#area").focus();
            $("#area").selectRange($("#area").val().length);
        }
        }); 
$("#listado").blur(function(){
        if($("#listado").val().length === 3){
           $("#semana").removeAttr('readonly');
           $("#semana").focus();
           $("#semana").selectRange($("#semana").val().length);
        }
        else{
            $('#semana').val("");
            $("#semana").attr('readonly', 'readonly');
            $("#listado").focus();
            $("#listado").selectRange($("#listado").val().length);
        }
        });  
$("#semana").blur(function(){
        if($("#semana").val().length === 2){
           $("#trimestre").removeAttr('readonly');
           $("#trimestre").focus();
           $("#trimestre").selectRange($("#trimestre").val().length);
        }
        else{
            $('#trimestre').val("");
            $("#trimestre").attr('readonly', 'readonly');
            $("#semana").focus();
            $("#semana").selectRange($("#semana").val().length);
        }
        });      
$("#trimestre").blur(function(){
        if($("#trimestre").val().length === 1){
           $("#año").removeAttr('readonly');
           $("#año").focus();
           $("#año").selectRange($("#año").val().length);
        }
        else{
            $('#año').val("");
            $("#año").attr('readonly', 'readonly');
            $("#trimestre").focus();
            $("#trimestre").selectRange($("#trimestre").val().length);
        }
        });    
$("#año").blur(function(){
        if($("#año").val().length === 4){
           $("#vivienda").removeAttr('readonly');
           $("#vivienda").focus();
           $("#vivienda").selectRange($("#vivienda").val().length);
        }
        else{
            $('#vivienda').val("");
            $("#vivienda").attr('readonly', 'readonly');
            $("#año").focus();
            $("#año").selectRange($("#año").val().length);
        }
        });          
$("#vivienda").blur(function(){
        if($("#vivienda").val().length === 1){
           $("#hogar").removeAttr('readonly');
           $("#hogar").focus();
           $("#hogar").selectRange($("#hogar").val().length);
        }
        else{
            $('#hogar').val("");
            $("#hogar").attr('readonly', 'readonly');
            $("#vivienda").focus();
            $("#vivienda").selectRange($("#vivienda").val().length);
        }
        });          
        
// Hacer los saltos correctos en componente    

    $("#inactivo").blur(function(){
        if($("#inactivo").val()==='2'){
            $("#desocupado").removeAttr('readonly');
            $("#desocupado").val("");
            $("#desocupado").focus();
            $("#desocupado").selectRange($("#desocupado").val().length);
        } 
        else{
             $("#desocupado").attr('readonly','readonly');
             $("#trabajos").attr('readonly','readonly');
             $("#masde35hs").attr('readonly','readonly');
             $("#mashoras").attr('readonly','readonly');
             $("#puedemashoras").attr('readonly','readonly');
             $("#trabajapara").attr('readonly','readonly');
             $("#cobrasueldo").attr('readonly','readonly');
             $("#retiradinero").attr('readonly','readonly');
             $("#empleados").attr('readonly','readonly');
             $("#unicocliente").attr('readonly','readonly');
             $("#descjubilacion").attr('readonly','readonly');
             $("#apjubilacion").attr('readonly','readonly');
             $('#desocupado').val(0);
             $('#trabajos').val(0);
             $('#masde35hs').val(0);
             $('#mashoras').val(0);
             $('#puedemashoras').val(0);
             $("#trabajapara").val(0);
             $("#cobrasueldo").val(0);
             $("#retiradinero").val(0);
             $("#empleados").val(0);
             $("#unicocliente").val(0);
             $('#descjubilacion').val(0);
             $('#apjubilacion').val(0);
             $('#submitcomponente').focus();
        }
        });
    $("#desocupado").change(function(){
        if($("#desocupado").val()==='2'){
            $("#trabajos").removeAttr('readonly');
            $("#trabajos").val("");
            $("#trabajos").focus();
            $("#masde35hs").removeAttr('readonly');
            $("#masde35hs").val("");
            $("#trabajapara").removeAttr('readonly');
            $("#trabajapara").val("");                      
//            $("#descjubilacion").removeAttr('readonly');
//            $("#descjubilacion").val("");
//            $("#apjubilacion").removeAttr('readonly');
//            $("#apjubilacion").val("");
            $("#trabajos").selectRange($("#trabajos").val().length);
        } 
        else{
             $("#trabajos").attr('readonly','readonly');
             $("#masde35hs").attr('readonly','readonly');
             $("#mashoras").attr('readonly','readonly');
             $("#puedemashoras").attr('readonly','readonly');
             $("#trabajapara").attr('readonly','readonly');
             $("#cobrasueldo").attr('readonly','readonly');
             $("#retiradinero").attr('readonly','readonly');
             $("#empleados").attr('readonly','readonly');
             $("#unicocliente").attr('readonly','readonly');
             $("#descjubilacion").attr('readonly','readonly');
             $("#apjubilacion").attr('readonly','readonly');
             $('#trabajos').val(0);
             $('#masde35hs').val(0);
             $('#mashoras').val(0);
             $('#puedemashoras').val(0);
             $("#trabajapara").val(0);
             $("#cobrasueldo").val(0);
             $("#retiradinero").val(0);
             $("#empleados").val(0);
             $("#unicocliente").val(0);
             $('#descjubilacion').val(0);
             $('#apjubilacion').val(0);
             $('#submitcomponente').focus();
        }
        });
    $("#masde35hs").change(function(){
        if($("#masde35hs").val()==='2'){
            $("#mashoras").removeAttr('readonly');
            $("#mashoras").val("");
            $("#mashoras").focus();
            $("#mashoras").selectRange($("#mashoras").val().length);
        } 
        else{
             $("#mashoras").attr('readonly','readonly');
             $("#puedemashoras").attr('readonly','readonly');
             $("#mashoras").val(0);
             $("#puedemashoras").val(0);
             $("#trabajapara").focus();
             $("#trabajapara").selectRange($("#trabajapara").val().length);

        }
        });  
    $("#mashoras").change(function(){
        if($("#mashoras").val()==='1'){
            $("#puedemashoras").removeAttr('readonly');
            $("#puedemashoras").val("");
            $("#puedemashoras").focus();
            $("#puedemashoras").selectRange($("#puedemashoras").val().length);
        } 
        else{
             $("#puedemashoras").attr('readonly','readonly');
             $("#puedemashoras").val(0);
             $("#trabajapara").focus();
             $("#trabajapara").selectRange($("#trabajapara").val().length);

        }
        });   
    
    $("#trabajapara").change(function(){
        if($("#trabajapara").val()==='1'){
            $("#cobrasueldo").attr('readonly','readonly');
            $("#retiradinero").attr('readonly','readonly');
            $("#empleados").removeAttr('readonly'); 
            $("#cobrasueldo").val(0);
            $("#retiradinero").val(0);
            $("#empleados").val("");            
            $("#empleados").focus();
            $("#empleados").selectRange($("#empleados").val().length);
        } 
        else{
             if($("#trabajapara").val()==='2'){
                    $("#cobrasueldo").removeAttr('readonly');
                    $("#cobrasueldo").val("");
                    $("#cobrasueldo").focus();
                    $("#cobrasueldo").selectRange($("#empleados").val().length);
             }
             else{
                    $("#cobrasueldo").attr('readonly','readonly');
                    $("#retiradinero").attr('readonly','readonly');
                    $("#empleados").attr('readonly','readonly');
                    $("#unicocliente").attr('readonly','readonly');
                    $("#descjubilacion").removeAttr('readonly');            
                    $("#puedemashoras").val(0);
                    $("#cobrasueldo").val(0);
                    $("#retiradinero").val(0);
                    $("#empleados").val(0);
                    $("#unicocliente").val(0);
                    $("#descjubilacion").val("");
                    $("#descjubilacion").focus();
                    $("#descjubilacion").selectRange($("#descjubilacion").val().length);                   
             }
         }
        });
    $("#cobrasueldo").change(function(){
        if($("#cobrasueldo").val()==='1'){
            $("#retiradinero").attr('readonly','readonly');
            $("#empleados").attr('readonly','readonly');
            $("#unicocliente").attr('readonly','readonly');          
            $("#descjubilacion").removeAttr('readonly');
            $("#retiradinero").val(0);
            $("#empleados").val(0);
            $("#unicocliente").val(0);
            $("#descjubilacion").val("");
            $("#descjubilacion").focus();
            $("#descjubilacion").selectRange($("#descjubilacion").val().length);
        } 
        else{
            $("#retiradinero").removeAttr('readonly');
            $("#retiradinero").val("");
            $("#retiradinero").focus();
            $("#retiradinero").selectRange($("#retiradinero").val().length);

        }
        });
    $("#retiradinero").change(function(){
        if($("#retiradinero").val()==='1'){           
            $("#empleados").removeAttr('readonly');            
            $("#empleados").val("");          
            $("#empleados").focus();
            $("#empleados").selectRange($("#empleados").val().length);
        } 
        else{
            $("#empleados").attr('readonly','readonly');
            $("#unicocliente").attr('readonly','readonly');
            $("#descjubilacion").attr('readonly','readonly');
            $("#apjubilacion").attr('readonly','readonly');
            $("#empleados").val(0);
            $("#unicocliente").val(0);
            $('#descjubilacion').val(0);
            $('#apjubilacion').val(0);
            $('#submitcomponente').focus();

        }
        });
    $("#empleados").change(function(){
        if($("#empleados").val()==='1'){           
             $("#unicocliente").attr('readonly','readonly');
             $("#descjubilacion").attr('readonly','readonly');
             $("#apjubilacion").attr('readonly','readonly');            
             $("#unicocliente").val(0);
             $('#descjubilacion').val(0);
             $('#apjubilacion').val(0);
             $('#submitcomponente').focus();
        } 
        else{
             $("#unicocliente").removeAttr('readonly');            
             $("#unicocliente").val("");          
             $("#unicocliente").focus();
             $("#unicocliente").selectRange($("#unicocliente").val().length);

        }
        });
    $("#unicocliente").change(function(){
        if($("#unicocliente").val()==='1'){           
            $("#descjubilacion").removeAttr('readonly');
            $("#descjubilacion").val("");
            $("#descjubilacion").focus();
            $("#descjubilacion").selectRange($("#descjubilacion").val().length);
        } 
        else{
            $("#descjubilacion").attr('readonly','readonly');
            $("#apjubilacion").attr('readonly','readonly');          
            $('#descjubilacion').val(0);
            $('#apjubilacion').val(0);
            $('#submitcomponente').focus();

        }
        });  
    
        
        
        
        
        /// aca falta cobrasueldo, retiradinero, empleados y unicocliente
 
    
    
    
    
    
    
    $("#descjubilacion").change(function(){
        if($("#descjubilacion").val()==='2'){
            $("#apjubilacion").removeAttr('readonly');
            $("#apjubilacion").val("");
            $("#apjubilacion").focus();
            $("#apjubilacion").selectRange($("#apjubilacion").val().length);
        } 
        else{
             $("#apjubilacion").attr('readonly','readonly');
             $("#apjubilacion").val(0);
             $("#submitcomponente").focus();
            }
        });    
        
// Valido campos del componente llenos correctamente

    $('#submitcomponente').click(function(){    
    
    if($('#nrocomponente').val().length < 1) {    
      alert("El campo Nº de comoponente es obligatorio");
      $("#nrocomponente").focus();
        return false;
    }
    
    if($('#edad').val().length < 1) {    
      alert("El campo Edad es obligatorio");
      $("#edad").focus();
        return false;
    }
    
    if($('#inactivo').val().length < 1) {    
      alert("El campo Inactivo es obligatorio");
      $("#inactivo").focus();
        return false;
    }
    
    if($('#inactivo').val()=== '2'){
        if($('#desocupado').val().length < 1) {
                                            alert("El campo Desocupado es obligatorio");
                                            $("#desocupado").focus();
                                            return false;
       }                                 
    }
    
    if($('#desocupado').val()=== '2') { 
       if($('#trabajos').val().length < 1) {
                                           alert("El campo Trabajos es obligatorio");
                                            $("#trabajos").focus();
                                            return false;
                                        } 
       if($('#masde35hs').val().length < 1) {
                                            alert("El campo Más de 35 hs es obligatorio");
                                            $("#masde35hs").focus();
                                            return false;
       }
       if($('#trabajapara').val().length < 1) {
                                            alert("El campo Tipo de Trabajo es obligatorio");
                                            $("#trabajapara").focus();
                                            return false;
       }   
       if($('#cobrasueldo').val().length < 1) {
                                            alert("El campo Cobra Sueldo es obligatorio");
                                            $("#cobrasueldo").focus();
                                            return false;
       }   
       if($('#retiradinero').val().length < 1) {
                                            alert("El campo Retira Dinero es obligatorio");
                                            $("#retiradinero").focus();
                                            return false;
       }   
       if($('#empleados').val().length < 1) {
                                            alert("El campo Empleados es obligatorio");
                                            $("#empleados").focus();
                                            return false;
       }   
       if($('#unicocliente').val().length < 1) {
                                            alert("El campo Cliente es obligatorio");
                                            $("#unicocliente").focus();
                                            return false;
       }   
       if($('#descjubilacion').val().length < 1) {
                                            alert("El campo Descuentos Jubilación es obligatorio");
                                            $("#descjubilacion").focus();
                                            return false;
       }  
       if($('#apjubilacion').val().length < 1) {
                                            alert("El campo Aportes Jubilación es obligatorio");
                                            $("#apjubilacion").focus();
                                            return false;
       }                                 
    }
    
    if($('#masde35hs').val()=== '2'){
        if($('#mashoras').val().length < 1) {
                                            alert("El campo Más Horas es obligatorio");
                                            $("#mashoras").focus();
                                            return false;
       }                                 
       if($('#puedemashoras').val().length < 1) {
                                            alert("El campo Puede Más Horas es obligatorio");
                                            $("#puedemashoras").focus();
                                            return false;
       }                                 
    }
});  

// Valido campos de la identificación llenos correctamente    

    $('#submitident').click(function(){    
    if($('#area').val().length < 1) {    
      alert("El campo Código de área es obligatorio");
      $("#area").focus();
        return false;
    }
    
    if($('#listado').val().length < 1) {    
      alert("El campo Nº Listado es obligatorio");
      $("#listado").focus();
        return false;
    }
    
    if($('#semana').val().length < 1) {    
      alert("El campo Semana es obligatorio");
      $("#semana").focus();
        return false;
    }
    if($('#trimestre').val().length < 1) {    
      alert("El campo Trimestre es obligatorio");
      $("#trimestre").focus();
        return false;
    }
    
    if($('#año').val().length < 1) {    
      alert("El campo Año es obligatorio");
      $("#año").focus();
        return false;
    }
    
    if($('#vivienda').val().length < 1) {    
      alert("El campo Vivienda es obligatorio");
      $("#vivienda").focus();
        return false;
    }
    
    if($('#hogar').val().length < 1) {    
      alert("El campo Hogar es obligatorio");
      $("#hogar").focus();
        return false;
    }
       
  });
});

// Enter como Tab

$('input').live("keydown", function(e) {
                    if (e.keyCode === 13 ){
                            var inputs = $(this).parents("html").eq(0).find("input");
                            var idx = inputs.index(this);
                           
                                inputs[idx + 1].focus();

                return false;
                    }
            });


function mayuscula(campo){
                $(campo).keypress(function() {
                               $(this).val($(this).val().toUpperCase());
                });
}

$.fn.selectRange = function(start, end) {
    if(!end) end = start;
    return this.each(function() {
        if (this.setSelectionRange) {
            this.focus();
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};

 $(document).ready(function() {
                    $.ajax({
                            type: "POST",
                            url: "getSemanas.php",
                            success: function(response)
                            {
                                $('.selector-semanas select').html(response).fadeIn();
                            }
                    });
 
                });

 

$(document).ready(function() {
    $(".selector-semanas select").change(function() {
	$(".selector-area select").empty();
	$.getJSON('getAreas.php?semana='+$(".selector-semanas select").val(),function(data){
	    $.each(data, function(id,value){
		$(".selector-area select").append('<option value="'+id+'">'+value+'</option>');
	    });
	});
    });
});
