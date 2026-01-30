<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>modelo</title>
</head>
<body>
<div>
    <?php

        $c = 1;

        while($c<=5){
          $v = "num".$c;
          $r = "v".$c;
          $$v = filter_input(INPUT_GET, $r) ?? 0;
          $c++;
        }

        $c = 1;

        while($c<=5){
          $r = "num".$c;
          echo "Valor $c:". $$r. "<br>";
          $c++;
        }
    ?>
    <button><a href="mostrar.php">Voltar</a></button>
</div>
</body>
</html>