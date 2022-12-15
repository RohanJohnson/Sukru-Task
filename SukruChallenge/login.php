<?php
require "includes/init.php";
require "includes/database.php";

$user;
$pass;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = getDB();
    $user = $_POST['username'];
    $pass = $_POST['password'];
    //connect to db

    if ($user != null && $pass != null) {
        //     $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$user'");

        $numrows = mysqli_num_rows($query);

        if ($numrows != 0) {
            //while loop
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row['username'];
                $dbpassword = $row['password'];

                // var_dump($user);
                // var_dump($pass);
                // var_dump($dbusername);
                // var_dump($dbpassword);
                if ($user == $dbusername && password_verify($pass, $dbpassword)) {
                    session_regenerate_id(true);
                    echo "yer";

                    $_SESSION['is_logged_in'] = true;

                    Url::redirect('/SukruChallenge');

                } else {
                    $error = "login incorrect";
                }
            }
        }
    }
}


?>

<?php require 'header.php'; ?>
<h2>Login</h2>
<?php if (!empty($error)): ?>

<p>
    <?= $error ?>
</p>

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