<?php
include 'head.html';

try { 
    $pdo = new PDO('mysql:host=localhost;dbname=betsys; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT count(*) FROM Customers WHERE accountID=:cid";

    $result = $pdo->prepare($sql);
    $result->bindValue(':cid', $_GET['accountID']); 
    $result->execute();
    if($result->fetchColumn() > 0) 
    {
        $sql = 'SELECT * FROM Customers where accountID = :cid';
        $result = $pdo->prepare($sql);
        $result->bindValue(':cid', $_GET['accountID']); 
        $result->execute();

        $row = $result->fetch();
        $id = $row['accountID'];
	    $Fname= $row['forename'];
	    $Sname=$row['surname'];
	    $DOB= $row['DOB'];
        $phone= $row['phone'];
	    $email=$row['email'];
        $postcode= $row['postcode'];
	    $balance=$row['balance'];  
   
    }

    else {
          print "No rows matched the query. try again click<a href='view all update.php'> here</a> to go back";
         }
    }
     
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

include 'updatedetails.html';
?>
