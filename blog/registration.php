<?php
session_start();
//Check if auth cookie is already set
if(isset($_COOKIE['auth'])){
    //Connect with database
    $conn = mysqli_connect("localhost", "root", "root", "users");

    // Destroy if not possible to create a connection
    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
    }
    //Check if user with session id value from cookie exist in database
    $selectUserStatement = $connection->prepare('SELECT * FROM users WHERE session_id = :sessionId');
    $selectUserStatement->bindParam('sessionId',$_COOKIE['auth']);
    $selectUserStatement->setFetchMode(PDO::FETCH_ASSOC);
    $selectUserStatement->execute();

    $user = $selectUserStatement->fetch();

    //User already exists & is logged in redirect to dashboard
    if($user) {
        header('Location: blog/index.php');
        die;
    }
}

//Show registration page
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h1>REGISTRATION</h1>
<?php if (isset($_SESSION['feedback'])): ?>
    <p><?=$_SESSION['feedback']?></p>
<?php endif; ?>
<form method="post" action="registration-action.php">
    <label for="email">E-mail</label><br>
    <input type="email" name="email" id="email" required><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br>

    <label for="password-repeat">Password Repeat</label><br>
    <input type="password" name="password-repeat" id="password-repeat" required><br>

    <button>Register</button>
    <a href="login.php">already own an account</a>
</form>
</body>
</html>