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
        $dias = $_GET["dias"] ?? 1;

        switch ($dias){
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                echo "Dia de ir pra faculdade";
                break;
            case 1:
            case 7:
                echo "Dia de nao ir pra faculdade";        

        }
    ?>
    <button><a href="dia.html">Voltar</a></button>
</div>
</body>
</html>