<?php require("functions/functions.php")?>
<?php require("header.php")?>
<a href="admin.php">Admin</a>
<a href="unit.php">Unit</a>
<a href="excecutor.php">Excecutor</a>
<h2>Login</h2>
<form action="index.php">
    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <td><label for="username">username:</label></td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td><label for="password">password:</label></td>
            <td><input type="text" name="password" id="password"></td>
        </tr>
    </table>
    <tr>
        <button type="submit">Login</button>
    </tr>
</form>
<?php require("footer.php")?>