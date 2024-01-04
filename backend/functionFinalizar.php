<?php

//Buscar as informações do item selecionado
// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    $id_item = intval($_GET['id']);

    // Consulta SQL

    $sql = "SELECT item.*, categoria.nome_categoria AS nome_categoria, barbearia.nome_fantasia AS nome_fantasia,
        barbearia.rua, barbearia.bairro, barbearia.cidade, barbearia.numero, barbearia.uf
        FROM item
        JOIN categoria ON item.id_categoria = categoria.id_categoria
        JOIN barbearia ON item.id_barbearia = barbearia.id_barbearia
        WHERE item.id_item = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_item);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
    } else {
        echo "Item não encontrado.";
    }

    $stmt->close();
} else {
    // Falta do parâmetro 'id' na URL
    echo $id_item;
    echo "ID do item não fornecido.";
}
