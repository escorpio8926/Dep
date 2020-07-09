<?php 
class conect{

  private $conect; 
  private $f;
  private $fi;

  public function __construct(){ 
    if(!isset($this->conect)){
      $this->conect = pg_connect("host='ec2-54-75-246-118.eu-west-1.compute.amazonaws.com' port='5432' user='dwktwenkbahucw' password='090fc846af77f51d3f15d3e97847a772643920a5246c6b479b2d454fa4946bdb'  dbname='dejb0pi4d6b3o' options='--client_encoding=UTF8'") or die('No pudo conectarse: ' . pg_last_error());
      
//      mysql_select_db("indicadoreseph",$this->conect) or die('No pudo selccionar db: '. mysql_error());
    }

  }

  public function fi($fi){ 

    $this->f++; 
    $this->fi = pg_exec($this->conect,$fi);
    if(!$this->fi){ 
      echo 'PostgreSql Error: ' . pg_last_error();
      echo $fi;
      exit;
    }
    return $this->fi;
  }

  public function fetch_array(){
   return pg_fetch_array($this->fi);
 }

 public function num_rows(){
   return pg_num_rows($this->fi);
 }

 public function getTotalfis(){
   return $this->f; 
 }

  public function getAffect() { // devuelve las cantidad de filas afectadas

   return pg_affected_rows($this->fi);
   
 }

  public function Close() {		// cierra la conect

    pg_close($this->conect);

  }	

  public function Clean(){ // libera la fi

    pg_free_result($this->fi);    

  }
  
  public function fetchAll() {

    $rows=array();
    if ($this->fi)
    {
     while($row=  pg_fetch_array($this->fi))
     {
      $rows[]=$row;
    }
  }
  return $rows;
}  
}

?>
