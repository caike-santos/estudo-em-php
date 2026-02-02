<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>modelo</title>
</head>
<body>
<div>
    <?php
         $txt = "Caike e lindo demais";
        $nome = "     caike tadeus dos santos          ";
        $lorem = "Lorem ipsum dolor sit amet consectetur, adipisicing elit.";
        $letra = "c";
        $v = [10, 20, 30, 40];

        echo "Exemplos utilizados: <br>";
        echo "txt: ". $txt. "<br>";
        echo "nome: ". $nome. "<br>";
        echo "lorem: ". $lorem. "<br>";
        echo "letra: ". $letra. "<br>";
        echo "v: ". $v[0].", ". $v[1].", ". $v[2].", ". $v[3]. "<br><br><br>";

        echo "1. strtolowwer: ";
        echo "<pre>";
        echo strtolower($txt);
        echo "</pre>";
        echo "<br>";  

        echo "2. strtoupper: ";
        echo "<pre>";
        echo strtoupper($txt);
        echo "</pre>";
        echo "<br>";  

        echo "3. ucfirst: ";
        echo "<pre>";
        echo ucfirst($txt);
        echo "</pre>";
        echo "<br>";
        
        echo "4. ucwords: ";
        echo "<pre>";
        echo ucwords($nome);
        echo "</pre>";
        echo "<br>";

        echo "5. strrev: ";
        echo "<pre>";
        echo strrev($nome);
        echo "</pre>";
        echo "<br>";

        echo "6. str(i)pos: ";
        echo "<pre>";
        echo stripos($nome, "t");
        echo "</pre>";
        echo "<br>";
        
        echo "7. substr_count: ";
        echo "<pre>";
        echo substr_count($nome, "o");
        echo "</pre>";
        echo "<br>";

        echo "8. substr: ";
        echo "<pre>";
        echo substr($txt, 0, 5);
        echo "</pre>";
        echo "<br>";

        echo "9. str_pad: ";
        echo "<pre>";
        echo str_pad($letra, 5, "x", STR_PAD_RIGHT);
        echo "</pre>";
        echo "<br>";

        echo "10. str_repeat: ";
        echo "<pre>";
        echo str_repeat("eu", 5);
        echo "</pre>";
        echo "<br>";

        echo "11. str_(i)replace: ";
        echo "<pre>";
        echo str_ireplace("caike", "mayara", $nome);
        echo "</pre>";
        echo "<br>";





        
    ?>
</div>
</body>
</html>