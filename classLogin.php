<?php
session_start();
include 'classConexion.php';

class Login {
    
    var $usuario;     
    var $contraseña;

    function Login() // declara el constructor
    {

    }       

    // metodos que setean los valores

    function setUsuario($val)
     {  $this->usuario=$val;}
    function setContraseña($val)
     {  $this->contraseña=$val;}
    
     // inicio sesión
     
     public function nueva_sesion()
     {         echo $this->usuario;
         $obj_Usuario=new Conexion();
         $qverifica="select * from usuarios "
                    ."where usuarios.username='$this->usuario' and usuarios.password='$this->contraseña'";
         $obj_Usuario->consulta($qverifica);
         echo $qverifica;
         if($obj_Usuario->num_rows()==0)
            {                      
               header("Location:Index.php?usuario=no_existe");
            }
        else
            {
                if($row= $obj_Usuario->fetch_array($qverifica))
				{                                       
					$_SESSION['nick'] = $row['username'];
                                        $_SESSION['habil'] = $row['permiso'];
                                        $_SESSION['nombre'] = $row['nombre'];
                                        $_SESSION['apellido'] = $row['apellido'];
                                        $_SESSION['id_user'] = $row['id_usuario'];
					header("Location:principal.php"); 
				}
                
            }
     }
}
