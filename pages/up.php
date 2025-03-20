<?php
    include "db.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ottieni i dati dal form
        $username = trim($_POST['username']);
        $dato = $_POST['dato'];  // Nome del dato da aggiornare
        $new_value = trim($_POST['new_value']);  // Nuovo valore da aggiornare
    
        $column = "";
        $value = $new_value;
    
        // Esegui operazioni basate sul tipo di dato da aggiornare
        if ($dato == "nome") {
            $column = "nome";
        } elseif ($dato == "password") {
            $column = "password";
            $value = password_hash($new_value, PASSWORD_BCRYPT);
        } elseif ($dato == "cognome") {
            $column = "cognome";
        } elseif ($dato == "username") {
            $column = "username";
        } elseif ($dato == "tipo") {
            $column = "tipo";
        }
    
        if (!empty($column)) {
            // Costruisci la query dinamicamente
            $sql = "UPDATE utenti SET $column = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $value, $username);
    
            if ($stmt->execute()) {
                $_SESSION['message'] = "AGGIORNAMENTO DATI RIUSCITO";
            } else {
                $_SESSION['message'] = "FALLITO: " . $stmt->error;
            }
    
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['message'] = "DATO NON VALIDO";
            header("Location: ../index.php");
            exit;
        }
    }
?>
