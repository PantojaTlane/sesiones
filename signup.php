<?php

include 'database.php';

$message = "";

if((!empty($_POST["email"]))&&(!empty($_POST["password"]))){
    $email = $_POST["email"];
    $password = password_hash($_POST["password"],PASSWORD_BCRYPT);

    $query = "INSERT INTO users(email,password) VALUES('$email','$password')";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
    if(!$result){
        $message = "Error al registrarse";
    }else{
        $message = "Registro realizado";
    }
}

?>

<?php include 'partials/header.php'; ?>
    <h1>Signup</h1>
    <span>or <a href="login.php">Login</a></span>
    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif;?>
    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="confirm_password" placeholder="Confirm your password">
        <button type="submit">Send</button>
    </form>
<?php include 'partials/footer.php'; ?>