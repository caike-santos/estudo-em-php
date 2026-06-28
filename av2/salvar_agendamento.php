<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'aura_beauty';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe os dados em formato JSON enviados pelo JS
    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);

    if (!$dados) {
        throw new Exception("Nenhum dado recebido.");
    }

    // Prepara a inserção no banco (Agora com o presenteado_nome)
    $sql = "INSERT INTO agendamentos (cliente_nome, presenteado_nome, servicos_nomes, profissional, data_agendamento, hora_agendamento, valor_total, duracao_total, forma_pagamento) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $dados['cliente_nome'],
        $dados['presenteado_nome'] ?? null, // Salva o nome se existir, senão salva null
        $dados['servicos_nomes'],
        $dados['profissional'],
        $dados['data'],
        $dados['hora'],
        $dados['valor_total'],
        $dados['duracao_total'],
        $dados['forma_pagamento']
    ]);

    echo json_encode(['sucesso' => true, 'mensagem' => 'Agendamento salvo com sucesso!']);

} catch (Exception $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro: ' . $e->getMessage()]);
}
?>