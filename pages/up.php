<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ottieni i dati dal form
        $username = trim($_POST['username']);
        $dato = $_POST['dato'];  // Nome del dato da aggiornare
        $new_value = trim($_POST['new_value']);  // Nuovo valore da aggiornare
        
        // Esegui operazioni basate sul tipo di dato da aggiornare
        if ($dato == "nome") {
            // Esegui l'aggiornamento del nome
            // Query SQL di aggiornamento del nome
            // Esempio:
            // $stmt = $conn->prepare("UPDATE utenti SET nome = ? WHERE username = ?");
            // $stmt->bind_param("ss", $new_value, $username);
            // $stmt->execute();
        } elseif ($dato == "password") {
            // Esegui l'aggiornamento della password (con hash)
            $password_hash = password_hash($new_value, PASSWORD_BCRYPT);
            // Query SQL di aggiornamento della password
        } elseif ($dato == "cognome") {
            // Esegui l'aggiornamento del cognome
        } elseif ($dato == "username") {
            // Esegui l'aggiornamento dello username
        } elseif ($dato == "tipo") {
            // Esegui l'aggiornamento del tipo (ad esempio persona, organizzazione, admin)
        }

    }
?>
