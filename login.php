<?php 
    $title = 'User Login';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    // If data was submitted via a form request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $user->getUser($username, $new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header("Location: viewrecords.php");

        }
    }

?>

<div class="login-card shadow p-3 mb-5 bg-white rounded">
    <div>
        <h2 class="text-center"><?php echo $title ?></h2>
    </div>
        
    <img class="img-fluid profile-img-card" src="images/lock.png">
        
    <p class="profile-name-card"> </p>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <p>
            <input type="text" name="username" class="form-control" id="username" required="" placeholder="Username" autofocus="" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
            <?php if(empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>"; ?>
        </p> 
        <p>
            <input type="password" name="password" class="form-control" id="password" name="password" required="" placeholder="Password">
            
        </p>
        <p>
            <?php if(empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>"; ?>
        </p>
        <input type="submit" value="LOGIN" class="btn btn-primary btn-block">
        <a class="forgot-password" href="#">Forgot password?</a>
    </form>       
</div>

<?php 
    include_once 'includes/footer.php';
?>