<?php
include 'head.html';
try { 
     $pdo = new PDO('mysql:host=localhost;dbname=betsys; charset=utf8', 'root', ''); 
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = 'DELETE FROM Customers WHERE accountID = :cid';
     $result = $pdo->prepare($sql);
     $result->bindValue(':cid', $_POST['accountID']); 
     $result->execute();
          

     echo "You just deleted customer no: " . $_POST['accountID'] ." \n click<a href='view all delete.php'> here</a> to go back ";
                                                                        
} 
catch (PDOException $e) { 

if ($e->getCode() == 23000) {
          echo "ooops couldnt delete as that record is linked to other tables click<a href='view all update delete.php'> here</a> to go back ";
     }

}
?>
