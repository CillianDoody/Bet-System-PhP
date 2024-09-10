<?php
include 'Place Bet Header.html';
   try { 
$pdo = new PDO('mysql:host=localhost;dbname=BetSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM fixtures WHERE OddsHTeam>0 AND OddsATeam>0';
$result = $pdo->query($sql); 
?>

<br>
<table class="table table-hover">
<tr>
    <th>Home Team</th>
    <th>Away Team</th>
    <th>Select</th>
</tr>

<?php 
while ($row = $result->fetch())  {

	?>
<tr>
    <td> <?php echo $row['fk_HTeam'] ?> </td>
    <td>  <?php echo $row['fk_ATeam'] ?></td> 
    <td><a href="placeBet.php?fixtureID=<?php echo $row['fixtureID']?>">Select</a></td>
</tr>
<?php } ?>
</table>
<?php
   }

catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
?>
