<?php

class Divisory                  {

  private $classname;
  private $id;
  private $style;
  private $divStr;

  // Construtor
  function __construct()                 {
      $a = func_get_args();   // Pega os args desta função
      $i = func_num_args();   // N° de argumentos desta função
      if (method_exists($this, $f='__construct'.$i) )   {
          call_user_func_array(array($this,$f), $a);
      }
  }
  function __construct3( $classname, $id, $style )  		{
      $this->style = $style;
      $this->classname = $classname;
      $this->id = $id;
  }

  function getClassName()     {
      return $classname;
  }

  function mountDivStr()      {
      $divStr .= "";
  }
  function getDivStr()        {
      return $divStr;
  }


}

?>
