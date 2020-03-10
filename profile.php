<?php
    session_start();
    if (isset($_SESSION['login']) and $_SESSION['login']==TRUE){
        try{
            $dbhandler = new PDO('mysql:host=localhost;dbname=clothesitephp','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
            $query=$dbhandler->prepare("select * from users where username=?");
            $query->execute(array($_SESSION['username']));
            while($r=$query->fetch(PDO::FETCH_ASSOC)){
                $_SESSION['id']=$r['id'];
                $uname=$r['username'];
                $fname=$r['first_name'];
                $lname=$r['last_name'];
                $email=$r['email'];
                $pno=$r['mobile_no'];
                $pro_pic=$r['profile_pic'];    
            }
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
            die();
        }
    }
    else
        header("Location:home.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Fashion Hub</title>
    <link rel="stylesheet" href="static/css/home.css">
    <link rel="stylesheet" href="static/css/profile.css">
    <link rel="shortcut icon" href="static/img/full-stack1200.png" type="image/png">
    <link rel="stylesheet" href="static/fontawesome-free-5.11.2-web/css/all.css">
    <script src="https://kit.fontawesome.com/1b8ba3dee0.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav-section nav-hide">
        <div class="nav-intro">
            <div><!--<i class="fas fa-bars"></i>--> <span>Menu</span></div>
            <div class="close"><i class="fas fa-times"></i></div>
        </div>
        <div class="profile">
        <?php if (isset($_SESSION['login']) and $_SESSION['login']==TRUE) {
              echo '<div class="photo"><img src="'.$_SESSION['profile_pic'].'" alt=""></div>'
                   .'<div class="about">'
                    .'<h3>'.strtoupper($_SESSION['username']).'</h3>'
                    .'<a href="profile.php">See Profile</a>'
                    .'<div><i class="fas fa-arrow-circle-right"></i></div></div>';
            }
            else {
               echo '<div class="about">'
                   .'<h3>Login to see Profile</>'
                   .'</div>';
            }?>
        </div>
        <div class="content">
            <p>My Cart</p>
            <p>Offers</p>
            <p>WishList</p>
            <p>About Us</p>
            <p>Contact Us</p>
            <p>Help</p>
        </div>
    </div>
    <?php if (isset($_SESSION['login']) and $_SESSION['login']==TRUE) {
       echo '<div class="top anim">'
            .'<!-- <a href="#" class="logo"></a>'
            .'<p>The Fashion Hub</p> -->'
            .'<p>Hello, '.strtoupper($_SESSION['username']).'</p>' 
        .'</div>';
    }?>
    <div class="follow">
        <a href="#" id="pinterest"><i class="fab fa-pinterest"></i></a>
        <a href="mailto:manan5401desai@gmail.com?subject=Help" id="mail"><i class="fas fa-envelope"></i></a>
        <a href="https://api.whatsapp.com/send?phone=919426115401" id="whatsapp"><i class="fab fa-whatsapp"></i></a>
        <a href="#" id="messenger"><i class="fab fa-facebook-messenger"></i></a>
        <a href="#" id="linkedin"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" id="reddit"><i class="fab fa-reddit-alien"></i></a>
    </div>
    <nav>
        <div class="menu"><i class="fas fa-bars"></i></div>
        <div>
        <?php if (isset($_SESSION['login']) and $_SESSION['login']==TRUE) {
            echo '<a href="home.php">Home</a>' 
                .'<a href="logout.php">Logout</a>';
        }else{
                echo '<a href="home.php">Home</a>'
                    .'<a href="login.php">Login</a>'
                    .'<a href="signup.php">Sign up</a>';
        }?>
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </nav>
    <div class="secs">
    <?php
        echo '<section class="sec1">'
            .'<div class="photo"><img src="'.$pro_pic.'" alt="Profile Picture" width="190" height="190"></div>'
            .'<h1>'.$fname.'  '.$lname.'</h1>'
            .'</section>'
    
            .'<form action="update.php" method="POST" class="sec2" enctype="multipart/form-data">'
                .'<span class="success"><i class="fas fa-check-circle">';
                if(isset($_GET['msg']))
                 echo $_GET['msg'];
                echo '</i></span>'
                .'<div class="input">'
                    .'<span>Username :</span> <input type="text" value="'.$uname.'" disabled name="username">' 
                .'</div>'
                .'<div class="input">'
                    .'<span>Firstname :</span> <input type="text" value="'.$fname.'" disabled name="firstname">'
                .'</div>'
                .'<div class="input">'
                    .'<span>Lastname :</span> <input type="text" value="'.$lname.'" disabled name="lastname">'
                .'</div>'
                .'<div class="input">'
                    .'<span>Email :</span> <input type="email" value="'.$email.'" disabled name="email"> '
                .'</div>'
                .'<div class="input">'
                    .'<span>Contact_number :</span> <input type="tel" value="'.$pno.'" disabled name="ph_no">'
                .'</div>'
                .'<div class="input">'
                    .'<span>Select Your File:</span> <input type="file" name="myFile" id="myFile" disabled>'
                .'</div>'
                .'<div class="b">'
                .'<a href="home.php" class="button1">Home</a>'
                .'<button class="button" id="update" type="button" name="update">Update</button>'
                .'<button class="button" id="save" type="submit" disabled="disabled">Save</button>'
                .'</div>'
            .'</form>'
        .'</div>';
        ?>
    <script src="https://kit.fontawesome.com/1b8ba3dee0.js" crossorigin="anonymous"></script>
    <script src="static/js/profile.js"></script>
    <script src="static/js/home.js"></script>
    <footer>
            
        <div class="help">
            <input type="text" placeholder="What can we do..?">
            <a href="mailto:manan5401desai@gmail.com?subject=Help"><i class="fas fa-search"></i></a>
        </div>
        <div class="social">
            <!-- <h3>Follow US On</h3> -->
            <a href="https://twitter.com/developer_mn54?s=09"><i class="fab fa-twitter"></i></a>
            <a href="https://www.facebook.com/manan.desai.1811"><i class="fab fa-facebook"></i></a>
            <a href="https://instagram.com/_manandesai_?igshid=v64eqo4o04o1"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="parts">
            <a href="#"><i class="fas fa-home"></i> Home</a>
            <a href="#"><i class="fas fa-address-card"></i> About us</a>
            <a href="">Contact us</a>
            <a href="#">Term and conditions</a>
            <a href="#">privacy Policy</a>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/1b8ba3dee0.js" crossorigin="anonymous"></script>
<script src="static/js/home.js"></script>
</body>
</html>