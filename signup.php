<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Fashion Hub</title>
    <script src="https://kit.fontawesome.com/1b8ba3dee0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="static/css/signup.css">
</head>
<body>
    <form action="create_user.php" method="POST" class="signup">
            <h1>Sign up</h1>
            <!-- TODO....about username and email exist -->
            <!-- <h3>{{email_match}}</h3>     -->
            <!-- <h3>{{not_match}}</h3> -->
        <div class="input">
            <input type="text" name="firstname" class="field firstname" id="firstname" placeholder="*Firstname" required>
            <input type="text" name="lastname" class="field lastname" id="lastname" placeholder="*Lastname" required>
        </div>
        <div class="input">
            <input type="text" name="username" class="field username" id="username" placeholder="*Username" required>
        </div>
        <div class="input">
            <input type="email" name="email" class="field email" id="email" placeholder="*abc@xyz.com" required>
        </div> 
        <div class="input">
            <input type="tel" name="ph_no" class="field ph-no" id="ph-no" placeholder="*Mobile No." required pattern=".{10}" title="Please provide valid number">
			<!-- <input type="date" name="bday" class="field bday" id="bday" placeholder="Birth Date"> -->
        </div>
        <div class="input">
            <input type="password" name="password" class="field password" id="password" placeholder="*Password" required>
          <i class="fas fa-eye hidden" data-name="eye" data-index="0" title="Hide Password"></i>
          <i class="fas fa-eye-slash show" data-name="eye-slash" data-index="0" title="Show Password"></i>
        </div>
        <div class="input">
            <input type="password" name="repassword" class="field repassword password" id="repassword" placeholder="*Re-Enter Password" required>
          <i class="fas fa-eye hidden" data-name="eye" data-index="1" title="Hide Password"></i>
          <i class="fas fa-eye-slash show" data-name="eye-slash" data-index="1" title="Show Password"></i>
        </div>
        <?php
            if(isset($_GET['msg']))
                echo $_GET['msg'];
        ?>
        <button class="button" type="submit">Sign up</button>
        <p><a href="../">Home</a> &nbsp; &nbsp; &nbsp; Already have an account?<a href="login.php"> Login</a> </p>
        <script src="static/js/signup.js"></script>
    </form>
</body>
</html>