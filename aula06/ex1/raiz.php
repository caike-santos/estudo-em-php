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
        $valor = isset($_GET["v"])?$_GET["v"]:-1;

        echo sqrt($valor)."<br>";
    ?>
    <button><a href="quadrada.html">Voltar</a></button>
</div>
</body>
</html>