 <?php
 include 'classConexion.php';

 class usuarios
 {
   var $usuario;
   var $password;
   var $rol;
   var $id_user;
   var $nombre;
   var $apellido;
 

	function usuarios($val1='') // declara el constructor, si trae el id de usuarios la busca , si no, trae todas las usuarioss
	{
		if ($val1!='')
		{
			$obj_usuarios=new Conexion();
			$result=$obj_usuarios->consulta("select * from usuarios where id_usuario = '$val1'"); // ejecuta la consulta para traer la usuarios
      $row=  pg_fetch_array($result);
      $this->usuario=$row['username'];   
      $this->password=$row['password'];
      $this->rol=$row['permiso'];
      $this->id_user=$row['id_usuario'];
      $this->nombre=$row['nombre'];
      $this->apellido=$row['apellido'];
   
    }
  }
	function getusuarios($val1,$val2) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las usuarioss
  {
    if($val2>1){
      $obj_usuarios=new Conexion();
      $query = "select * from usuarios order by id_usuario ASC";
                            $result=$obj_usuarios->consulta($query); // ejecuta la consulta para traer las usuarioss                             
                            return $result; // retorna todas las usuarioss
                          }
                          else{
                            $obj_usuarios=new Conexion();
                            $query = "select * from usuarios where id_usuario = '$val1' order by usuario ASC";
                            $result=$obj_usuarios->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                          }
                        }

	// metodos que devuelven valores
                        function getusuario()
                        { return $this->usuario;}    
                        function getpassword()
                        { return $this->password;}
                        function getrol()
                        { return $this->rol;}     
                        function getid_user()
                        { return $this->id_user;}
                        function getnombre()
                        { return $this->nombre;}
                        function getapellido()
                        { return $this->apellido;}                        
                     
                       


	// metodos que setean los valores

                        function setusuario($val)
                        {  $this->usuario=$val;} 

                        function setpassword($val)
                        {  $this->password=$val;} 

                         function setrol($val)
                        {  $this->rol=$val;} 

                        function setid_user($val)
                        {  $this->id_user=$val;}  


                        function setnombre($val)
                        {  $this->nombre=$val;}  

                        function setapellido($val)
                        {  $this->apellido=$val;}       

	function updateusuarios()	// actualiza la identificacion cargada en los atributos
	{
   $obj_usuarios=new Conexion();
   $qverifica="select * from usuarios where id_usuario='$this->id_user'";                    
   $obj_usuarios->consulta($qverifica);
   if($obj_usuarios->num_rows()<>0){       

     $query="update usuarios set password='$this->password', "
     . "apellido='$this->apellido', "
     . "nombre='$this->nombre'"
     . "where id_usuario='$this->id_user'";  
                 
			$obj_usuarios->consulta($query); // ejecuta la consulta para traer la identificacion 
			return '<div id="mensaje"><p/><h4>El usuario número:  '.$this->id_user.'  fue modificado con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADO El usuario NUMERO '.$this->usuario.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
    }
  }
        function updateEstadoSalidaMes($val)	// actualiza el estado de la salida
        {
         $obj_usuarios=new Conexion();                       
         $qverifica="select * from salidas_mes where id_salida_mes='$val'";                      
         $obj_usuarios->consulta($qverifica);
         if($obj_usuarios->num_rows()<>0){                          
           $query="update salidas_mes set estado='FINALIZADA' where id_salida_mes = '$val'";                      
			$obj_usuarios->consulta($query); // ejecuta la consulta para actualizar estado 
      $query1="update precios set consistir=0 where id_salida_mes = '$val'";                    
                        $obj_usuarios->consulta($query1);// ejecuta la consulta para desconsistir
                        date_default_timezone_set('America/Argentina/Tucuman');
                        $fecha = date('Y-m-d');
                        $hora=  date("H:i:s");  
                        $query2="insert into reapertura( fecha, hora, id_salida_mes, id_usuario) values ('$fecha', '$hora', '$val', '$this->id_user')";
                        $obj_usuarios->consulta($query2);
                        $resultado="select salidas_mes.estado, salidas_mes.id_salida_mes, salidas_mes.anio, salidas_mes.mes, salidas_mes.id_salida, salidas.panel, salidas.tarea, informantes.cod_informante, informantes.empresa 
                        from informantes, salidas, salidas_mes
                        where salidas_mes.id_salida = salidas.id_salida 
                        AND salidas.id_informante=informantes.cod_informante
                        AND salidas_mes.id_salida_mes='$val'                                               
                        order by anio , mes , panel, tarea, cod_informante ASC";                        
                        $result=$obj_usuarios->consulta($resultado);
			return $result; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function BuscarSalidaMes()	// inserta la identificacion cargada en los atributos
        {
         $obj_usuarios=new Conexion();                    
         $qverifica="select * from salidas_mes "
         ."where anio='$this->año' and mes='$this->mes' and id_salida='$this->id_salida'";                        
         $result=$obj_usuarios->consulta($qverifica);                       
         if($obj_usuarios->num_rows()<>0){                      
			return $result;// retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: AUN NO FUE CARGADA LA SALIDA, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS</h4></div>'; 
   }
 }	
	function insertusuarios()	// inserta la identificacion cargada en los atributos
	{
        $obj_usuarios=new Conexion();
        

  
   $qverifica1="select * from usuarios where username='$this->usuario'";
   $obj_usuarios->consulta($qverifica1); 
  if($obj_usuarios->num_rows()==0){                
                      
                        
     $query="insert into usuarios (username, password, permiso, nombre, apellido) values ('$this->usuario','$this->password','$this->rol', '$this->nombre', '$this->apellido')";			                       
                        $obj_usuarios->consulta($query); // ejecuta la consulta para traer la identificacion
			return '<div id="mensaje"><p/><h4>El usuario:  '.$this->usuario.'  se guardo con exito</h4></div>'; // retorna todos los registros afectados
    
  
  }  
   else
   {
      return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA El usuario '.$this->usuario.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }	
	function deleteusuarios($val)	// elimina la identificacion
	{

   $obj_usuarios=new Conexion();                        
   $query="delete from usuarios where id_usuario=$val;";             
			$obj_usuarios->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se elimino el usuario con exito</h4></div>'; // retorna todos los registros afectados

   }
        function CerrarSalidaMes($val)	// elimina la identificacion
        {
         $obj_usuarios=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_usuarios->consulta($qverifica);                        
         if($obj_usuarios->num_rows()== 0){
           $query="update salidas_mes set estado = 'CERRADA' where id_salida_mes=$val";                        
			$obj_usuarios->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se cerro:  '.$obj_usuarios->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE CERRAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function FinalizarSalidaMes($val)	// elimina la identificacion
        {
         $obj_usuarios=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_usuarios->consulta($qverifica);                        
         if($obj_usuarios->num_rows()== 0){
           $query="update salidas_mes set estado = 'FINALIZADA' where id_salida_mes=$val";                        
			$obj_usuarios->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se Finalizo:  '.$obj_usuarios->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE FINALIZAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function buscaFormularios($val)	// elimina la identificacion
        {
         $obj_usuarios=new Conexion();
         if ($val!=''){
          $query="select formularios.id_formulario, formularios.nombre from formularios, informantes_formularios
          where informantes_formularios.id_informante= $val and informantes_formularios.id_formulario=formularios.id_formulario;";
			$result=$obj_usuarios->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;    
    }
    else{
      $query="select formularios.id_formulario, formularios.nombre from formularios;";
			$result=$obj_usuarios->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;      
    }

  }	

}
?>