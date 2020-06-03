<?php
class Menu {
    
  private $opciones=array();
  private $direccion;
  
  public function __construct($dir)
  {
    $this->direccion=$dir;
 
  }
  public function insertarOpciones($op)
  {
    $this->opciones[]=$op;
  }
   
  private function graficarHorizontal()
  {
    for($f=0;$f<count($this->opciones);$f++)
    {
      $this->opciones[$f]->graficarOpcion();
    }
  }
  private function graficarVertical()
  {
    for($f=0;$f<count($this->opciones);$f++)
    {
      $this->opciones[$f]->graficarOpcion();
      echo '<br>';
    }
  }
 
  public function graficarMenu()
  {
      if (strtolower($this->direccion) == "horizontal") {
            $this->graficarHorizontal();
        } else{
        if (strtolower($this->direccion) == "vertical") {
            $this->graficarVertical();
        }
    }
  }
  
}
?>
