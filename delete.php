<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if (!$id || $id < 1) {
        exit('Invalid user ID');
    }

    if ($id === (int) $_SESSION['id']) {
        
        echo 'You cannot delete your own account';
        exit;
    }

    $stmt = $pdo->prepare(
        "DELETE FROM users WHERE id = ?"
    );

    $stmt->execute([$id]);

    header('Location: users.php');
    exit;
}