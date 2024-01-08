<?php
include_once('conexao.php');
 
if (isset($_SESSION['id_barber'])) {
    $id_barbearia = $_SESSION['id_barber'];
} else if (isset($_GET['id'])) {
    // Função intval() para garantir que o ID seja um número inteiro
    $id_barbearia = intval($_GET['id']);
} else {
    // Lógica para lidar com a falta do parâmetro 'id' na URL ou da sessão
    echo "ID da barbearia não fornecido.";
    return;  // Você pode usar 'exit()' em vez de 'return' para encerrar completamente o script.
}

// Consulta SQL usando declaração preparada para evitar injeção de SQL
$sql = "SELECT * FROM barbearia WHERE id_barbearia = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_barbearia); // "i" indica que é um parâmetro inteiro
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $dados = $result->fetch_assoc();
    // Agora $dados contém os dados da barbearia com o ID fornecido
} else {
    // Lógica para lidar com a falta da barbearia com o ID fornecido
    echo "Barbearia não encontrada.";
}

$stmt->close(); // Fechar a declaração preparada
?>
