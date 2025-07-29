<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="assets/js/script.js" defer></script>
    <title>Document</title>
</head>
<body>

    <div class="container">
        
        <h1 class="text-center">Super Gästebuch!</h1>

        <?php include_once $formtpl; ?>

        <div class="entries">
            <h3 class="text-center">Einträge</h3>

            <?php foreach($entries as $index => $entry) { 
                $bg = ($index % 2 == 0) ? "bg-light" : "bg-secondary bg-opacity-50";
                // Unäre Operatoren - mit nur einem Operanden -> $i++   !true  $i2 = +5;
                // Binären Operatoren - mit 2 Operanden - 5+5   4>5   $o = 5;
                // ternäre Operator - mit 3 Operanden - bzw Kurzschreibweise eines IFs
            ?>
            <article class="border p-3 rounded <?php echo $bg; ?> mb-2">
                <div>
                    Name: <?php echo $entry->getUsername() .'/ Betreff:'. $entry->getSubject(); ?>
                    
                </div>
                <div><?php echo $entry->getMsg(); ?></div>
                <hr />
                <a href="index.php?action=delete&index=<?php echo $index; ?>" class="btn btn-sm btn-danger">Löschen</a>
                <a href="index.php?action=update&index=<?php echo $index; ?>" class="btn btn-sm btn-warning">Bearbeiten</a>
            </article>
            <?php } ?>
        </div>

    </div>
    
</body>
</html>