<?php
session_start();

include("mCon.php");

try {
    
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    $sql = "SELECT COUNT(*) FROM tUser WHERE username = :username AND password = :password AND isAdmin = 1";
   
       
    $result = $dbh->prepare($sql);
   
   
    $result->execute(array('username' => $_POST['username'], 'password' => md5($_POST['password'])));
    
    $count = $result->fetchColumn();
   
    if($count == 1) {
        echo 'Login';
        $_SESSION["adminusername"] = $_POST['username'];
         header("Location: ../sites/admin-mainpage.php"); 
        
    } else {
        header("Location: ../sites/admin-failed-login.php"); 
    }
    
  } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

unset($dbh); 


?>