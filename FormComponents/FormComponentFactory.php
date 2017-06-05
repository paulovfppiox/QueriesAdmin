<?php

class FormComponentFactory								{

    protected static $type;
    protected static $mntCompStrAtInstantiation;

    public static function getComponent( $type , $params )		{

		$cmp = null;

		if ( $params == null )		{
			echo 'Parametros está nulo !!';

		} 			else 			{

	    	switch( $type )		{

              case 'upload':
                  $cmp = new UploadFileCmp( $params );
              break;

              case 'list':
                  $cmp = new ListCmp( "labels", "2", $params );
              break;

              case 'radio':
                  $cmp = new RadioCheckCmp("Teste", "radio", "3", $params  );
              break;

              case 'checkbox':
                  $cmp = new RadioCheckCmp("Teste", "checkbox", "5", $params  );
              break;

              case 'select':
                  $cmp = new SelectCmp( "labels", "1", $params );
              break;

              case 'textarea'; case 'text'; case 'password';
                  $cmp = new TextCmp( $type );
              break;

              case 'range':
                  $cmp = new RangeCmp( $params );

              break;
	    	}
	    }

      $mntCompStrAtInstantiation = false;
      if ( $mntCompStrAtInstantiation ) {
           $cmp->mntCompStr();
      }
	    return $cmp;
    }

}


?>
