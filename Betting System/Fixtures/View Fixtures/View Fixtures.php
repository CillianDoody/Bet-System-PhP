<?php
include 'View Fixture Head.html';
   try { 
        $pdo = new PDO('mysql:host=localhost;dbname=betsys; charset=utf8', 'root', ''); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM Fixtures ORDER BY Fdate';
        $result = $pdo->query($sql); 
?>
<br>
<table class="table table-hover">
<tr>
    <th>Home Team:</th> <th>Away Team:</th> <th>Date:</th> <th>Time:</th> 
    <th>Home Team Manger:</th> <th>Away Team Manager:</th> <th>Grounds:</th>
</tr>

<?php 
    $counter = 1;
    while ($row = $result->fetch()) {
        $sql1 = 'SELECT * FROM teams WHERE name = (SELECT fk_HTeam FROM Fixtures WHERE fixtureID ='.$counter.')';
        $result1 = $pdo->query($sql1);
        $sql2 = 'SELECT * FROM teams WHERE name = (SELECT fk_ATeam FROM Fixtures WHERE fixtureID ='.$counter.')';
        $result2 = $pdo->query($sql2);
        
        $row1 = $result1->fetch();
        $row2 = $result2->fetch();
?>
        <tr><td><?php echo $row['fk_HTeam']?></td> <td><?php echo $row['fk_ATeam']?></td> <td><?php echo $row['Fdate'] ?></td>
        <td><?php echo $row['Ftime'] ?></td> <td><?php echo $row1['manager'] ?></td> <td><?php echo $row2['manager'] ?></td> 
        <td><?php echo $row1['grounds'] ?></td>
        </tr>
<?php 
        $counter = $counter + 1;
    } 
?>
</table>
<?php
   }

    catch (PDOException $e) { 
        $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
    }
?>
