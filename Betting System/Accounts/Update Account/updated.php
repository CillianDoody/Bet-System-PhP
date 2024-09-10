<?php
include 'head.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=betsys; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'update Customers set forename=:cFname, surname=:cSname, DOB=:cDOB, phone=:cPhone, 
email=:cEmail, postcode=:cPostcode, balance=:cBalance WHERE accountID = :cid';
$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_POST['ud_accountID']); 
$result->bindValue(':cFname', $_POST['ud_forename']); 
$result->bindValue(':cSname', $_POST['ud_surname']); 
$result->bindValue(':cDOB', $_POST['ud_DOB']); 
$result->bindValue(':cPhone', $_POST['ud_phone']); 
$result->bindValue(':cEmail', $_POST['ud_email']); 
$result->bindValue(':cPostcode', $_POST['ud_postcode']); 
$result->bindValue(':cBalance', $_POST['ud_balance']); 
$result->execute();
     
//For most databases, PDOStatement::rowCount() does not return the number of rows affected by a SELECT statement. id
     
$count = $result->rowCount();
if ($count > 0)
{
echo "You just updated customer no: " . $_POST['ud_accountID'] ." click<a href='view all update.php'> here</a> to go back ";
}
else
{
echo "nothing updated, click<a href='view all update.php'> here</a> to go back ";
}
}
 
catch (PDOException $e) { 

$output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 

}
?>
