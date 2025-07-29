<h3>Update</h3>
<form class="entryForm" action="index.php?action=updateSave" method="POST" class="col-sm-6 offset-sm-3" >
    <input type="hidden" name="index" value="<?php echo $_GET['index']; ?>">
    <div class="mb-2"><input value="<?php echo $entries[$_GET['index']]->getUsername(); ?>" class="form-control" type="text" name="username" placeholder="Name" /></div>
    <div class="mb-2"><input value="<?php echo $entries[$_GET['index']]->getSubject(); ?>" class="form-control" type="text" name="subject" placeholder="Betreff" /></div>
    <div class="mb-2"><textarea class="form-control" name="msg" placeholder="Nachricht..."><?php echo $entries[$_GET['index']]->getMsg(); ?></textarea></div>
    <div>
        <button class="btn btn-primary" type="submit">Senden</button>
        <!--input type="submit" value="Senden" placeholder="senden" /-->
    </div>
</form>