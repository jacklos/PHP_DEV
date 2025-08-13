<h2>Login</h2>
<form action="./index.php?action=loginUser" method="post">
    <input type="text" name="username" placeholder="Benutzername" id="username">
    <input type="password" name="password" placeholder="Passwort" id="password">
    <button>Login</button>
    <?php if(isset($get['error'])) {?>
    <p style="color: red; margin-top: 1rem;">Benutzername oder Passwort waren falsch!</p>
    <?php } ?>
</form>