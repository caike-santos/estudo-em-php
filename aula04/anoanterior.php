<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>Ano anterior</title>
</head>
<body>
<div>
    <?php
        $ano = $_GET["a"];

        echo "Ano atual: ". $ano--. "<br>";
        echo "Ano anterior: $ano <br>";
        echo "Ano posterior: ". ($ano += 2);

    ?>
</div>
</body>
</html>