<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST["id"] ?? '';
    $pergunta = $_POST["pergunta"] ?? '';
    $resposta = $_POST["resposta"] ?? '';

    if(empty($id) || empty($pergunta) || empty($resposta)) {
        echo json_encode(["sucesso" => false, "mensagem" => "Todos os campos são obrigatórios."]);
        exit;
    }

    $id = str_replace(["\r", "\n", ";"], "", $id);
    $pergunta = str_replace(["\r", "\n", ";"], "", $pergunta);
    $resposta = str_replace(["\r", "\n", ";"], "", $resposta);

    $arquivo = "perguntasTexto.txt";

    if(!file_exists($arquivo)){
        $arqPerguntas = fopen($arquivo, "w");
        if($arqPerguntas) {
            $linha = "Id;Pergunta;Resposta\n";
            fwrite($arqPerguntas, $linha);
            fclose($arqPerguntas);
        } else {
            echo json_encode(["sucesso" => false, "mensagem" => "Erro de permissão ao criar o arquivo."]);
            exit;
        }
    }

    $arqPerguntas = fopen($arquivo, "a");
    if($arqPerguntas) {
        $linha = "$id;$pergunta;$resposta\n";
        fwrite($arqPerguntas, $linha);
        fclose($arqPerguntas);
        
        echo json_encode(["sucesso" => true, "mensagem" => "Pergunta criada com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => false, "mensagem" => "Erro ao abrir o arquivo para gravação."]);
    }

} else {
    echo json_encode(["sucesso" => false, "mensagem" => "Método inválido."]);
}
?>