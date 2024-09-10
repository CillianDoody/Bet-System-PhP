<?php
include 'Enter Result Head.html';
    session_start();
    $fixtureID = $_SESSION['fixtureID'];

    if (isset($_POST['submit'])) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=BetSYS; charset=utf8', 'root', ''); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM Fixtures where fixtureID = '$fixtureID'";
            $result = $pdo->prepare($sql);
            $result->execute();

            $row = $result->fetch();
            $id = $row['fixtureID'];
	        $HTeam = $row['fk_HTeam'];
	        $ATeam = $row['fk_ATeam'];

            $Score1 = $_POST['Score1'];
            $Score2 = $_POST['Score2'];
                    
            if ($Score1 == '' || $Score2 == '') { 
                echo("Form was not filled out.");
            }

            else{
                if ($Score1 > $Score2) {
                    $sql = 'UPDATE fixtures SET Score1=:Score1, Score2=:Score2 WHERE fixtureID = :fixtureID';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':Score1', $Score1);
                    $stmt->bindValue(':Score2', $Score2);
                    $stmt->bindValue(':fixtureID', $fixtureID);
                    $stmt->execute();
                    
                    $sql = "UPDATE bets SET betStatus='w' WHERE fk_fixtureID = :fid AND fk_TeamPicked = :HTeam";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':HTeam', $HTeam);
                    $stmt->bindValue(':fid', $fixtureID );
                    $stmt->execute();

                    $sql = "UPDATE bets SET betStatus='l' WHERE fk_fixtureID = :fid AND fk_TeamPicked = :ATeam";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':fid', $fixtureID );
                    $stmt->bindValue(':ATeam', $ATeam);
                    $stmt->execute();

                    $sql = "SELECT fk_accountID, Odds, betAmount FROM bets WHERE betStatus='w'";
                    $result = $pdo->prepare($sql);
                    $result->execute();

                    while ($row = $result->fetch()) {
                        $accountID = $row['fk_accountID'];
                        $Odds = $row['Odds'];
                        $amount = $row['betAmount'];

                        $sql = "SELECT balance FROM customers WHERE accountID= :cid";
                        $result1 = $pdo->prepare($sql);
                        $result1->bindValue(':cid', $accountID );
                        $result1->execute();
                        $row1 = $result1->fetch();

                        $currentBalance = $row1['balance'];
                        $balance = ($amount*$Odds)+$currentBalance;

                        $sql = "UPDATE customers SET balance=:balance WHERE accountID=:cid";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':balance', $balance );
                        $stmt->bindValue(':cid', $accountID );
                        $stmt->execute();
                    }
                }

                else if ($Score2 > $Score1) {
                    $sql = 'UPDATE fixtures SET Score1=:Score1, Score2=:Score2 WHERE fixtureID = :fixtureID';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':Score1', $Score1);
                    $stmt->bindValue(':Score2', $Score2);
                    $stmt->bindValue(':fixtureID', $fixtureID);
                    $stmt->execute();
                    
                    $sql = "UPDATE bets SET betStatus='w' WHERE fk_fixtureID = :fid AND fk_TeamPicked = :ATeam";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':fid', $fixtureID );
                    $stmt->bindValue(':ATeam', $ATeam);
                    $stmt->execute();
                    
                    $sql = "UPDATE bets SET betStatus='l' WHERE fk_fixtureID = :fid AND fk_TeamPicked = :HTeam";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':fid', $fixtureID );
                    $stmt->bindValue(':HTeam', $HTeam);
                    $stmt->execute();

                    $sql = "SELECT fk_accountID, Odds, betAmount FROM bets WHERE betStatus='w'";
                    $result = $pdo->prepare($sql);
                    $result->execute();

                    while ($row = $result->fetch()) {
                        $accountID = $row['fk_accountID'];
                        $Odds = $row['Odds'];
                        $amount = $row['betAmount'];

                        $sql = "SELECT balance FROM customers WHERE accountID= :cid";
                        $result1 = $pdo->prepare($sql);
                        $result1->bindValue(':cid', $accountID );
                        $result1->execute();
                        $row1 = $result1->fetch();

                        $currentBalance = $row1['balance'];
                        $balance = ($amount*$Odds)+$currentBalance;

                        $sql = "UPDATE customers SET balance = :balance WHERE accountID = :cid";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':balance', $balance );
                        $stmt->bindValue(':cid', $accountID );
                        $stmt->execute();
                    }   
                }

                else {
                    $sql = 'UPDATE fixtures SET Score1=:Score1, Score2=:Score2 WHERE fixtureID = :fixtureID';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':Score1', $Score1);
                    $stmt->bindValue(':Score2', $Score2);
                    $stmt->bindValue(':fixtureID', $fixtureID);
                    $stmt->execute();
                    
                    $sql = "UPDATE bets SET betStatus='l' WHERE fk_fixtureID = :fid";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':fid', $fixtureID );
                    $stmt->execute();
                }

                $sql = "DELETE FROM Bets WHERE betStatus='w' OR betStatus='l'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $sql = "DELETE FROM Fixtures WHERE fixtureID = :fid";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':fid', $fixtureID );
                $stmt->execute();
            }
        }
        
        catch (PDOException $e) {
        
            $title = 'An error has occurred';
            $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        }   
    }
?>
 <p>The result has been entered <a href="View All Enter Result.php">Go Back</a></p>