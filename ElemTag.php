<?php
require_once('FormComponent.php');

class ListCmp extends FormComponent							{

	private $style = 'circle';

	function __construct()                    		{
		$a = func_get_args();   // Pega os args desta função        
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) ) {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct2( $name, $id )  			{
 		parent::$name = $name;
 		parent::$id = $id;
    }
    
    /** Construtor com um parâmetro */
    function __construct3( $name, $id, $params ) {
 		parent::$name = $name;
 		parent::$id = $id;
 		parent::$params = $params;
    }

	function mntCompStr()							{
		
		parent::$compStr = "";
		$vet = parent::$params;

		// Caso seja array
		if ( is_array($vet) )			{
			$numItens = count($vet);	// N° total de opções do elem select
			
			// echo "<ul style='list-style-type:". $style ."'>";
			parent::$compStr .= "<ul>";
			for ($col = 0; $col < $numItens; $col++)	{
			    parent::$compStr .= "<li>".$vet[$col]."</li>";
		  	  parent::$compStr .= "</ul>";
		  	}
		}
	}

	/* escreve o componente após a string estar devidamente montada */
    function echoComponent1( $params ) 						{
		
		//$mntCompStr();
		//echo parent::$compStr;
		if ( is_array( $params ) )	{
			echo 'É array!';
			echo 'Params = ' . $params[0] . '<br>';
		}
	}	
}


class SelectCmp extends FormComponent							{
	
 	function __construct()                    	{
		$a = func_get_args();   // Pega os args desta função        
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct2( $name, $id )  		{
 		parent::$name = $name;
 		parent::$id = $id;
    }
    
    /** Construtor com um parâmetro */
    function __construct3( $name, $id, $params ) {
 		parent::$name = $name;
 		parent::$id = $id;
 		parent::$params = $params;
    }

	function echoComponent1( $params )						{
		// if ( is_null($compStr) )		{
		// }	
     	if ( is_array( $params ) )	{
			echo 'É array!';
			echo 'Params = ' . $params[0] . '<br>';
		}
	}	

 	function mntCompStr() 			{

 		echo "Aqui!!!";
		if ( parent::$params != null )	{
			echo "Aqui 22!!!";
			$mtx = parent::$params; 
			$numOps = count( $mtx );	// N° total de opções do elem select

	    	parent::$compStr .=  "<select name=" . parent::$name . ">";
	    	for( $i = 0; $i < $numOps; $i++ )	{
				parent::$compStr .=  "<option value='". $mtx[$i][0] ."'>" . $mtx[$i][1] . "</option>";
	    	}
			parent::$compStr .=  "</select>";
		}
		// echo parent::$compStr;
	}		

}

class RadioCheckCmp extends FormComponent  					{
	
	private $orientation = "HORIZONTAL";

	function __construct()                    	{
		$a = func_get_args();   // Pega os args desta função        
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct2( $name, $id )  		{
 		parent::$name = $name;
 		parent::$id = $id;
    }
    
    /** Construtor com um parâmetro */
    function __construct3( $name, $id, $params ) {
 		parent::$name = $name;
 		parent::$id = $id;
 		parent::$params = $params;
    }

	function echoComponent1()			 {
		// $mntCompStr();
		// echo parent::$compStr;
		/* if ( is_array( $params ) )	{
			echo 'É array!';
			echo 'Params = ' . $params[0] . '<br>';
		}*/
	}

	function mntCompStr() 								{
 		
 		$mtx = parent::$params;
		$types = array("checkbox", "radio");
		$del = array("", ""); // delimiters

		if ( $orientation == "VERTICAL" )		   {
    		 $del[0] = "<p>";
    		 $del[1] = "</p>";
		} else if ( $orientation == "HORIZONTAL" ) {
			 $del[0] = "---";
    		 $del[1] = "---";
    	}

		echo 'ok' . $del[0];

		$numOps = count($mtx);	// N° total de opções do elem select
    	for( $i = 0; $i < $numOps; $i++ )
			echo $del[0] . "<input type=". $types[0] . " type= ". parent::$type . "name=" . self::$name . " value='". $mtx[$i][0] ."'>" . $mtx[$i][1] . "</option>" . $del[1];
			
	}	

}

class TextAreaCmp extends FormComponent								{

	private $dimX;
	private $dimY;
	private $placeholderStr; // String com descrição breve
	private $isAutofocus;
	private $isDisabled;
	// private $readonly;
	private $maxLength;

	function __construct()                    	{
		$a = func_get_args();   // Pega os args desta função        
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct2( $name, $id )  		{
 		parent::$name = $name;
 		parent::$id = $id;
    }
    
    /** Construtor com um parâmetro */
    function __construct3( $name, $id, $params ) {
 		parent::$name = $name;
 		parent::$id = $id;
		parent::$params = $params;
    }

	function echoComponent0() 					{
		$placeholderStr = "Testeeeeeee";
		
		$finalCmp = "";
		$isAutofocus = true;
		$isDisabled  = false;
		
		// echo "<textarea placeholder='Teste'></textarea>";	
		$finalCmp = "<textarea "; // autofocus='".$isAutofocus."' rows='". $dimX ."' cols='". $dimY ." ' placeholder='". $placeholderStr ."' maxlength ='". $maxLength ."'></textarea>";
		
		if ( $isAutofocus == true )		{
			$finalCmp .= "autofocus ";
		}
		else if ( $isDisabled == true )	{
			$finalCmp .= "disabled ";
		}
		$finalCmp .= "rows='". $dimX ."' cols='". $dimY ." ' placeholder='". $placeholderStr ."' maxlength ='". $maxLength ."'></textarea>";
		echo $finalCmp;
	}		

}
?>
