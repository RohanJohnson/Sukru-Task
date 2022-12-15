<?php
require "includes/init.php";
require "includes/database.php";


$conn = getDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$sql = "SELECT username FROM user ORDER BY id";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

foreach($users as $user){
    
if ($_POST['username'] == $user['username'] && password_hash($_POST['password'], PASSWORD_DEFAULT) == $user['password'])
{

session_regenerate_id(true);

$_SESSION['is_logged_in'] = true;

Url::redirect('/SukruChallenge');

} else {
$error = "login incorrect";
}
}
}
?>

<?php require 'header.php'; ?>
<h2>Login</h2>
<?php if (! empty($error)) : ?>

<p><?= $error ?></p>

<?php endif; ?>
<form method="post">
<div>

<label for="username">Username</label>

<input name="username" id="username">

</div>
<div>

<label for="password">Password</label>

<input type="password" name="password" id="password">

</div>
<button>Log in</button>
</form>

<?php require "footer.php"; ?>