<?php
require_once('ArrayList.php');

class PageRenderer												        {

	//--- Guarda uma instância da classe ----
	private $title;
	private $head;
	private $page;
	private $rodape;

	private $charset;
  private $divs;    // vetor com todos as divs

	// Vetores para estilos e javascripts
	private $estilos;
	private $javascripts;
  private $stylesFolder = "/Estilos";

    // Construtor
    function __construct()                 {
        $a = func_get_args();   // Pega os args desta função
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )         {
            call_user_func_array(array($this,$f), $a);
        }
    }
    function __construct1( $divs )  		{
        $this->divs = $divs;
    }

    function __construct2( $divs, $t )  		{
 				$this->divs = $divs;
 				$this->title = $t;
    }

    public function setDivs( $divs )      {
        $this->divs = $divs;
    }

	public function setJSArray($v)			    {
		$this->javascripts = $v;
	}

	public function setStylesArray($v)		   {
		$this->estilos = $v;
	}

	public function setStyleById($id)			{
		echo "CSS atual = " . $this->estilos[$id];
    echo '<link rel="stylesheet" type="text/css" href="'. $this->estilos[$id].'">';
	}

	public function setStyle($estilo)			{
		echo '<link rel="stylesheet" type="text/css" href="'. $estilo .'">';

	}

	public function setJavascript($id)		{
		echo "JS atual = " . $this->javascripts[$id];
		echo '<script type="text/javascript" src="'.$this->javascripts[$id].'"></script>';
	}

	// M�todo head() que gera a tag head
	public function head()					{
	    echo  '<html xmlns="http://www.w3.org/1999/xhtml">
					   <head><title>'.$this->title.'</title></head>';
	}

	// ----- Setters -------
	public function setTitle( $titleDefault = "Paulo Paiva" )	{
		$this->title = $titleDefault;
	}
	public function setPage($v)				{
		$this->page = $v;
	}
	public function setRodape($v)			{
		$this->rodape = $v;
	}

	//------- Getters -------
	public function getPage()				{
		return $this->page;
	}
	public function getRodape()				{
		return $this->rodape;
	}
	public function getTitle()				{
		return $this->title;
	}

  public function render()				{
		self::head();
		echo self::getPage();
		echo self::getRodape();
  }

}

?>
