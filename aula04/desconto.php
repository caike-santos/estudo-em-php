<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>aplicar desconto</title>
</head>
<body>
<div>
    <?php
        $v = $_GET["a"];

        echo "Valor sem desconto: $v<br>";
        echo "Valor com 10% de desconto: ". ($v *= 0.9);
    ?>
</div>
</body>
</html>