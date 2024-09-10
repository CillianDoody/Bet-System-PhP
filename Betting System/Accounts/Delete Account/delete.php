<?php
include 'head.html';

try { 
$pdo = new PDO('mysql:host=localhost;dbname=betsys; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM Customers where accountID = :cid';
$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_GET['accountID']); 
$result->execute();

if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM Customers where accountID = :cid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cid', $_GET['accountID']); 
    $result->execute();
    
while ($row = $result->fetch()) { 
      
    echo $row['forename'] . ' ' . $row['surname'] ?>
   Are you sure you want to delete ??
  <form action="deletecustomer.php" method="post">
        <input type="hidden" name="accountID" value="<?php echo $row['accountID'] ?>"> 
        <input type="submit" value="yes delete" name="delete">
 </form>

  <?php      
    
      
   }
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}



?>