<?php
class Opcion {
  private $titulo;

  private $items = array();

  public function __construct($tit)
  {
    $this->titulo=$tit;
     
  }
   public function insertarItems($itm)
  {
    $this->items[]=$itm;
  }
  
  public function graficarOpcion()
  {
      echo '<li class="active"> 
          <a href="#">'.$this->titulo.'</a>';
      if(isset($this->items)){
          echo "<ul>";
			for($f=0;$f<count($this->items);$f++)
                            {
                              $this->items[$f]->graficarItems();
                              
                            }
          echo '<br>';                  
	  echo "</ul>";
      }
      echo'</li>';
  }

}

?>
