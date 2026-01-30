<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>modelo</title>
</head>
<body>
<div>
  <form action='contagem.php' method='get'>
    <?php
    $c = 1;
    while($c<=5){
      echo "
        <label for='iv'>Valor $c:</label>
        <input type='number' name='v$c' id='iv'>
        <br>";

        $c++;
    }
    
    ?>
    <input type='submit' value='Ver'>
</form>
    
    
</div>
</body>
</html>