<?php
session_start();
include 'classMenu.php';
include 'classOpcion.php';
include 'classItems.php';
print '<div id="csslogi">';
if(!isset($_SESSION['nick']))
{
    print '<img src="./imagenes/user_negado.png" style="height: 25px;">';
    print '<a style="color: #ed1c24;" href="index.php">Iniciar Sesión</a>';
}
else
{
    print '<img src="./imagenes/user.png" style="height: 25px;">';
    print '<h5>'.$_SESSION['apellido'].' '. $_SESSION['nombre'].'</h5>';
    print '<a href="Logoff.php"> Cerrar sesión </a></p>';       
}
print '</div>';
print '<div id="cssmenu">';
if (isset($_SESSION['habil']))

{
    if ($_SESSION['habil']>1 && $_SESSION['habil']!= 4) 
    {    
        $menu1=new Menu('horizontal');
                //--------------------------------------------------------------

        $opcion1=new Opcion('Ficha');
        $menu1->insertarOpciones($opcion1);

        $item1_1=new Items('Cargar Nueva','./nueva_ficha.php');
        $opcion1->insertarItems($item1_1);

        $item1_2=new Items('Listado de Expedientes','./Listado.php');
        $opcion1->insertarItems($item1_2);

                //--------------------------------------------------------------

        $opcion2=new Opcion('Reportes');
        $menu1->insertarOpciones($opcion2);

        $item1_1=new Items('Exportar Datos','./exportar.php');
        $opcion2->insertarItems($item1_1);
 //--------------------------------------------------------------
        $opcion3=new Opcion('Gestión de usuarios');
        $menu1->insertarOpciones($opcion3);

        $item1_1=new Items('Usuarios','./gestionusuario.php');
        $opcion3->insertarItems($item1_1);
        
//
//                $item2_1=new Items('Informantes Sin Cargar','./RInformantesSinCargar.php');
//                $opcion2->insertarItems($item2_1);
//
//                $item2_2=new Items('Formularios Sin Cargar','./RFormulariosSinCargar.php');
//                $opcion2->insertarItems($item2_2);
//                
//                $item2_3=new Items('Formularios Observados','./RFormulariosObservados.php');
//                $opcion2->insertarItems($item2_3);
//
//                $item2_4=new Items('Variedades Sin Cargar','./RinsumosSinCargar.php');
//                $opcion2->insertarItems($item2_4);
//                
//                $item2_5=new Items('Variedades Observadas','./RinsumosObservados.php');
//                $opcion2->insertarItems($item2_5);

                //--------------------------------------------------------------
                //--------------------------------------------------------------

//                $opcion3=new Opcion('Supervisión');
//                $menu1->insertarOpciones($opcion3);
//
//                $item3_1=new Items('Precios por Variedad','./RPreciosVariedad.php');
//                $opcion3->insertarItems($item3_1);
//
//                $item3_2=new Items('Reabrir Salida','./ReabrirSalida_Mes.php');
//                $opcion3->insertarItems($item3_2);                

//                $item3_2=new Items('Formularios Sin Cargar','./RFormulariosSinCargar.php');
//                $opcion3->insertarItems($item3_2);
//
//                $item3_3=new Items('Variedades Sin Cargar','./RinsumosSinCargar.php');
//                $opcion3->insertarItems($item3_3);

                //--------------------------------------------------------------
                //--------------------------------------------------------------
        if ($_SESSION['habil']>2){


//                $opcion4=new Opcion('Cálculos');
//                $menu1->insertarOpciones($opcion4);
//
//                $item4_1=new Items('Calcular Medias Geométricas','./CalMedia.php');
//                $opcion4->insertarItems($item4_1);
//
//                
//                $opcion5=new Opcion('Coordinación');
//                $menu1->insertarOpciones($opcion5);
//
//                $item5_1=new Items('Informantes','./Informantes.php');
//                $opcion5->insertarItems($item5_1);

//                $opcion4=new Opcion('Consistencias');
//                $menu1->insertarOpciones($opcion4);
//
//                $item4_1=new Items('Consistir Precios','./ConsitePrecio.php');
//                $opcion4->insertarItems($item4_1);
//                                
//                $item3_2=new Items('Formularios Sin Cargar','./RFormulariosSinCargar.php');
//                $opcion3->insertarItems($item3_2);
//
//                $item3_3=new Items('Variedades Sin Cargar','./RinsumosSinCargar.php');
//                $opcion3->insertarItems($item3_3);

                //--------------------------------------------------------------
        }

        $menu1->graficarMenu();
    }
    else 
    {
       if ($_SESSION['habil']==4){

        $menu1=new Menu('horizontal');



                    //--------------------------------------------------------------

        $opcion2=new Opcion('Informes de Carga');
        $menu1->insertarOpciones($opcion2);

        $item1_1=new Items('Visualizar Expedientes','./visualizar_ficha.php');
        $opcion2->insertarItems($item1_1);

        $item1_2=new Items('Listado de Expedientes','./Listados.php');
        $opcion2->insertarItems($item1_2);

        $opcion2=new Opcion('Reportes');
        $menu1->insertarOpciones($opcion2);

        $item1_1=new Items('Exportar Datos','./exportar.php');
        $opcion2->insertarItems($item1_1);
//
//                    $item2_1=new Items('Informantes Sin Cargar','./RInformantesSinCargar.php');
//                    $opcion2->insertarItems($item2_1);
//
//                    $item2_2=new Items('Formularios Sin Cargar','./RFormulariosSinCargar.php');
//                    $opcion2->insertarItems($item2_2);
//
//                    $item2_3=new Items('Formularios Observados','./RFormulariosObservados.php');
//                    $opcion2->insertarItems($item2_3);
//
//                    $item2_4=new Items('Variedades Sin Cargar','./RinsumosSinCargar.php');
//                    $opcion2->insertarItems($item2_4);
//                    
//                    $item2_5=new Items('Variedades Observadas','./RinsumosObservados.php');
//                    $opcion2->insertarItems($item2_5);

                    //--------------------------------------------------------------
                    //--------------------------------------------------------------

//                    $opcion3=new Opcion('Informes de Precios');
//                    $menu1->insertarOpciones($opcion3);
//
//                    $item3_1=new Items('Precios por Variedad','./RPreciosVariedad.php');
//                    $opcion3->insertarItems($item3_1);

                    //-------------------------------------------------------------- 

    }

    else 
    {

        $menu1=new Menu('horizontal');
                //--------------------------------------------------------------

        $opcion1=new Opcion('Cargar');
        $menu1->insertarOpciones($opcion1);

        $item1_1=new Items('Cargar Nueva','./nueva_ficha.php');
        $opcion1->insertarItems($item1_1);

        $item1_2=new Items('Listado de Expedientes','./Listado.php');
        $opcion1->insertarItems($item1_2);

    }
                //--------------------------------------------------------------

    $menu1->graficarMenu();
}
}

?>
<p></p>    
</div>