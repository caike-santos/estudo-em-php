<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>modelo</title>
  <style>
    .red{
        color: red;
    }
    .yellow{
        color: yellow;
    }
    .green{
        color: green;
    }
  </style>
</head>
<body>
<div>
    <?php
        $n1 = filter_input(INPUT_GET, 'n1') ?? 0;
        $n2 = filter_input(INPUT_GET, 'n2') ?? 0;

        $m = ($n1+$n2)/2;

        echo "Sua media: $m <br>";

        if($m<4){
            echo"<span class='red'>Reprovado</span>";
        }elseif($m<6){
            echo"<span class='yellow'>Recuperaçao</span>";
        }else{
            echo"<span class='green'>Aprovado</span>";
        }
    ?>
    <br><button><a href="nota.html">Voltar</a></button>
</div>
</body>
</html>