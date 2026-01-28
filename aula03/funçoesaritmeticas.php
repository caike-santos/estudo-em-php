<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>funçoes aritmeticas</title>
</head>
<body>
<div>
       <?php
        $n1 = $_GET["a"];
        $n2 = $_GET["b"];

        echo "<h1>Funções Aritmeticas</h1><br>";
        echo "<h4>Números Recebidos: n1 = $n1 e n2 = $n2</h4><br>";
        echo "Valor absoluto de <b>$n2</b> = ". abs($n2). "<br>";
        echo "Potenciação de <b>$n2 <sup>$n1</sup></b> = ". pow($n2, $n1). "<br>";
        echo "Raiz quadrada de <b>". abs($n2). "</b> = ". sqrt(abs($n2)). "<br>";
        echo "<b>".($n1/$n2)."</b> arredondado = ". round($n1/$n2). "<br>";
        echo "Valor inteiro de <b>". ($n2/$n1). "</b> = ". intval($n2/$n1). "<br>";
        echo "Formatando <b>". ($n1/$n2). "</b> fica = ". number_format($n1/$n2, 2, ",");
    ?>
</div>
</body>
</html>