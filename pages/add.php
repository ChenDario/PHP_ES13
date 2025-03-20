<?php
    include "db.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanificazione e validazione dei dati
        $nome = trim($_POST['nome']);
        $cognome = trim($_POST['cognome']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $tipo = trim($_POST['tipo']);

        // Hash della password prima di inserirla nel database
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Preparazione della query per l'inserimento nel database
        $stmt = $conn->prepare("INSERT INTO utenti (nome, cognome, username, password_hash, tipo) VALUES (?, ?, ?, ?, ?)");
        
        // Binding dei parametri
        $stmt->bind_param("sssss", $nome, $cognome, $username, $password_hash, $tipo);

        // Esecuzione della query
        if ($stmt->execute()) {
            $_SESSION['message'] = "Utente registrato con successo!";
            header("Location: ../index.php"); // Reindirizzamento a una pagina di successo
            exit;
        } else {
            $_SESSION['message'] = "Errore durante la registrazione dell'utente.";
            header("Location: ../index.php"); // Pagina di errore
            exit;
        }
    }
?>
