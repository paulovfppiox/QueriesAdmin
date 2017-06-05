<?php

// Caltela

  switch( $page )         {

    case "home" : include_once('page.php');
    break;

    case "busca":
    break;

    case "cadastro": include_once('cadastro.php');
    break;

    default: echo 'Empty page!';
    break;

  }

?>
