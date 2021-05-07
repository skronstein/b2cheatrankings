<?php
if(isset($_SESSION['isLoggedIn'])) {
    echo "Already logged in";
} else {
    $loginForm = <<<THEFORM

    <p>Login</p>
<form method="post" action="login-response.php">
    <input type="text" name="userName" id='username'>
    <input type="password" name="password">
    <input type="submit">
</form>
<script>document.getElementById('username').focus()</script>

THEFORM;

    echo $loginForm;
    if(isset($_GET['badCredentials'])) echo "Incorrect username or password.";
}
?>