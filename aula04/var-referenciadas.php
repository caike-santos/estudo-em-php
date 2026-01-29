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
        $n1 = $_GET["a"];
        $n2 = &$n1;

        echo "Valor atual de n1: $n1<br>";
        echo "Valor atual de n2: $n2<br>";
        $n2++;
        echo "Valor atual de n2: $n2<br>";
        echo "Valor de n1 depois de somar 1 em n2: $n1<br>";
        
    ?>
</div>
</body>
</html>