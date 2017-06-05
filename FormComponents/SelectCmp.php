<?php
require_once('FormComponent.php');
require_once('IFComponent.php');

class SelectCmp extends FormComponent	        			{

 	function __construct()                    	{

			parent::__construct("Select comp");

			// $this->$labelTitle = "Select Component";
			$a = func_get_args();   // Pega os args desta função
      $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct2( $name, $id )  		{
			$this->labelTitle = "Select Component";
			$this->name = $name;
 			$this->id = $id;
    }

    /** Construtor com um parâmetro */
    function __construct3( $name, $id, $params ) {
				$this->labelTitle = "Select Component";
		 		$this->name = $name;
		 		$this->id = $id;
		 		$this->params = $params;
    }

	function echoComponent1( $params )				     {
     	if ( is_array( $params ) )	{
			     echo 'Params = ' . $params[0] . '<br>';
		}
	}

	function echoComponent()						          {
     parent::echoComponent();
     /* Em tempo de execução, a classe pai é mesclada com a filha.
     Deste modo, não deve-se usar o parent::$var nas filhas.
     */
	}

 	function mntCompStr() 			                  {

	   if ( !is_null( $this->params ) )			{
  			$mtx = $this->params;
  			$numOps = count( $mtx );	// N° total de opções do elem select
  			$this->compStr .=  "<select name=" . $this->name . ">";
  	    for( $i = 0; $i < $numOps; $i++ )		{
  					 $this->compStr .=  "<option value='". $mtx[$i][0] ."'>" . $mtx[$i][1] . "</option>";
  			}
			  $this->compStr .=  "</select>";
    }
	}


  /* $this->compStr = "teste";
  echo "Montando string select !!! " . $this->compStr;*/
}

?>
