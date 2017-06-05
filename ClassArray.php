<?php
/*
 * Creating an ArrayList and iterating over it in different ways.
 */
//Import ArrayList lib
require('ArrayList.php');
//Create our class
class MyClass {
    public $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
}
//Create our Objects
$object1 = new MyClass('A');
$object2 = new MyClass('B');
$object3 = new MyClass('C');

//Create our ArrayList
$myList = new ArrayList();
$myList->add($object1);
$myList->add($object2);
$myList->add($object3);

//Create our loop
for($i = 0; $i < $myList->size(); $i++) {
    echo $myList[$i]->name . " ";
}
//Will Print: "Hello World How Are You "
foreach($myList as $obj) {
    echo $obj->name . " ";
}
//Will Print: "Hello World How Are You "