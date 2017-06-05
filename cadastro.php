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
    $elData = array      (
        array("VEI", "Veículos" ),
        array("CAT", "Habilitação" ),
        array("VDI", "Multas" ),
        array("PRO", "Processos" )
    );
    $params1 = $elData;
    $cmps[0] = FormComponentFactory::getComponent( 'select', $params1 );

    // List Comp
    /* $params2 = array("Item 1", "Item 2", "Item 3", "Item 4");
    $cmp2 = FormComponentFactory::getComponent( 'list', $params2 );
    $cmp2->setStyle("square", "ul", "A");*/

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
    $cmps[3] = FormComponentFactory::getComponent( 'text', 2 );
    $cmps[3]->setName("val");
    $cmps[4] = FormComponentFactory::getComponent( 'textarea', 1 );
    $cmps[5] = FormComponentFactory::getComponent( 'upload', 1 );

    for($i=0; $i<5; $i++)
      $cmps[$i]->mntCompStr();

    // Building Form
    $dataMtx = array
    (
      array("<label for='modulo'> Módulo: </label>" ,           $cmps[0]->getComponentStr() ),
      array("<label for='tipo'> Tipo de Solicitação: </label>", $cmps[1]->getComponentStr() ),
      //array("<label for='data'> Data de consulta: </label>"   , $cmps[]->getComponentStr() ),
      array("<label for='solicitante'> Solicitante: </label>" , $cmps[3]->getComponentStr() ),
      array("<label for='query'> Insert query? </label>", $cmps[2]->getComponentStr()  ),
      array("<label for='queryTxt'> Consulta: </label>", $cmps[4]->getComponentStr()  ),
      //array("<label for='query'> File </label>", $cmps[4]->getComponentStr()  )

    );
    $f = new Form( 5, 2 ); // mountFormStr()
    $f->setFormData( $dataMtx );
    $f->mountFormStrOnComponents();
//    $f->render();
    $GLOBALS['pageContent'] = $f->getToRender();

?>
