<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>media</title>
</head>
<body>
<div>
    <?php
        $m1 = $_GET["a"];
        $m2 = $_GET["b"];
        echo "Media: ". ($m1+$m2)/2 . "<br>";
        echo ($m1+$m2)/2 < 6? "Reprovado":"Aprovado";
    ?>
</div>
</body>
</html>