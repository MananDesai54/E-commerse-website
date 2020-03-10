<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        try{
            $dbhandler = new PDO('mysql:host=localhost;dbname=clothesitephp','root','');
            // echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
            $query=$dbhandler->prepare("select username,profile_pic from users where username=? and password=? ");
            $query->execute(array($_POST['username'],$_POST['password']));
            $count=$query->rowcount();
            if($count > 0)
			{
			    while($r=$query->fetch(PDO::FETCH_ASSOC)){
                    $_SESSION['login']=TRUE;
                    $_SESSION['username']=$r['username'];
                    $_SESSION['profile_pic']=$r['profile_pic'];
                    header("Location:home.php");    
		    	}
			}
			else
			{
				header("Location:login.php");
			}
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
        // if($_POST['username']=="user1" && $_POST['password']=="user10702")
        // {
        //     $_SESSION['login']=TRUE;
            
        //     $_SESSION['username']="user1";
        //     header("Location:home.php");
        // }
    }
    else{
        header("Location:login.php");
    }
?>