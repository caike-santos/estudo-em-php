<!DOCTYPE html>
<html>
<head>
    <?php
        $texto = isset($_GET["texto"])?$_GET["texto"]:"Texto nao informado";
        $tam = isset($_GET["tam"])?$_GET["tam"]:"16px";
        $cor = isset($_GET["cor"])?$_GET["cor"]:"#000000";
        ?>
  <link rel="stylesheet" href="../../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>modelo</title>
  <style>
    span{
        display: block;
        
        font-size: <?php echo $tam; ?>;
        color: <?php echo $cor; ?>;
    }
  </style>
</head>
<body>
<div>
    <?php
        echo"<span>$texto</span>";
    ?>
    <br><button><a href="texto.html">Voltar</a></button>
</div>
</body>
</html>