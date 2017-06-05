<?php
    
    require("DivsEnum.php");
    require("myPage.php");
    echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
    
    
    // testeEnum();
    function testeEnum()                            {
        
        $color = new DivsEnum(DivsEnum::DIV_TOPO);

        try {
            // $color = new DivsEnum('3');           //This will throw an error
            $color = new DivsEnum(3);
        } catch ( UnexpectedValueException $uve ) {
            echo $uve->getMessage() . PHP_EOL;
            if ($color->is(DivsEnum::DIV_TOPO))
                echo "It's green";
        }
        
        $color =  $color->value();
        echo 'Cor == ' . $color;
       
        $colors = DivsEnum::toArray();
        
        //Use to check if enum has value
        DivsEnum::has('3'); // will return "false"
        DivsEnum::has(3); //will return "true"
    }        
    
?>
