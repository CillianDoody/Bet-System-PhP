<?php
include 'Place Bet Header.html';
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
	        $HTeamOdds = $row['OddsHTeam'];
            $ATeamOdds = $row['OddsATeam'];

            $email = $_POST['email'];
            $Team = $_POST['team'];
            $amount = $_POST['amount'];
                    
            if ($email == '' || $Team == '' || $amount == ''){
                echo("Form was not filled out.");
            }

            else{
                if (($Team == $HTeam)) {
                    $Odds = $HTeamOdds;
                }
                else {
                    $Odds = $ATeamOdds;
                }

                $sql="SELECT count(*) FROM Customers WHERE email = '$email'";

                $result = $pdo->prepare($sql);
                $result->execute();
                if ($result->fetchColumn() > 0) {
                    $sql = "SELECT * FROM Customers where email = '$email'";
                    $result = $pdo->prepare($sql); 
                    $result->execute();

                    $row = $result->fetch();
                    $accountID = $row['accountID'];
                    $balance = $row['balance'];

                    if ($amount > $balance) {
                        echo "This amount (", $amount, ") is more then your balance (", $balance,")";
                    }
                    else {
                        $sql = "INSERT INTO Bets (betAmount, Odds, betStatus, fk_accountID, fk_fixtureID, fk_TeamPicked) 
                        VALUES(:betAmount, :Odds, 'np', :fk_accountID, :fk_fixtureID, :fk_TeamPicked)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':betAmount', $amount);
                        $stmt->bindValue(':Odds', $Odds);
                        $stmt->bindValue(':fk_accountID', $accountID);
                        $stmt->bindValue(':fk_fixtureID', $fixtureID);
                        $stmt->bindValue(':fk_TeamPicked', $Team);
                        $stmt->execute();
                        
                        
                        if ($Team == $HTeam) {
                            if ($HTeamOdds > 1.01) {
                                $HTeamOdds = ($HTeamOdds - 0.01);
                            }                              
                            $ATeamOdds = ($ATeamOdds + 0.01);  
                            $sql = 'UPDATE fixtures SET OddsHTeam=:OddsHTeam, OddsATeam=:OddsHTeam WHERE fixtureID = :fixtureID';
                            $stmt = $pdo->prepare($sql);                             
                            $stmt->bindValue(':OddsHTeam', $HTeamOdds);
                            $stmt->bindValue(':OddsATeam', $ATeamOdds);
                            $stmt->bindValue(':fixtureID', $fixtureID);
                            $stmt->execute();  
                        }
                            
                        else {
                            if ($ATeamOdds > 1.01) {
                                $ATeamOdds = ($ATeamOdds - 0.01);
                            }
                            $HTeamOdds = ($HTeamOdds + 0.01);
                            $sql = 'UPDATE fixtures SET OddsHTeam=:OddsHTeam, OddsATeam=:OddsATeam WHERE fixtureID = :fixtureID';
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':OddsHTeam', $HTeamOdds);
                            $stmt->bindValue(':OddsATeam', $ATeamOdds);
                            $stmt->bindValue(':fixtureID', $fixtureID);
                            $stmt->execute();
                        }

                        $balance = ($balance - $amount);    
                        $sql = 'UPDATE Customers SET Balance=:Balance WHERE accountID = :accountID';
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':Balance', $balance);
                        $stmt->bindValue(':accountID', $accountID);
                        $stmt->execute(); 

                        echo "Bet has been placed!";
                        }
                    
                }
                    
                else {
                     echo "That email is not linked to an account!";
                }
            }
        }
        
        catch (PDOException $e) {
        
            $title = 'An error has occurred';
            $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        }   
    }
?>
 <a href="viewAllPlaceBet.php">Go Back</a>