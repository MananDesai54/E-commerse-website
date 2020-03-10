<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword']))
    {
        try{
            $dbhandler = new PDO('mysql:host=localhost;dbname=clothesitephp','root','');
            // echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $query=$dbhandler->prepare("select username from users where username=?");
            $query->execute(array($_POST['username']));
            $count=$query->rowcount();
            if($count > 0)
			{
			    header("Location:signup.php?msg=User already exist..");
			}
			else
			{			
                if($_POST['password']===$_POST['repassword'])
                {
                    
                    $query=$dbhandler->prepare("insert into users (first_name,last_name,username,password,email,mobile_no) values (?,?,?,?,?,?)");
                    $query->execute(array($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['ph_no']));
                    header("Location:login.php");
                }
                else
                {
                    header("Location:signup.php?msg=password didn't match..");    
                }
            }
        }
        catch(PDOException $e){
                echo $e->getMessage();
                die();
        }
    }
    else{
        header("Location:signup.php");
    }
?>