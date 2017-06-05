<?PHP

require_once('ArrayList.php');

// Representa uma linha do formulário
class FormCell                              {
   public $label;
   public $content;
   function __construct()             {
       $a = func_get_args();   // Pega os args desta função
       $i = func_num_args();   // N° de argumentos desta função
       if (method_exists($this, $f='__construct'.$i) ) {
           call_user_func_array(array($this,$f), $a);
       }
   }
   function __construct2($l , $c) {
      $this->label = $l;
      $this->content = $c;
   }
}

class Form                                 		               {

    private $numLines;
    private $numCols;

    private $formStr = "";      // String do formulário
    private $dataMtx = array();

    private $formMethod;
    private $components;          // List of components
    private $numComponents;
    private $processPage;
    private $actionMethod;
    private $hasSubmitBtns;   // ativa os botões de envio/limpar
    private $borderOn;

	  function __construct()             {
        $a = func_get_args();   // Pega os args desta função
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) ) {
            call_user_func_array(array($this,$f), $a);
        }
    }

    /** Construtor com um parâmetro */
  function __construct2( $nLines, $nCols )  	       {
    	$this->numLines = $nLines;
    	$this->numCols = $nCols;
  }

  function initComponents()    {
      $this->components = new ArrayList();
  }

  function setComponents( $cmps )             {
      $components->$cmps;
  }

  function setFormData($mtx)					{
		  $this->dataMtx = $mtx;
  }

    /** monta a string de formulário **/
    function addFomComponent( $f )                  {

        $this->numComponents++;
        if ( $this->components == null ) {
            $this->components = new ArrayList();
        }
        $this->components->add( $f );
    }

    /** monta a string de formulário **/
    function rmvFomComponent($f)                  {

        if ( ( !is_null( $this->components ) ) && ( !is_null( $f ) ) )   {
                $this->components->remove($f);
        }
    }

    function setFieldSetWithLegend($legend)              {
        $formStr .= "<fieldset><legend>".$legend."</legend>" . $formStr . "</fieldset>";
    }

    /** monta a string de formulário, com base no arrayList de Components **/
    function mountFormStr()					  	               {

    		// echo 'dataMtx = ' . $this->dataMtx[0][0] . '<br>';

    		$this->formStr = '<table>';
    		if (!isset($numLines)) {
        		$numLines = 0;
    		}
        // varia o n° de linhas
        for ( $i = 0; $i < $this->numLines; $i++ )		{
        		  $this->formStr .= "<tr>";
        		  for ( $j = 0; $j < $this->numCols; $j++ )		{
    				        $this->formStr .= "<td>" . $this->dataMtx[$i][$j] . "</td>";
        		  }
        		  $this->formStr .= "</tr>";
        }
        $this->formStr .= '</table>';
    }

    function mountFormStrOnComponents()					  	   {

        // echo 'dataMtx = ' . $this->dataMtx[0][0] . '<br>';
        $cells = new ArrayList();
        for ( $i = 0; $i < $this->numLines; $i++ )      {
              $c = new FormCell( $this->dataMtx[$i][0], $this->dataMtx[$i][1] ) ;
              $cells->add( $c );
        }

        /* echo "Cell == " . $cells->get(0)->label . " || " . $cells->get(0)->content . "<p>";
        echo "Cell == " . $cells->get(1)->label . " || " . $cells->get(1)->content . "<p>";
        echo "Cell == " . $cells->get(2)->label . " || " . $cells->get(2)->content . "<p>";*/
        $legenda = "";

        $processPage = "formProcesser.php"; // "Form.php";
        $actionMethod = "POST";

        $this->formStr .= "<link rel='stylesheet' type='text/css' href='/Estilos/cadastroStyle.css'>";
        $this->formStr .= "<form action='". $processPage ."' method='". $actionMethod ."'>"; //. $processPage . " method=" . $actionMethod . ">";
        $this->formStr = '<table>';

        $this->borderOn = true;
        if ( $this->borderOn )    {
          echo "<style> table, td, th, tfoot { border:solid 1px #000; padding:5px; } </style>";
        }

        // Varia o n° de linhas
        for ( $i = 0; $i < $cells->size(); $i++ )	        {
              $this->formStr .= "<tr>";
              $this->formStr .= "<td>" .  $cells->get($i)->label . "</td>";
              $this->formStr .= "<td>" .  $cells->get($i)->content . "</td>"; // $this->dataMtx[$i][$j] . "</td>";
              $this->formStr .= "</tr>";
        }
        $this->formStr .= "<tr>";
        $this->formStr .=   "<td></td>";
        $this->formStr .=   "<td><input type='submit' value='Limpar'><input type='submit' value='Cadastrar'></td>";
        $this->formStr .= "</tr>";
        $this->formStr .= "<p>Your name: <input type='text' name='val' /></p>";


        /** / Reverr Depoiss!!!!!!!!!!
        $hasResetButton = false;
        if ( $hasResetButton )
             $this->formStr .= "<input type='reset'>";
        $button = "";
        $this->formStr .= "<input type='button' onclick='alert('Hello World!')' value='". $button ."'>";*/

        $this->formStr .= "</table></form>"; //</table>';
    }


    function render()                                {
        echo $this->formStr;
    }

    function getToRender()                {
        return $this->formStr;
    }

    /** Lista! */
 	function mountList()					  	        {

	    for ($row = 0; $row < 4; $row++) 	{
		  echo "<p><b>Row number $row</b></p>";
		  echo "<ul>";

		  for ($col = 0; $col < 3; $col++)
		    echo "<li>".$cars[$row][$col]."</li>";
	  	  echo "</ul>";
	  	}
	}

}

?>
