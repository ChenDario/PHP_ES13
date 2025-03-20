<?php
    session_start();
    include "pages/db.php";
    if (isset($_SESSION['message'])) {
        echo "<script>alert('".$_SESSION['error_message']."');</script>";
        unset($_SESSION['message']); // Pulisce il messaggio dopo che è stato visualizzato
    }

    $stmt = $conn -> prepare("SELECT id_utente AS id, nome, cognome, username, tipo FROM utenti");
    $stmt->execute();
    $result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP ES13 </title>
</head>
<body>
    <h1 id="title"> PHP ES 13 </h1>

    <div class="form">
        <form action="pages/edit.php" method="post">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Username</th>
                    <th>Tipo</th>
                </tr>
                <?php
                    while($row = $result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['cognome']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['tipo']}</td>
                            </tr>
                        ";
                    }
                ?>
            </table>

            <select name="edit" id="edit">
                <option value="delete">Delete User</option>
                <option value="update">Update User</option>
                <option value="add">Add User</option>
            </select>
            
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>