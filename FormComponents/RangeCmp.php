<?php
require_once('FormComponent.php');

class RangeCmp extends FormComponent  					{

	private $orientation; //= "VERTICAL";
	private $numOps;
	protected $min;
	protected $max;
	private $step;
	private $datalistId;

	function __construct()                    	{

		parent::__construct("Range!");

		$a = func_get_args();   // Pega os args desta função
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct1( $params )  					{
			if ( gettype( $params ) != "array")
					 echo "Error in param!!!";
			$this->params = $params;
			$this->numOps = sizeof($params);
    }

		function setMin($m)												{
				$this->min = $m;
		}
		function setMax($m)												{
				$this->max = $m;
		}
		function setStep($s)											{
				$this->step = $s;
		}
		function setMinMax($m1, $m2)							{
				$this->min = $m1;
				$this->max = $m2;
		}
		function setDataListId($id)								{
			$this->datalistId = $id;
		}

		protected function cast( $var )						{
			//return (RadioCheckCmp) $var;
			return null;
		}

		function echoComponent() 									{
				parent::echoComponent();
		}

	public function mntCompStr()
	{
 		$vet = $this->params;
		$numOps = count($vet);	// N° total de opções do elem select

		/*"<input type='range' min='-100' max='100' value='0' step='10' name='power' list='powers'>
		<datalist id='powers'>
			<option value='0'>
			<option value='-30'>
			<option value='30'>
			<option value='+50'>
		</datalist>"*/

		if ( $this->type == $types[0] ) $tId = 0;
		else $tId = 1;

		$this->compStr .= "<input type=range name=" . $this->name . " value='". $this->mtx[$i][0] ."' min='". $this->min ."' max='". $this->max ."' step='". $this->step ."' list='". $this->datalistId ."' >";
		$this->compStr .= "<datalist id=". $this->datalistId .">";
		for ( $i = 0; $i < $numOps; $i++ )
					$this->compStr .= "<option value=". $vet[$i] .">";
		$this->compStr .= "</datalist>";

		echo $this->compStr;

	}

}
?>
