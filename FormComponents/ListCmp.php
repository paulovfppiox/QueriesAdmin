<?php
require_once('FormComponent.php');

class ListCmp extends FormComponent							{


	private $className = "A";
	private $lType = "ul"; // ou ol

	// Ajeitar Depois !!!!!! Fazer vetor com linhas de um arq. CSS
	// Ou uma String mesmo
	private $style = "<style>";

	function __construct()                    		{
		parent::__construct("Lista !");
		$a = func_get_args();   // Pega os args desta função
    $i = func_num_args();   // N° de argumentos desta função
    if (method_exists($this, $f='__construct'.$i) ) {
            call_user_func_array(array($this,$f), $a);
    }
	}

  function __construct2( $name, $id )  					{
			$this->name = $name;
			$this->id = $id;
  }

  /** Construtor com um parâmetro */
  function __construct3( $name, $id, $params )	 {
			$this->name = $name;
			$this->id = $id;
			$this->params = $params;
  }

	protected function cast( $f )									{
			return null;	// return (ListCmp) $f;
	}

	function echoComponent()						          {
			 parent::echoComponent();
			 /* Em tempo de execução, a classe pai é mesclada com a filha.
			 Deste modo, não deve-se usar o parent::$var nas filhas.*/
	}

	function setStyle( $str, $t, $class )								{
			$this->className = $class;
			$this->lType = $t;

			if ( $str == "circle" || $str == "square" )
					 $style .= $t . "." . $class ."{list-style-type: ". $str . ";}</style>";

			echo $style;
	}

	function mntCompStr()										{

		/*$style .= ul.x {list-style-type: circle;}
			ul.A {list-style-type: square;}
			ol.c {list-style-type: upper-roman;}
			ol.d {list-style-type: lower-alpha;}
		</style>";*/

			$this->compStr = "";
			$vet = $this->params;

			// Caso seja array
			//if ( is_array($vet) && !is_null($vet) )			{
				$numItens = count($vet);	// N° total de opções do elem select
				// echo "Num itens = " . $numItens . "<p>";
				// $this->compStr .= "<ul class=" . $className . ">";
				$className = "x";

				$this->compStr .= "<ul class='" . $className . "'>";
				// $this->compStr .= "<ul style='list-style-type: circle>"; //". $style ."'>";
				for ($col = 0; $col < $numItens; $col++)			{
						$this->compStr .= "<li>".$vet[$col]."</li>";
				}
				$this->compStr .= "</ul>";
			//}
	}


	/* escreve o componente após a string estar devidamente montada */
  /* function echoComponent1( $params ) 						{

		//$mntCompStr();
		//echo parent::$compStr;
		if ( is_array( $params ) )	{
			echo 'É array!';
			echo 'Params = ' . $params[0] . '<br>';
		}
	}*/
}
?>
