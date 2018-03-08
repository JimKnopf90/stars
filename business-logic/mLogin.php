<?php
session_start();

try {
    $hostname = "127.0.0.1\sqlexpress";
   
    $dbname = "StaRsDB";
    $dbusername = "sa";
    $pw = "abc:0102";
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    $sql = "SELECT COUNT(*) FROM tUser WHERE username = :username AND password = :password";
   
    
    //Write
    //$bz = $dbh->exec($sql);
    //    echo $bz . 'Timm';
    
    //Read
    //foreach ($dbh->query($sql) as $row) {
    //    print_r($row);
    //}
    
    $result = $dbh->prepare($sql);
   
   
    $result->execute(array('username' => $_POST['username'], 'password' => md5($_POST['password'])));
    
    $count = $result->fetchColumn();
   
    if($count == 1) {
        echo 'Login';
        $_SESSION["username"] = $_POST['username'];
         header("Location: ../sites/mainpage.php"); 
        
    } else {
        echo 'Du kommst hier nicht rein!';
    }
    
  } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

unset($dbh); 


?>