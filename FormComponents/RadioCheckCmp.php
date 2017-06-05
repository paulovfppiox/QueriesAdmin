<?php
require_once('FormComponent.php');

class RadioCheckCmp extends FormComponent  					{

	private $orientation; //= "VERTICAL";
	private $numOps;

	function __construct()                    	{

		parent::__construct("Radio! or Check!");

		$a = func_get_args();   // Pega os args desta função
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct2( $name, $id )  					{
 				$this->name = $name;
 				$this->id = $id;
    }

    /** Construtor com um parâmetro */
    function __construct3( $name, $id, $params ) 		{
 				$this->name = $name;
 				$this->id = $id;

  			if ( gettype( $params ) != "array")
						 echo "Error in param!!!";
				$this->params = $params;
				$this->numOps = sizeof($params);
    }

		/** Construtor com um parâmetro */
    function __construct4( $name, $t, $id, $params ) {
 				$this->name = $name;
 				$this->id = $id;
				$this->type = $t;

  			if ( gettype( $params ) != "array")
						 echo "Error in param!!!";
				$this->params = $params;
				$this->numOps = sizeof($params);
    }
		function setOrientation( $or )						{
				$this->orientation = $or;
		}

		protected function cast( $var )						{
			//return (RadioCheckCmp) $var;
			return null;
		}

		function echoComponent() 															{
				parent::echoComponent();
		}

	public function mntCompStr()
	{
 		$mtx = $this->params;
		$types = array("checkbox", "radio");
		$delimiter = "";

		if ( $this->orientation == "VERTICAL" )		  		 {
    		 $delimiter = "<br>";
		}
		$numOps = count($mtx);	// N° total de opções do elem select

		$tId = -1;

		if ( $this->type == $types[0] )
				$tId = 0;
		else
				$tId = 1;

    for ( $i = 0; $i < $numOps; $i++ )
				  $this->compStr .= "<input type=". $types[$tId] . " name=" . $this->name . " value='". $mtx[$i][0] ."'>" . $mtx[$i][1] . $delimiter; //"  . "</option>"
	}

}
?>
