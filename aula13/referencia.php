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
        function ref(&$a){
            $a += 2;
            return $a;
        }
        $a =4;
        echo ref($a)."<br>";
        echo $a;
        
    ?>
</div>
</body>
</html>