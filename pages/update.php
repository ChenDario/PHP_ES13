<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <script>
        function handleSelectionChange() {
            var selectDato = document.getElementById('dato');
            var selectedValue = selectDato.value;
            var newValueContainer = document.getElementById('new_value_container');

            // Mostra l'input o il select a seconda del tipo selezionato
            if (selectedValue === 'tipo') {
                // Crea un nuovo select per il tipo
                newValueContainer.innerHTML = `
                    <label for="new_value">Nuovo Tipo:</label>
                    <select name="new_value" id="new_value">
                        <option value="persona">Persona</option>
                        <option value="organizzazione">Organizzazione</option>
                        <option value="admin">Admin</option>
                    </select>
                `;
            } else {
                // Mostra un input per il dato
                newValueContainer.innerHTML = `
                    <label for="new_value">Nuovo ${selectedValue}:</label>
                    <input type="text" name="new_value" id="new_value" placeholder="Inserisci..." required>
                `;
            }
        }
    </script>
</head>
<body>
    <div>
        <form action="up.php" method="POST">
            <label for="username">Username Utente Da Aggiornare</label>
            <input type="text" name="username" placeholder="Utente Da Aggiornare...">

            <select name="dato" id="dato">
                <option value="nome">Nome</option>
                <option value="password">Password</option>
                <option value="cognome">Cognome</option>
                <option value="username">Username</option>
                <option value="tipo">Tipo</option>
            </select>

                <!-- Contenitore per il nuovo campo di input o select -->
                <div id="new_value_container">
                <!-- Qui verrà aggiunto dinamicamente il campo di input o select -->
                </div>

                <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>