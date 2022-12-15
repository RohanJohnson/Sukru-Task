<?php

require "includes/init.php";
require "includes/database.php";

$email;
$username;
$password;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = getDB();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($email != null and $username != null and $password != null){

    $sql = "INSERT INTO user (email, username, password) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {

        echo mysqli_error($conn);

    } else {

        mysqli_stmt_bind_param($stmt, "sss", $email, $username, $password);

        if (mysqli_stmt_execute($stmt)) {

            $id = mysqli_insert_id($conn);

            Url::redirect("/SukruChallenge/index.php");

        } else {

            echo mysqli_stmt_error($stmt);

        }
    }
}
}


?>

<?php require "header.php"; ?>

<form method="post">

    <div>
        <input name="email" id="email" placeholder="Email Address">
    </div>

    <div>
        <input name="username" id="username" placeholder="Username">
    </div>

    <div>
        <input name="password" id="password" placeholder="Password" type="password">
    </div>

    <button>Sign up</button>

</form>


<?php require "footer.php"; ?>