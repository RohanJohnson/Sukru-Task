<?php
require "includes/init.php";

if (isset($_POST['signup'])) {
  Url::redirect("/SukruChallenge/signup.php");
}


if (isset($_POST['login'])) {
    Url::redirect("/SukruChallenge/login.php");
}
?>

<?php require "header.php"; ?>

<head>
    <title>Main Page</title>
</head>

<body>
    <header>
        <h1>Title</h1>
    </header>

    <form method="post">
        <input type="submit" name="signup" value="Sign Up" />
    </form>
    <form method="post">
        <input type="submit" name="login" value="Log in" />
    </form>

    <?php require "footer.php"; ?>