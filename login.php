<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Fashion Hub</title>
    <link rel="stylesheet" href="static/css/login.css">
    <script src="https://kit.fontawesome.com/1b8ba3dee0.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="loggedin.php" method="POST" class="signin">
          <h1>Sign in</h1>
        <div class="input">
          <input type="text" name="username" class="field username" id="username" placeholder="Username" required>
        </div>
        <div class="input">
          <input type="password" name="password" class="field password" id="password" placeholder="Password" required>
        <i class="fas fa-eye hidden" data-name="eye" title="Hide Password"></i>
        <i class="fas fa-eye-slash show" data-name="eye-slash" title="Show Password"></i>
        </div>
        <button class="button" type="submit">Sign in</button>
        <div class="link">
            <a href="signup.php">Create Account</a>
            <a href="home.php">Home</a>
            <a href="#">Forget Password?</a>
        </div>
      </form>
    <script src="static/js/login.js"></script>
</body>
</html>