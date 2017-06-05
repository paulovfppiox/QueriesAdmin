<?php

class NoFolha
{
    public $name;
    public $class;
    
    public $parentId;               // ID do pai
    public $myId;                   // meu ID
    public $myLevel;                // Meu level
    public $composedID;         // Composto por = myId + myLevel
    public $parentLevel;
        
    function __construct()                                     {
        // $parentLevel =  $this->myLevel - 1;
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i))   {
            call_user_func_array(array($this,$f), $a);
        }
    }
    
     // Construtor
    function __construct1( $compID )            {
        $this->composedID = $compID;
    }

    function __construct2( $compID, $n )                               {
        $this->name = $n;
        $this->composedID = $compID;
       // echo 'N == ' . $n;
       // echo 'Contructor ... ' . $this->name . ' -- ' . $this->composedID . '<br>';
    }
    // Construtor
    function __construct3( $name, $id, $treeLevel )    {
        $parentLevel =  $this->myLevel - 1;
        $this->name = $name;
        $this->parentId = $id;
        $this->treeLevel = $treeLevel;
        echo 'Debug: ArvoreTags created...';
    }

    public function __toString()
    {
        return $this->name . '<br>' . $this->class . '<br>' . $this->parentId . '<br>' .  $this->myLevel;
    }
    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return the $class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return the $parentId
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @return the $myLevel
     */
    public function getMyLevel()
    {
        return $this->myLevel;
    }

    /**
     * @return the $parentLevel
     */
    public function getParentLevel()
    {
        return $this->parentLevel;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param field_type $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @param field_type $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @param field_type $myLevel
     */
    public function setMyLevel($myLevel)
    {
        $this->myLevel = $myLevel;
    }

    /**
     * @param number $parentLevel
     */
    public function setParentLevel($parentLevel)
    {
        $this->parentLevel = $parentLevel;
    }
    
    /**
     * @return the $myId
     */
    public function getMyId()
    {
        return $this->myId;
    }
    
    /**
     * @param field_type $myId
     */
    public function setMyId($myId)
    {
        $this->myId = $myId;
    }

    /**
     * @return the $myId
     */
    public function getComposedID()
    {
        return $this->composedID;
    }
    
    /**
     * @param field_type $myId
     */
    public function setComposedID($id)
    {
        $this->composedID = $id;
    }
    
    

   
    

    
    
    
}
?>

