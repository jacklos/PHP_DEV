<h3>Detailansicht</h3>
<p>Titel: <?php echo $snippet->getTitle(); ?></p>
<p>Beschreibung: <?php echo $snippet->getDescription(); ?></p>
<p>Sprache: <?php echo $snippet->getLanguage(); ?></p>
<p>Tags: <?php echo $snippet->getTags(); ?></p>
<p>Erstellt: <?php echo $snippet->getCreatedAtFormatted("d.m.Y H:i:s"); echo ' | '.$snippet->getUpdatedAt() ?? '';?></p>
<p>Erstellt von: <?php echo $snippet->getUser()->getUsername(); ?> </p>
<p>Code: 
    <pre>
        <code>
            <?php echo $snippet->getCode(); ?>
    </code>
    </pre>
</p>