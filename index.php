<?php 
include 'classLogin.php';
include 'cabecera.php';
include 'foot.php';
$login = new Login();
if (isset($_POST['Login']) and $_POST['Login']=='si')
{
        $login->setUsuario($_POST['nom']); 
	$login->setContraseña($_POST['pass']);	
        $login->nueva_sesion();
}else{

}
?>

<div id="cuerpo"> 
<?php
    if(isset($_GET['usuario']))
    {
     switch($_GET['usuario'])
           {
                case 'no_existe':						
                    
                      print '<h5 style="color: #ed1c24;">Los datos introducidos no existen</h5>';
           }
    }
?>			
    <div class="container">
	<section id="content">    
            <form name="form" action="" method="post">
                <h1>Ingresar al Sistema</h1>                         
                    <div>
			<input type="text" placeholder="Usuario" required="" id="username" name="nom"/>
	            </div>
                    <div>
                        <input type="hidden" name="Login" value="si">
                    </div>
                    <div>
			<input type="password" placeholder="Contraseña" required="" id="password" name="pass"/>
                    </div>
                    <div>
			<input type="submit" value="Iniciar Sesión" />				
		    </div>
                    <br></br>
                    <br></br>
          </form>
        </section>
    </div>
</div>