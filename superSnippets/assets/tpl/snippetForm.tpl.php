<h2>new Snippet</h2>
<form action="index.php?action=saveSnippet" method="post">
    <div><input type="text" name="title" placeholder="Titel" value="<?php echo isset($snippet) ? $snippet->getTitle() : ''; ?>" /></div>
    <div><input type="text" name="description" placeholder="Beschreibung" value="<?php echo isset($snippet) ? $snippet->getDescription() : ''; ?>" /></div>
    <div><textarea name="code" rows="10" placeholder="Code"><?php echo isset($snippet) ? $snippet->getCode() : ''; ?></textarea></div>
    <div>
        <select name="language">
            <option>PHP</option>
            <option>HTML</option>
            <option>JS</option>
            <option>CSS</option>
            <option>JAVA</option>
            <option>C++</option>
            <option>C#</option>
            <option>Pseudocode</option>
        </select>
    </div>
    
    <?php echo isset($snippet) ? '<input type="hidden" name="id" value="'.$snippet->getId().'">' : ''; ?>
    <div><input type="text" name="tags" placeholder="login, userverwaltung, singleton..." value="<?php echo isset($snippet) ? $snippet->getTags() : ''; ?>"></div>
    <div><button type="submit">Senden</button></div>
</form>