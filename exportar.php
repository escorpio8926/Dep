<?php
include 'cabecera.php';
include 'menu.php';

require('librerias/ExcelLibrary/PHPExcel.php');
?>

<div id="cuerpo">


    <form method="get" action="reportes/generarreportes.php"> 

        <table>
          <tr>
            <th colspan="2  " style="border-bottom-style: solid;"><h3>Exportar Fichas</h3></th>
        </tr>
        <tr><th><p> </p></th></tr>
        <tr>
            <th  style="text-align: right;">
                Desde: <input type="date" class="fecha"  name="fecha_alta1" id="fecha_alta1"  value ="" tabindex="2" autofocus="" required="" onchange="Habilitar()">
                <br> <br> 
            </th>    
            <th  style="text-align: left;">
                Hasta: <input type="date" class="fecha"  name="fecha_alta2" id="fecha_alta2"  value ="" tabindex="2" autofocus="" required="" onchange="Habilitar()">
                <br> <br>
            </th>
        </tr>
        <br><br> <br>
        <tr>

            <th colspan="2" style="text-align: center;">
                <input  type="submit" name="submit" class="fecha" id="sub"  value = "Exportar" tabindex="2" autofocus="" required="" disabled >
            </th>
        </tr>
    </table>
</form>
</div>

<?php

//if(isset($_GET['submit'])){


  //  header("Location: http://localhost/pea/reportes/generarreportes.php");
//}

?>

<script type="text/javascript">
    function Habilitar()
    {   
        var camp1 = document.getElementById("fecha_alta1");
        var camp2 = document.getElementById("fecha_alta2");
        var boton = document.getElementById("sub");

        if(camp1.value == "" || camp2.value =="")
        {
            boton.disabled=true;
        }
        else
        {
            boton.disabled=false;
        }

    }

</script>
</body>


</html>
