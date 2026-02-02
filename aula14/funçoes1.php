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

        echo "1. print_r: ";
        echo "<pre>";
        print_r($v);
        echo "</pre>";
        echo "<br>";


        echo "2. wordwrap: <br>";
        echo "<pre>";
        echo wordwrap($lorem, 5, "<br/>\n", false);
        echo "</pre>" . "<br><br><br>";


        echo "3. trim: ";
        echo "<pre>";
        echo trim($nome);
        echo "</pre>" . "<br><br><br>";


        echo "4.0 str_word_count: ";
        echo "<pre>";
        echo str_word_count($txt, 0);
        echo "</pre>" . "<br><br><br>";


        echo "4.1 str_word_count: ";
        echo "<pre>";
        print_r(str_word_count($txt, 1,));
        echo "</pre>" . "<br><br><br>";

        
        echo "4.2 str_word_count: ";
        echo "<pre>";
        print_r(str_word_count($txt, 2,));
        echo "</pre>" . "<br><br><br>";

        echo "5. explode: ";
        echo "<pre>";
        print_r(explode(" ", $lorem));
        echo "</pre>" . "<br><br><br>";

        echo "6. str_split: ";
        echo "<pre>";
        print_r(str_split( $txt));
        echo "</pre>" . "<br><br><br>";

        echo "7. implode: ";
        echo "<pre>";
        echo implode(",",$v);
        echo "</pre>" . "<br><br><br>";

        echo "8. chr: ";
        echo "<pre>";
        echo chr(67);
        echo "</pre>" . "<br><br><br>";

        echo "9. ord: ";
        echo "<pre>";
        echo ord("C");
        echo "</pre>" . "<br><br><br>";


    ?>
</div>
</body>
</html>