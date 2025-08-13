<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <nav>
            <ul>
                <li><a href="index.php"><strong>Super Snippet</strong></a></li>
            </ul>
            <ul>
                <li><a href="index.php">Start</a></li>
                <li><a href="index.php?action=register">Registrieren</a></li>
                <?php if(isset($_SESSION['user'])) { ?>
                    <li><a href="index.php?action=logout">Logout</a></li>
                <?php } else { ?>
                <li><a href="index.php?action=login">Login</a></li>
                <?php } ?>
            </ul>
        </nav>

        <main>
            <?php
                if(isset($tpl)) {  // $tpl wird in den Controllerklassen definiert
                    include $tpl;
                }
            ?>
        </main>


    </div>
    
</body>
</html>