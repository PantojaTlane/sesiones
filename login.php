<?php

session_start();

if(isset($_SESSION["user_id"])){
    header("Location: /curso-php/sesion_3");
}

include 'database.php';

$message = "";

if((!empty($_POST["email"]))&&(!empty($_POST["password"]))){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        if(password_verify($password,$row["password"])){
            $_SESSION["user_id"] = $row["id"];
            header("Location: /curso-php/sesion_3");
        }else{
            $message = "Contraseña incorrecta";
        }
    }else{
        $message = "No existe ese correo";
    }
}

?>

<?php include 'partials/header.php'; ?>
    <h1>Login</h1>
    <span>or <a href="signup.php">Signup</a></span>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <button type="submit">Send</button>
    </form>
<?php include 'partials/footer.php'; ?>