<?php
require("PageRenderer.php");
echo "Teste";

/*$divs = array("", "");
$divs[0] = '<div id="topo" style="padding-bottom:12px;"><middle><br>
                    <h1 style="padding-left:600px; font-style:oblique; font:Verdana"> Corollarium </h1></middle>
                    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			           </div>';

$divs[1] = '<div class="wrapper">
            <div class="box header"> Header </div>
            <div class="box sidebar"> Sidebar </div>
            <div class="box content"> Content
            <br /> The four arrows are inline images inside the content area.
                  <img src="http://gridbyexample.com/examples/code/arrow-top-left.png" alt="top left" class="topleft" />
                  <img src="http://gridbyexample.com/examples/code/arrow-top-right.png" alt="top right" class="topright" />
                  <img src="http://gridbyexample.com/examples/code/arrow-bottom-left.png" alt="bottom left" class="bottomleft" />
                  <img src="http://gridbyexample.com/examples/code/arrow-bottom-right.png" alt="bottom right" class="bottomright" /></div>
            <div class="box footer"> Footer </div>
            </div>';
$pageStr = '<body bgcolor="#F4F4F4">
            			<center> '. $divs[0] .$divs[1] .'
            <body>
            <h5> Paulo Paiva </h5>'. $divs[2] .'</body>';

$pageHTML = PageRenderer::singleton();

$cssParams = array("estilo.css", "estilo2.css", "estilo3.css");
$pageHTML->setStylesArray($cssParams);

// Definição do ID do estilo e JS atual
$pageHTML->setStyle(1);
$pageHTML->setJavascript(2);

$pageHTML->setTitle("Virtual Reality (VR) Solutions");
$pageHTML->head();
$pageHTML->setPage( utf8_encode($pageStr) );

$pageHTML->render();*/

?>
