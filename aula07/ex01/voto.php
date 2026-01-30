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
        $ano = filter_input(INPUT_POST,'ano') ?? 1900;

        $idade = date("Y") - $ano;

        if(($idade>=16 && $idade<18)){
            $v = "pode votar";
            $d = "nao pode dirigir";
        }elseif($idade<16){
            $v = "nao pode votar";
            $d = "nao pode dirigir";
        }else{
            $v = "pode votar";
            $d = "pode dirigir";
        }

        echo"Sua idade é de $idade ano(s)<br>";
        echo "Voce $v e $d";
    ?>
    <button><a href="ano.html">Voltar</a></button>
</div>
</body>
</html>