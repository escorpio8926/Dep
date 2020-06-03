$(document).ready(function(){ 

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
$(".bonificacion"). keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[0-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

// Solo enteros
$(".entero").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[0-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});    

// Solo Real
$(".precio").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[0-9/./,]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});
// Solo Real
$(".cantidad").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[0-9/./,]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});    

// Solo si y no
$(".sino").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[0-1-2]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});
$(".sinoga").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});



$(".sino1").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3-4]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

// Hogar y vivienda 6
$(".sino2").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3-4-5-6]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

// Solo si y no
$(".sin").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

$(".sinocin").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3-4-5]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

$(".sinotre").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

$(".sinonueve").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3-4-5-6-7-8-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

$(".lij").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[2-3-4-5-6-7-8-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);
});

$(".io").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3-4-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});

$(".lij2").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[0-1-2-3-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);
});

$(".lij3").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3-4-5-6-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);
});

$(".lij4").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-3-4-5-6]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);
});

$(".oby").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0) return true;   
 patron =/[1-2-9]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);
});

// Solo Letras
$(".tipo_precio").keypress(function (e){
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla===8||tecla===0||tecla===32||tecla===37||tecla===39) return true;   
 patron = /[Pp/Oo/Bb/Rr/Ss/Nn/Ee]/;
 te = String.fromCharCode(tecla);
 return patron.test(te);     
});


// VALIDO INGRESO DE DATOS

$('#submitguardar').click(function(){    

  if($('#dni').val().length > 8   ) {    
    alert("DNI incorrecto debe ingresar 8 digitos como MÁXIMO");
    $('#dni').val(0);
    $("#dni").focus();
    return false;
  }

  if($('#mes').val().length !== 2) {    
    alert("Es OBLIGATORIO ingresar un valor para el MES");
    $("#mes").focus();
    return false;
  }

  if( isNaN( $('#panel').val())) {     
    alert("Es OBLIGATORIO ingresar un valor para el PANEL");
    $("#panel").focus();
    return false;
  }

  if($('#tarea').val() == 0) {     
    alert("Es OBLIGATORIO ingresar un valor para el TAREA");
    $("#tarea").focus();
    return false;
  }

  if( isNaN( $('#id_informante').val())) {    
    alert("Es OBLIGATORIO ingresar un valor para el INFORMANTE");
    $("#id_informante").focus();
    return false;
  }

});        


});  

// Enter como Tab

$('input').live("keydown", function(e) {
  if (e.keyCode === 13 ){
    var inputs = $(this).parents("html").eq(0).find("input").filter(':visible');
    var idx = inputs.index(this);                           
    inputs[idx + 1].focus();
    return false;
  }
});
$('a,select,textarea').live("keydown", function(e) {
  if (e.keyCode === 13 ){
    var inputs = $(this).parents("html").eq(0).find("input,a,select,textarea").filter(':visible');
    var idx = inputs.index(this);                           
    inputs[idx + 1].focus();
    return false;
  }
});

