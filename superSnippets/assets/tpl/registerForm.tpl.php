<h2>Registrierung</h2>
<form action="index.php?action=regUser" method="POST">
    <input type="text" name="username" placeholder="Benutzername">
    <input type="email" name="email" placeholder="E-Mail">
    <input type="password" name="password" placeholder="Passwort">
    <input type="password" name="passwordRepeat" placeholder="Passwort wiederholen">
    <input type="hidden" name="agbOk" value="false" />
    <label><input type="checkbox" name="agbOk"><a href="#">AGB</a> und <a href="#">Datenschutz</a> gelesen und akzeptiert</label>
    <button type="submit">Registrieren</button>
</form>