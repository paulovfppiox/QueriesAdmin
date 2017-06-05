<?php

require_once('FormComponent.php');

class UploadFileCmp extends FormComponent	               			    {

  private $accept;
  private $imgFormats;

 	function __construct()                    	     {
			parent::__construct("Select comp!!");
			$a = func_get_args();   // Pega os args desta função
      $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }
    function __construct1( $name )  		          {
          echo "Aqui!!";
    			$this->name = $name;
    }

    function echoComponent()						          {
        echo "Aqui!";
        parent::echoComponent();
    }

    function mntCompStr() 			                  {
      echo "Aqui! 2";

          $mtx = $this->params;
          $numOps = count( $mtx );	// N° total de opções do elem select

          $formats = "image/jpeg, image/png"; // VER DEPOIS !!!
          $this->compStr .=  "<input type='file' name='". $this->name ."' accept='" . $formats . "'>";
          $this->compStr .=  "<input type='submit' value='upload'>";

    }
    /* $this->compStr = "teste"; echo "Montando string select !!! " . $this->compStr;*/
}

?>
