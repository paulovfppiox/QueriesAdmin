<?php
require("InsertTagEnum.php");

// Declara a interface 'iTemplate'
abstract class FormComponent												{

	protected $labelTitle; //

  protected $name;
	protected $id;
	protected $class;
	protected $data;
	protected $align;
	protected $autocomplete; // = on / off
	protected $autofocus;
	protected $checked;
	protected $dirname;
	protected $disabled;
	protected $formaction;
	protected $formtarget;
	protected $max;
	protected $readonly;
	protected $size;
	protected $type;
	protected $src;

	protected $params;
	protected $compStr;
	protected $hasSubmitBtn;

	public function __construct($l) 			{
	 	$this->labelTitle = $l;
		// echo "Label = " . $l;
	}

	// Forcing childs to implement
	abstract public function mntCompStr();
	// abstract protected function cast( $var );

  // Common method
	function setType($t)														{
		$this->type = InsertTagEnum::getTypeStr($t);
	}

	public function echoComponent() 												{
		echo "cmpStr no Pai == " . $this->compStr;
	}
	public function getParams()					{
				return $this->params;
	}

	public function getComponentStr()		{
			return $this->compStr;
	}

	public function getName()						{
			return $this->name;
	}
	public function setName($n)						{
			$this->name = $n;
	}
  /*function echoComponent() 												{
			$a = func_get_args();   // Pega os args desta função
		  $i = func_num_args();   // N° de argumentos desta função
		  if ( !$labelTitle )
		 		echo '<p>' . $labelTitle . '</p>';

		  if (method_exists($this, $f='echoComponent'.$i) )
			    call_user_func_array(array($this,$f), $a);
			if ( $hasSubmitBtn )
			    	echo "<input type='submit' value='Submit'> <br>";

			echo $compStr;
	}*/

}
?>
