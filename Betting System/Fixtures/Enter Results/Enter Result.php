<?php
include 'Enter Result Head.html';
    session_start();
    if (isset($_GET['fixtureID'])) {
        $_SESSION['fixtureID']=$_GET['fixtureID'];
    }
    $fixtureID = $_SESSION['fixtureID'];

    try {  
        $pdo = new PDO('mysql:host=localhost;dbname=BetSYS; charset=utf8', 'root', ''); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(*) FROM Fixtures WHERE fixtureID = '$fixtureID'";
        $result = $pdo->prepare($sql);
        $result->execute();
        if($result->fetchColumn() > 0) {
            $sql = "SELECT * FROM Fixtures where fixtureID = '$fixtureID'";
            $result = $pdo->prepare($sql);
            $result->execute();

            $row = $result->fetch();
            $id = $row['fixtureID'];
	        $HTeam = $row['fk_HTeam'];
	        $ATeam = $row['fk_ATeam'];
	        $Score1 = $row['Score1'];
            $Score2 = $row['Score2'];
   
        }
    }
    
    catch (PDOException $e) {
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    }

include 'Enter Result Body.php';
?>