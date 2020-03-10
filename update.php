<?php
    session_start();
    if (isset($_SESSION['login']) and $_SESSION['login']==TRUE){
        try{
            $dbhandler = new PDO('mysql:host=localhost;dbname=clothesitephp','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if(!empty($_FILES["myFile"]["name"]))
            {
                $target_location="./media/profile_pic/".basename($_FILES["myFile"]["name"]);
                if(! (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_location)))
                    echo "Error: " . $_FILES["myFile"]["error"] . "<br>";
                else
                {
                    $ext = pathinfo($target_location, PATHINFO_EXTENSION);
                    $new="./media/profile_pic/".$_POST['username'].".".$ext;
                    rename($target_location,$new);
                }
                $query=$dbhandler->prepare("update users set username=?,first_name=?,last_name=?,email=?,mobile_no=?,profile_pic=? where id=?");
                $query->execute(array($_POST['username'],$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['ph_no'],$new,$_SESSION['id']));
                $_SESSION['username']=$_POST['username'];
                $_SESSION['profile_pic']=$new;
            }
            else{
                $query=$dbhandler->prepare("update users set username=?,first_name=?,last_name=?,email=?,mobile_no=?,profile_pic=? where id=?");
                $query->execute(array($_POST['username'],$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['ph_no'],$_SESSION['profile_pic'],$_SESSION['id']));
                $_SESSION['username']=$_POST['username'];
            }
             	
            
            header("Location:profile.php?msg=Update Successful.");       
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        }
    }
    else{
     header("Location:home.php");
    }
?>