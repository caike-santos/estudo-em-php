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
        $pessoa = "altura";
        $$pessoa = 1.83;

        echo "A $pessoa é de $altura metros";#ou $$pessoa, mas n pode estar dentro das aspas
    ?>
</div>
</body>
</html>