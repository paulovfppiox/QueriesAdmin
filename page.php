<?php
require_once("PageRenderer.php");
require_once('ArrayList.php');
require_once('Menu.php');

$divs = new ArrayList();
$menu = new Menu();
$pageHTML = new PageRenderer($divs);
$pageHTML->setStyle("folha.css");

// Get selected page on menu
if ( isset( $_GET['page'] ) )    {
    $page = $_GET['page'];
}   else   {
    $page = "";
}
include 'pageSwitcher.php';

// Caso variável não tenha sido definida
if ( !isset($GLOBALS['pageContent']) )        {
      $GLOBALS['pageContent'] = "page content";
}

$divs->add('');
/* $divs->add('<div id="topo" style="padding-bottom:12px;"><middle><br>
                    <h1 style="padding-left:600px; font-style:oblique; font:Verdana"> DPD </h1></middle>
                    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			      </div>');*/

$divs->add('<div class="wrapper">
            <div class="box header"> .:: Sistema de Gerenciamento de Consultas ::. </div>');

$divs->add('<div class="box sidebar">' . $menu->setMenuTxt() . '</div>');
$divs->add('<div class="box content">'. $GLOBALS['pageContent'] .'
            <br />
            </div>');
$divs->add('<div class="box footer"> Footer </div>
            </div>'); // -- fechando o wrapper
$pageStr = '<meta http-equiv="Content-type" content="text/html; charset=utf-8" /><body bgcolor="#FfF4C4">
            			<center> '. $divs->get(0) . $divs->get(1) . $divs->get(2) . $divs->get(3) . $divs->get(4) .
            '</center><body>
            <h5> Departamento de Processamento de Dados - DETRAN-PB </h5></body>';

// Folhas de estilos persistentes - são aquelas que estão sempre habilitadas e são combinadas com as ativas.
// Servem para definir estilos globais que podem ser usados por todos.
// fmto :: <link rel="stylesheet" type="text/css" href="paul.css" />

// Definição do ID do estilo e JS atual
$pageHTML->setTitle(".:: SisConsultas ::.");
$pageHTML->head();
$pageHTML->setPage( utf8_encode($pageStr) );
$pageHTML->render();



?>
