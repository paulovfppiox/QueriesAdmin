<?php

$f = "ContatoForm.html";
$size = filesize($f);
const META = 0;
const BODY = 1;
const TITLE = 2;
const DIV = 3;

if ( file_exists($f) )        {
    $size = filesize($f);
    echo "Tam do arq " . $f . " = " . $size . " bytes.<br>";
}       else        {
    echo $f . " does not exist.";
}

$dateFormat = "D d M Y g:i A";

$atime = fileatime($f);
$mtime = filemtime($f);
$ctime = filectime($f);

echo $f . " foi acessado em " . date($dateFormat, $atime) . ".<br>";
echo $f . " foi modificado em " . date($dateFormat, $mtime) . ".<br>";
echo $f . " foi alterado em "  . date($dateFormat, $ctime) . ".";

ler($f);

function permissoes($f)           {
    echo $f . (is_readable($f) ? " is" : " is not") . " readable.<br>";
    echo $f . (is_writable($f) ? " is" : " is not") . " writeable.";
    echo $f . (is_file($f) ? " is" : " is not") . " a file.<br>";
    echo $f . (is_dir($f) ? " is" : " is not") . " a directory.";
}    

function conteudo($f)               {
    $f1 = file_get_contents($f);
    echo $f1;    
}

function containsTag()          {
    
    
}

function ler($f)                        {
    
    $f1 = fopen( $f, "r" );
    $cont = 0;
    $numLinhas = 0;
    $j = 0;
    
    $out = "";
    $arvoreTags = array("");
    
    do {
        $temp = htmlspecialchars( fgets($f1) ); // . "\n"; // converte cada linha em caracteres HTML
        echo $temp . '<br>';
        
        // echo "(". $numLinhas . ")" . htmlspecialchars($temp);
        $tamlinha = strlen($temp);  // Tamanho da linha do arquivo
        
        // Varre todos os caracteres de cada linha
        for( $j=0; $j<$tamlinha; $j++ )           {
            
            // Detecata o '<' // abertura de cada tag
            if ($temp[$j] == '&' && $temp[$j+1] == 'l' && $temp[$j+2] == 't' && $temp[$j+3] == ';')     {

                // pega a substring imediatamente após o '<'
                $sub = substr($temp, ($j+3), ($j+20) );
                $pos = strpos($sub, 'meta');
                
                if ($pos === false)     {
                    // echo "Meta não foi encontrado!";
                } else {
           //         echo " (pos= " . $j . " |" . $sub . ")";
                     
                    // $arvoreTags[META]++; // salva n° da linha
                }
            }
        }
       // echo '<br>';
        
        /* $pos = strpos($temp, '&lt;');
        if ($pos === false) {
            echo "Não foi encontrado!";
        } else {
            echo ' ---------- <br>';
            echo htmlspecialchars($temp) . '<br>';
            echo ($numLinhas++) . $temp . "(pos:" . ( $pos ) . ')<br>';
            echo ' ---------- <br><br>';
            $pos = 0;
        }*/
        
        $numLinhas++;
    }
    while ( !feof($f1) );
    fclose( $f1 );
    
    // print_r($vet);
}   

function writeFile()                {
    
    $file = "add_emp.txt";
    $f1 = fopen($file, "a");
    $output = "banana" . PHP_EOL;
    fwrite($f1, $output);
    $output = "cheese" . PHP_EOL;
    fwrite($f1, $output);
    fclose($f1);
}





?>