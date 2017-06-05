<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
WHA
<head>
    <title> -- Formulário Contato -- </title>
    <meta charset="utf-8" />
    <!--<link href="ContatoEstilo.css" rel="stylesheet" media="all" />
    <script src="JavaScript1.js"></script>-->
</head>
<body>

    <?php
        error_reporting( E_ALL & ~ E_NOTICE ); // Desabilita a exibição de mensagens de warning...
        require_once('ArrayList.php');
        require('Form.php');
        require('/FormComponents/FormComponent.php');
        require('/FormComponents/UploadFileCmp.php');
        require('/FormComponents/ListCmp.php');
        require('/FormComponents/RangeCmp.php');
        require('/FormComponents/RadioCheckCmp.php');
        require('/FormComponents/SelectCmp.php');
        require('/FormComponents/TextCmp.php');
        require('/FormComponents/FormComponentFactory.php');

        $cmp = array();

        // Select Comp
        $elData = array
        (
            array("VEI", "Veículos" ),
            array("CAT", "Habilitação" ),
            array("VDI", "Multas" ),
            array("PRO", "Processos" )
        );
        $params1 = $elData;
        $cmps[0] = FormComponentFactory::getComponent( 'select', $params1 );

        // Radio Comp
        $params3 = array
        (
          array("Interna", "Interna" ),
          array("Órgão externo", "Órgão externo" ),
          array("Chefia imediata", "Chefia imediata" )
        );
        $cmps[1] = FormComponentFactory::getComponent( 'radio', $params3 );
        $cmps[1]->setOrientation("VERTICAL");

        $p = array
        (
          array("Inserir", "Inserir" ),
          array("Carregar SQL", "Upload" )
        );
        $cmps[2] = FormComponentFactory::getComponent( 'radio', $p );
        $cmps[2]->setOrientation("VERTICAL");

        // Text COMP
        $cmps[3] = FormComponentFactory::getComponent( 'text', 2 );

        // File Upload
        $comps[4] = FormComponentFactory::getComponent( 'upload', 1 );

        // Range Comp
        /*$vet = array("0", "1", "2", "3");
        $cmps[5] = FormComponentFactory::getComponent( 'range', $vet );*/

        // Building Form
        $dataMtx = array
        (
          array("<label for='modulo'> Módulo: </label>" ,           $cmps[0]->getComponentStr() ),
          array("<label for='tipo'> Tipo de Solicitação: </label>", $cmps[1]->getComponentStr() ),
          // array("<label for='data'> Data de consulta: </label>"   , $cmps[]->getComponentStr() ),
          array("<label for='solicitante'> Solicitante: </label>" , $cmps[3]->getComponentStr() ),
          array("<label for='query'> Insert query? </label>", $cmps[2]->getComponentStr()  )
          array("<input type='submit' value='Submit'>" , "<input type='submit' value='Submit'>")
          // array("<label for='query'> File </label>", $cmps[4]->getComponentStr()  )
        );

        $f = new Form( 5, 2 ); // mountFormStr()
        $f->setFormData( $dataMtx );
        $f->mountFormStrOnComponents();
        $f->render();

    ?>

</body>

</html>
