<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>Votar</title>
</head>
<body>
<div>
    <?php
        $i = $_GET["a"];

        echo $i<60 && $i>18?"Obrigatorio":"Facultativo";
    ?>
</div>
</body>
</html>