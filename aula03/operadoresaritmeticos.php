<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>operadores aritmeticos</title>
</head>
<body>
<div>
    <?php
        $n1 = $_GET["a"];
        $n2 = $_GET["b"];

        echo "<h1>Operadores Logicos</h1><br>";
        echo "<h4>Números recebidos: n1 = $n1 e n2 = $n2</h4><br>";
        echo "Soma: $n1 + $n2 = ". ($n1 + $n2). "<br>";
        echo "Subtração : $n1 - $n2 = ". ($n1 - $n2). "<br>";
        echo "Multiplicação: $n1 x $n2 = ". ($n1 * $n2). "<br>";
        echo "Divisão: $n1 / $n2 = ".($n1 / $n2). "<br>";
        
    ?>
</div>
</body>
</html>