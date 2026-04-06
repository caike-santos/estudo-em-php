
<?php
    // $msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $msg = "";
    echo "nome: " . $nome . " matricula: ". $matricula . " email: " . $email;
   if (!file_exists("alunos.txt")) {
       $arqDisc = fopen("alunos.txt","w") or die("erro ao criar arquivo");
       $linha = "nome;matricula;email\n";
       fwrite($arqDisc,$linha);
       fclose($arqDisc);
   }
   $arqDisc = fopen("alunos.txt","a") or die("erro ao criar arquivo");

    $linha = $nome . ";" . $matricula . ";" . $email . "\n";
    fwrite($arqDisc,$linha);
    fclose($arqDisc);
    $msg = "Deu tudo certo!!!";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Criar Nova Disciplina</h1>
<form action="incluirAluno.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    matricula: <input type="number" name="matricula">
    <br><br>
    email: <input type="email" name="email">
    <br><br>
    <input type="submit" value="Incluir Novo Aluno">
</form>

<form action="procurarAluno.php" method="post">
    <fieldset>
        <legend>Procurar Aluno</legend>
        <label for="imat">Matricula</label>
        <input type="number" name="mat" id="imat">
        <input type="submit" value="Procurar">
    </fieldset> 
</form>



<br>
</body>
</html>