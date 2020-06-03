<?php
class Items {
  private $titulo;
  private $enlace;
 
  public function __construct($tit,$enl)
  {
    $this->titulo=$tit;
    $this->enlace=$enl;
   
    
  }
  public function graficarItems()
  {
      echo '<li class="active"> <a href="'.$this->enlace.'" >'.$this->titulo.''
              . '</a></li>';
  }

}

?>