function mayuscula(campo){
  campo.value = campo.value.toUpperCase();
};
function analiza(campo){
  campo1='#tipoprecio'+campo;
  campo2='#bonificacion'+campo;
  campo3='#cantidad'+campo;
  if ($(campo1).val() === 'B'){
    $(campo2).removeAttr('readonly');
    $(campo2).focus();
  }
  else{
    $(campo2).val(0);
    $(campo2).attr('readonly','readonly');
    $(campo3).focus();
  }
};
function analizap(campo){
  campo1='#tipoprecio'+campo;
  campo2='#precio'+campo;
  campo3='#bonificacion'+campo;
  campo4='#cantidad'+campo;
  campo5='#obsvar'+campo;
  if ($(campo1).val() === 'S' || $(campo1).val() === 'N' || $(campo1).val() === 'E' || $(campo1).val() === ''){
    $(campo2).val(0.00);
    $(campo2).attr('readonly','readonly');
    $(campo3).val(0);
    $(campo3).attr('readonly','readonly');
    $(campo4).val(1.00);
    $(campo4).attr('readonly','readonly');                    
    $(campo5).removeAttr('readonly');
    $(campo5).focus();                                 
  }
  else{
    $(campo2).removeAttr('readonly');
    $(campo4).removeAttr('readonly');
    $(campo5).removeAttr('readonly');
    $(campo2).focus();

  }
};
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
// COMBO PANELES
$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "getprograma.php",
        success: function(response)
        {
            $('.selector-progra select').html(response).fadeIn();
        }
    });

});
$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "getderivacion.php",
        success: function(response)
        {
            $('.selector-deriva select').html(response).fadeIn();
        }
    });

});        
// COMBO TAREAS
$(document).ready(function() {
  $(".selector-panel select").change(function() {
    $(".selector-tarea select").empty();
    $(".selector-informante select").empty();
    $.getJSON('getTarea.php?panel='+$(".selector-panel select").val(),function(data){
      $.each(data, function(id,value){
        $(".selector-tarea select").append('<option value="'+id+'">'+value+'</option>');

      });
    });
  });
});              
// COMBO INFORMANTES
$(document).ready(function() {
  $(".selector-tarea select").change(function() {
    $(".selector-informante select").empty();
    $.getJSON('getInformantes.php?panel='+$(".selector-panel select").val()+'&tarea='+$(".selector-tarea select").val(),function(data){
     $(".selector-informante select").append('<option value="a">'+'Seleccionar...'+'</option>'); 
     $.each(data, function(id,value){
      $(".selector-informante select").append('<option value="'+id+'">'+id+' - '+value+'</option>');
    });
   });
  });
});      
// COMBO FORMULARIOS
$(document).ready(function() {
  $(".selector-informante select").change(function() {
    $(".selector-formulario select").empty();
    $.getJSON('getFormularios.php?id_informante='+$(".selector-informante select").val(),function(data){                           
      $.each(data, function(id,value){
        $(".selector-formulario select").append('<option value="'+id+'">'+value+'</option>');
      });
    });
  });
});                

// COMBO VARIEDADES



function setTwoNumberDecimal(el) {
  el.value = parseFloat(el.value).toFixed(3);
};


function avisof(url){
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar este Formulario, todos los precios antes ingresados para el mismo serán eliminados.\n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}

function avisoi(url, id_ficha){
  m=id_ficha;  
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar la Ficha Nro: "+m+" ,todos los datos ingresados para la misma serán eliminados.\n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
function avisof(url, id_ficha){
  m=id_ficha;  
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar las caracteristicas del Hogar y la vivienda de la Ficha Nro: "+m+" ,todos los datos ingresados para la misma serán eliminados.\n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
function avisoi1(url, id_ficha){
  m=id_ficha;  
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar la Ficha Nro: "+m+" ,todos los datos ingresados para la misma serán eliminados.\n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
function avisom(url, id_ficha){
  m=id_ficha;  
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar el componente Nro: "+m+" ,todos los datos ingresados para la misma serán eliminados.\n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
function avisoz(url, id_ficha){
  m=id_ficha;  
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar el componente Nro: "+m+" ,todos los datos ingresados para la misma serán eliminados.\n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
function avisoo(url){
   
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar La Derivación \n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
function avisoo1(url){
   
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se Procedera a Habilitar el Expediente  \n\
    Si desea continuar  [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
function avisocc(url){
   
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Borrar El Programa \n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}

function avisoINF(url, inf){
  i=inf;
  c_nombre = $('#id_informante'+i).val();

  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a dar de baja el Informante: "+c_nombre+".\n\
    Si desea continuar y eliminarlo [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}

function avisoj(url, mes){
  m=mes;  
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a CERRAR esta SALIDA,todos los formularios y precios ingresados seran guardado y no podran ser MODIFICADOS.\n\
    Si desea continuar y cerrar la salida [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}


function avisok(url, mes){
  m=mes;  
  if (!confirm("A T E N C I Ó N ! ! ! \n\n\
    Se procederá a Finalizar esta SALIDA,todos los formularios y precios ingresados seran guardado y solo podran ser MODIFICADOS por el SUPERVISOR.\n\
    Si desea continuar y FINALIZAR la salida [ACEPTAR], caso contrario [CANCELAR]. ")) 
  {
    return false;
  }
  else 
  {
    document.location = url;
    return true;
  }
}
