<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'aura_beauty';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Pega o nome do cliente enviado pelo JS
    $cliente_nome = $_GET['cliente'] ?? '';

    if (empty($cliente_nome)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Utilizador não identificado.']);
        exit;
    }

    // Busca os agendamentos do cliente (ordenados do mais recente para o mais antigo)
    $stmt = $pdo->prepare("SELECT * FROM agendamentos WHERE cliente_nome = :cliente ORDER BY data_agendamento DESC, hora_agendamento DESC");
    $stmt->bindParam(':cliente', $cliente_nome);
    $stmt->execute();

    $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['sucesso' => true, 'dados' => $agendamentos]);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro: ' . $e->getMessage()]);
}
?>