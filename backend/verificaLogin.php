<?php
    // Inicia a sessão se não estiver iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['email'])) {
        // Sessão não iniciada ou 'email' não definido, redirecione para a página de login
        header('Location: ./login.php');
        exit();
    }