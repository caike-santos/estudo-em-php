<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'aura_beauty';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca todos os serviços
    $stmt = $pdo->query("SELECT * FROM servicos ORDER BY nome ASC");
    $servicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['sucesso' => true, 'dados' => $servicos]);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao buscar serviços: ' . $e->getMessage()]);
}
?>