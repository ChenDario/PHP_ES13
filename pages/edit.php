<?php
    session_start();

    include "db.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $page = "";
        if (isset($_POST['edit'])) {
            $edit = trim($_POST['edit']);

            switch ($edit) {
                case 'add':
                    $page = "add.php";
                    break;

                case 'update':
                    header("Location: update.php");
                    break;

                case 'delete':
                    $page = "delete.php";
                    break;

                default:
                    $_SESSION['error_message'] = "Operazione non valida.";
                    header("Location: ../index.php");
                    exit;
            }
        } else {
            $_SESSION['error_message'] = "Nessuna operazione specificata.";
            header("Location: ../index.php");
            exit;
        }
    } else{
        //Controllo Presenza Artisti
        $_SESSION['error_message'] = "Nome o Cognome erratto.";
        header("Location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP ES13 </title>
</head>
<body>
    <h1 id="title"> Pagina di Login </h1>

    <div class="form">
        <form action="<?php echo $page; ?>" method="post">

            <label for="username">Username</label>
            <input type="text" placeholder="Username..." name="username" required>

            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome..." name="nome" required>

            <label for="cognome">Cognome</label>
            <input type="text" placeholder="Cognome..." name="cognome" required>

            <?php
                if (isset($_SESSION['edit']) && $_SESSION['edit'] == 'add') {
                    echo '
                        <label for="password">Password</label>
                        <input type="password" placeholder="Password..." name="password" required>

                        <select name="tipo" id="tipo">
                            <option value="persona">Persona</option>
                            <option value="organizzazione">Organizzazione</option>
                            <option value="admin">Admin</option>
                        </select>
                    ';
                }
            ?>
            <input type="submit" value="Edit">
        </form>
    </div>

</body>
</html>