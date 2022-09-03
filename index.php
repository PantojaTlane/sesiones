<?php

session_start();

include 'database.php';

$user =  null;

if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
    $row  = mysqli_fetch_array($result);
    $user = $row;
}

?>

<?php include 'partials/header.php'; ?>

    <?php if(!empty($user)): ?>
        <br>Welcome.<?= $user["email"] ?>
        <br>Tu has iniciado sesion
        <a href="logout.php">Log Out</a>
    <?php else: ?>
        <h1>Please Login or SignUp</h1>
        <a href="login.php">Login</a> or
        <a href="signup.php">Signup</a>
    <?php endif; ?>

<?php include 'partials/footer.php'; ?>