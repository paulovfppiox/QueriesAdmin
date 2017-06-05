<?php
require("PageRenderer.php");

$divsCodes = array("", "");
$divsCodes[0] = '<div id="topo" style="padding-bottom:12px;"><middle><br>
                    <h1 style="padding-left:600px; font-style:oblique; font:Verdana"> Corollarium </h1></middle>
                    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			    </div>';

$divsCodes[1] = '<div id="menu">
                    <a href="?pag=home"><input class="botoesMenu" type="button" value="Execute Javascript" onclick="funcao();"></a>
                    <a href="?pag="><input class="botoesMenu" type="button" value="Regras"></a>
                    <a href="?pag="><input class="botoesMenu" style="border-right:none;" type="button" value="Equipe"></a>
                </div>';

$divsCodes[2] = '<div id="texto">
                    <img src="logo.jpg" align="right" alt="Logo" width="15%" height="20%" />
                    <p>
                    Em 2005, um grupo de pesquisadores saindo da pós-graduação, com experiência em <br />
                    desenvolvimento de software na área de computação gráfica e distribuída, começou <br />
                    a trabalhar em conjunto, desenvolvendo soluções de Realidade Virtual, Realidade <br />
                    Aumentada e Processamento de Imagens. Esta foi a semente da Corollarium, que desde <br />
                    então expandiu e cresceu. Por desenvolver toda a sua tecnologia internamente, a <br />
                    Corollarium pode criar soluções customizadas para suas necessidades, consulte-nos. <br />
                    </p>
                    </div>';

$pageStr = '<body bgcolor="#F4F4F4">
			<center> '. $divsCodes[0] .$divsCodes[1] .'
			<body>	
			<h5> Paulo Paiva </h5>'. $divsCodes[2] .'</body>';
$footerStr = 


$pageHTML = PageRenderer::singleton();

// Definição de múltiplos arquivos de estilo (CSS) e JS
$cssParams = array("estilo.css", "estilo2.css", "estilo3.css");
$jvParams = array("java1.js", "java2.js", "java3.js");
$pageHTML->setStylesArray($cssParams);
$pageHTML->setJSArray($jvParams);

// Definição do ID do estilo e JS atual
$pageHTML->setStyle(1);
$pageHTML->setJavascript(2);

// Definição do titulo, head e corpo da página
$pageHTML->setTitle("Virtual Reality (VR) Solutions");
$pageHTML->head();
$pageHTML->setPage( utf8_encode($pageStr) );
$pageHTML->setRodape('<div id="base">
				<input type="hidden" value="base">
				</div>
				</center>
				</body>
				</html>');
			

// Renderização da página			
$pageHTML->render();


?>