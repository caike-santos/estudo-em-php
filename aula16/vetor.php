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
        $v1 = [1, 2, 3, 4];

        $v2 = range(1, 10, 1);

        $v3 = [1 => "A", 3 => "B", 6 => "D"];

        $v4 = ["nome" => "Caike", "idade" => 19, "altura" => 1.83];

        $m = [[2, 3], [5, 8], [7, 6]];

        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>";

        foreach($v2 as $valor){
            echo "$valor, ";
        }
        echo "<br>";

        foreach($v3 as $campo => $valor){
            echo "$campo => $valor, <br>";
        }

        foreach($v4 as $campo => $valor){
            echo "$campo => $valor, <br>";
        }
       
        var_dump($m);
       
    ?>
    
</div>
</body>
</html>