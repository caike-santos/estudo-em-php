<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>soma ou multiplicaçao</title>
</head>
<body>
<div>
    <?php
        $p = $_GET["p"];
        $n1 = $_GET["a"];
        $n2 = $_GET["b"];
        
        $r = ($p == "s")?($n1+$n2):($n1*$n2);
        echo  $p == "s"?"Soma foi escolhido":"Multiplicaçao foi escolhido";
        echo "<br>". $r;
    ?>
</div>
</body>
</html>