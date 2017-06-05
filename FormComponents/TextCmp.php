<?php
require_once('FormComponent.php');


class TextCmp extends FormComponent								{

	private $dimX;
	private $dimY;
	private $placeholderStr; // String com descrição breve
	private $isAutofocus;
	private $isDisabled;
	// private $readonly;
	private $maxLength;
	private $tId;				// Tipo ID

	function __construct()                    	{

		parent::__construct("Text Component !!!! ");

				$a = func_get_args();   // Pega os args desta função
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

		function __construct1( $typeName )  		{
			$this->type = $typeName;
		}

    function __construct2( $name, $id )  		{
	 		$this->name = $name;
	 		$this->tId = $id;
    }

    /** Construtor com um parâmetro */
    function __construct3( $name, $id, $params ) {
	 		$this->name = $name;
	 		$this->tId = $id;
			$this->params = $params;
    }

		protected function cast( $var )			{
			return null;
		}

	  function mntCompStr() 					{

			$placeholderStr = "";

			$prop = "";
			$isAutofocus = true;
			$isDisabled  = false;

			// autofocus='".$isAutofocus."' rows='". $dimX ."' cols='". $dimY ." ' placeholder='". $placeholderStr ."' maxlength ='". $maxLength ."'></textarea>";

			if ( $isAutofocus == true )		{
				$prop .= "autofocus ";
			}
			else if ( $isDisabled == true )	{
				$prop .= "disabled ";
			}

			// echo "mount com o tipo... " . $this->type . "<p>";
			if ($this->type == "textarea")	{
				$this->compStr .= "<textarea ";
				$this->compStr .= " rows='". $dimX ."' cols='". $dimY . " ". $prop ." ' placeholder='". $placeholderStr ."' maxlength ='". $maxLength ."'></textarea>";
				return;
			} else {
				$this->compStr .= "<input type=" . $this->type . " "; // $types[$this->tId];
				$this->compStr .= " name='". $this->name ."' rows='". $dimX ."' cols='". $dimY . " ". $prop ." ' placeholder='". $placeholderStr ."' maxlength ='". $maxLength ."'></". $this->type .">";
			}
	}

	function echoComponent() 							{
				parent::echoComponent();
	}


}
?>
