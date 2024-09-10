<?php
include 'Generate Fixtures Head.html';

$pdo = new PDO('mysql:host=localhost;dbname=betsys; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM Fixtures WHERE fixtureID > 0';
$result = $pdo->prepare($sql);
$result->execute();

$sql = 'ALTER TABLE Fixtures auto_increment=1';
$result = $pdo->prepare($sql); 
$result->execute();

$Teams = array();
$Times = array("12:30", "14:00", "15:00", "17:00", "20:00");

$sql = 'SELECT * FROM Teams';
$result = $pdo->query($sql);

while ($row = $result->fetch()) {
    $SelectedTeam = $row['name'];
    array_push($Teams, $SelectedTeam);
}

shuffle($Teams); 

/*I got the shuffle function from this website
Title: PHP shuffle() Function
Author: n.a.
Site owner/sponsor: w3schools.com
Date: n.a.
Code version: n.a.
Availability: https://www.w3schools.com/php/func_array_shuffle.asp
Modified: no*/

for ($i=0; $i<19; $i++) {

    //fixture 1
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[0]);
    $stmt->bindValue(':fk_ATeam', $Teams[19]);
    if ($i%2==0) {
    
        /*I learned how to use the date functions from this website
        Title: PHP date_modify() Function
        Author: n.a.
        Site owner/sponsor: w3schools.com
        Date: n.a.
        Code version: n.a.
        Availability: https://www.w3schools.com/php/func_date_modify.asp
        Modified: no*/

        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[19]);
    $stmt->bindValue(':fk_ATeam', $Teams[0]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 1

    //fixture 2
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[1]);
    $stmt->bindValue(':fk_ATeam', $Teams[18]);
    if ($i%2==0) {
    
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[18]);
    $stmt->bindValue(':fk_ATeam', $Teams[1]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 2

    //fixture 3
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[2]);
    $stmt->bindValue(':fk_ATeam', $Teams[17]);
    if ($i%2==0) {
        
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[17]);
    $stmt->bindValue(':fk_ATeam', $Teams[2]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 3

    //fixture 4
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[3]);
    $stmt->bindValue(':fk_ATeam', $Teams[16]);
    if ($i%2==0) {
        
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[16]);
    $stmt->bindValue(':fk_ATeam', $Teams[3]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 4

    //fixture 5
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[4]);
    $stmt->bindValue(':fk_ATeam', $Teams[15]);
    if ($i%2==0) {
        
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[15]);
    $stmt->bindValue(':fk_ATeam', $Teams[4]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 5

    //fixture 6
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[5]);
    $stmt->bindValue(':fk_ATeam', $Teams[14]);
    if ($i%2==0) {
        
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[14]);
    $stmt->bindValue(':fk_ATeam', $Teams[5]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 6

    //fixture 7
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[6]);
    $stmt->bindValue(':fk_ATeam', $Teams[13]);
    if ($i%2==0) {
        
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[13]);
    $stmt->bindValue(':fk_ATeam', $Teams[6]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 7

    //fixture 8
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[7]);
    $stmt->bindValue(':fk_ATeam', $Teams[12]);
    if ($i%2==0) {
        
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[12]);
    $stmt->bindValue(':fk_ATeam', $Teams[7]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 8

    //fixture 9
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[8]);
    $stmt->bindValue(':fk_ATeam', $Teams[11]);
    if ($i%2==0) {
       
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[11]);
    $stmt->bindValue(':fk_ATeam', $Teams[8]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 9

    //fixture 10
    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[9]);
    $stmt->bindValue(':fk_ATeam', $Teams[10]);
    if ($i%2==0) {
        
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=$i*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();

    $sql = "INSERT INTO Fixtures (fk_HTeam, fk_ATeam, OddsHTeam, OddsATeam, Fdate, Ftime, Score1, Score2) 
            VALUES(:fk_HTeam, :fk_ATeam, 0.00, 0.00, :Fdate, :ftime, 0, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fk_HTeam', $Teams[10]);
    $stmt->bindValue(':fk_ATeam', $Teams[9]);
    if ($i%2==0) {
        
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-17");
        date_modify($date,"+$AddingOnDays days");
        }
    else {
        $AddingOnDays=($i+19)*7; 
        $date=date_create("2024-08-18");
        date_modify($date,"+$AddingOnDays days");
    }
    $stmt->bindValue(':Fdate', date_format($date,"Y-m-d"));
    shuffle($Times);
    $TimeOfFixture=$Times[0];
    $stmt->bindValue(':ftime', $TimeOfFixture);
    $stmt->execute();
    //end of fixture 10

    for ($j=1; $j<19; $j++){
        $temp=$Teams[$j];
        $Teams[$j]=$Teams[$j+1];
        $Teams[$j+1]=$temp;
    }
}
?>

<p>The fixtures have been randomised <a href="..\..\Home\Home.html">Go Back</a></p>