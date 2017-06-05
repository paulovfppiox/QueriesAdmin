<?php
//Import ArrayList lib
require('ArrayList.php');

class HeapTree                                 {

    private $heapTree;
    //private $nodes = array();
   
    function mountLista()               {
        var_dump($a);
    }
    
    function addChilds( $level )        {
        
        for ($i=0; $i < 4 ; $i++)   {
            
            $objTreeLevel = $this->$nodes[$i]->getTreeLevel();
            if ( $level < $objTreeLevel )   {
                $parent = $this->$nodes[$i]->getId();
                $this->heapTree->insert([ $parent, $objTreeLevel ]);
            }
        }
        $this->printTree();
    }
    
    /* Exemplo de uso da classe */
    function preencheDados()                {     


        /*  echo 'No!! ' . $no;
            $x1 = $no1->getMyLevel() . $no1->getMyId();
            echo 'x = '. $x1;
        */

        //Create our ArrayList
        $nodes = new ArrayList();
        $no1 = new NoFolha('00', "Tag 1");
        echo $no1->getComposedID() . ' -- ' . $no1->getName();

        $no2 = new NoFolha('10', "Tag 2");
        $no3 = new NoFolha('20', "Tag 3");
        $no4 = new NoFolha('21', "Tag 4");
        $nodes->add( $no1);
        $nodes->add( $no2 );
        $nodes->add( $no3 );
        $nodes->add( $no4 );

        //Create our loop
        echo '==== <BR>';
        for($i = 0; $i < $nodes->size(); $i++)  {
            echo $nodes[$i]->getName() . "<br>";
        }
   
        // [ parent, child ]
        $this->heapTree->insert([$no1, $no2]);
        $this->heapTree->insert([$no2, $no3]);
        $this->heapTree->insert([$no2, $no4]);
        $this->printTree();


    }
    
    function __construct()                                      {
        $this->heapTree = new SplMinHeap();
        $a = func_get_args();   // Pega os args desta função        
        $i = func_num_args();   // N° de argumentos desta função
        if (method_exists($this,$f='__construct'.$i) )   {
            call_user_func_array(array($this,$f), $a);
        }
        $this->preencheDados();
    }
    
    /** Construtor com um parâmetro */
    function __construct1($heap)                                {
        $this->heapTree = $heap;
        $this->preencheDados();
    }
    
    /** Construtor com dois parâmetros */
    function __construct2($heap, $o)                            {
        $this->heapTree = $heap;
        $this->preencheDados();
    }
    
    
    /**
     * @return the $heapTree
     */
    public function getHeapTree()              {
        return $this->heapTree;
    }

    /**
     * @param field_type $heapTree
     */
    public function setHeapTree($heapTree)
    {
        $this->heapTree = $heapTree;
    }
    
    /**
     * @return the $listaObjs
     */
    public function getListaObjs()
    {
        return $this->listaObjs;
    }
    
    /**
     * @param multitype: $listaObjs
     */
    public function setListaObjs($listaObjs)
    {
        $this->listaObjs = $listaObjs;
    }
    
        
    function printTree()                       {
     
        for ($this->heapTree->top(); $this->heapTree->valid(); $this->heapTree->next())   {
            list( $parentId, $myId ) = $this->heapTree->current();
            echo "$myId ($parentId)\n";    
        }
    }
    
    public function out()    {
        echo "Okkk";
    }
    
    
}



?>
