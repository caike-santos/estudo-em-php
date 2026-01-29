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
        $nome = isset($_POST["nome"])?$_POST["nome"]:"Nome não informado";
        $ano = isset($_POST["ano"])?$_POST["ano"]:date("Y");
        $sexo = isset($_POST["sexo"])?$_POST["sexo"]:"indefinido";

        $idade = date("Y") - $ano;
        echo "$nome, $ano, $sexo, $idade";

     
    ?>  
     <button><a href="ler.html">Voltar</a></button>
</div>
</body>
</html>