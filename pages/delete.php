<?php
    include "db.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanificazione e validazione dei dati
        $nome = trim($_POST['nome']);
        $cognome = trim($_POST['cognome']);
        $username = trim($_POST['username']);

        // Preparazione della query per l'inserimento nel database
        $stmt = $conn->prepare("DELETE FROM utenti WHERE nome = ? AND cognome = ? AND username = ?");
        
        // Binding dei parametri
        $stmt->bind_param("sss", $nome, $cognome, $username);

        // Esecuzione della query
        if ($stmt->execute()) {
            $_SESSION['message'] = "Utente eliminato con successo!";
            header("Location: ../index.php"); // Reindirizzamento a una pagina di successo
            exit;
        } else {
            $_SESSION['message'] = "Errore durante l'eliminazione dell'utente.";
            header("Location: ../index.php"); // Pagina di errore
            exit;
        }
    }
?>