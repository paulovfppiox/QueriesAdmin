<?php
require_once('ArrayList.php');

class Menu                                           {

    private $type;
    private $style;     // tipo do menu
    private $menuStr;
    private $estilo;  // CSS

    private $options; // opções
    private $links;   // links

    // ----- Construtor -----
    function __construct()                    {
        $a = func_get_args();   // Pega os args desta função
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this, $f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
    }

    function __construct2( $type, $style )  	{
        $this->type = $type;
        $this->style = $style;
    }

    private function setStyle()                       {

        // Folha de Estilo Interna - dentro da Tag <style>. É aplicada no próprio código html para páginas específicas.

        echo '<style>
         .shadowblockmenu-v {
           font: bold 14px Tahoma;
           /* width: 15px; width of menu */
         }
         .shadowblockmenu-v ul{
           border: 1px solid #eee;
           padding: 0;
           margin: 0;
           list-style: none;
         }
         .shadowblockmenu-v ul li{
           margin:0;
           padding:0;
         }
         .shadowblockmenu-v ul li a{
           display:block;
           /* text-transform: uppercase; */
           color: #0040ff;
           padding: 5px 12px;

           text-decoration: none;
           background-color: #5a7a8b;
           border-bottom: 1px solid #cacaca;
           border-right: 1px solid #cacaca; /*right border between menu items*/

           /* Add inset shadow to each menu item. First 3 values in (114,114,114, 0.5) specifies rgb values, last specifies opacity */
           -moz-box-shadow: inset 7px 0 10px rgba(114,114,114, 1);
           -webkit-box-shadow: inset 7px 0 10px rgba(114,114,114, 0.2);
           box-shadow: inset 7px 0 10px rgba(114,114,114, 0.9);

           /*text-shadow: 0 -1px 1px #cfcfcf; /* CSS text shadow to give text some depth */
           -moz-transition: all 0.2s ease-in-out; /* Enable CSS transition between property changes */
           -webkit-transition: all 0.2s ease-in-out;
           -o-transition: all 0.2s ease-in-out;
           -ms-transition: all 0.2s ease-in-out; */
           transition: all 0.2s ease-in-out;
         }
         .shadowblockmenu-v ul li a:hover, .shadowblockmenu-v ul li a.selected{
           color: black;
           background-color: #107cb2;

           /* Add 3 inset shadows to each menu item
            moz-box-shadow: inset 15px 0 30px rgba(216,89,39, 0.5), inset 0 0 30px rgba(216,89,39, 1), inset 0 0 20px rgba(216,89,39, 1);
           -webkit-box-shadow: inset 15px 0 30px rgba(216,89,39, 0.5), inset 0 0 30px rgba(216,89,39, 1), inset 0 0 20px rgba(216,89,39, 1);
           box-shadow: inset 7px 0 30px rgba(216,89,39, 0.5), inset 0 0 30px rgba(216,89,39, 0.6), inset 0 0 20px rgba(216,89,39, 0.8);
           */
         }
         </style>';
    }

    function setMenuTxt()                 {

        $this->setStyle();

        $options = new ArrayList();
        $links = new ArrayList();

        $links->add("?page=home");
        $links->add("?page=busca");
        $links->add("?page=cadastro");
        $options->add("Cadastrar Consultas");
        $options->add("Buscar Consultas");
        $options->add("Historico");

        $this->menuStr .= "<div class='shadowblockmenu-v'><ul>";
        for ( $i=0; $i<$options->size(); $i++ )
              $this->menuStr .= "<li><a href='". $links->get($i) . "'>". $options->get($i) ." </a></li>";

        $this->menuStr .= "</ul></div>";
        return $this->menuStr;

    }
}

?>
