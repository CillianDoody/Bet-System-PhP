        
        <form action="goBack.php" method="post">
                
                Account Email: <input type="email" name="email" ><br>
                <!--Used form validation from source below!-->
                <!--Title: Client-side form validation
                Author: n.a.
                Site owner/sponsor: mozilla.org
                Date: n.a.
                Code version: n.a.
                Availability: https://developer.mozilla.org/en-US/docs/Learn/Forms/Form_validation
                Modified: no-->
                <?php if (isset($HTeam)) echo $HTeam; echo " @ ", $HTeamOdds; ?>: <input type="radio" name="team" value="<?php if (isset($HTeam)) echo $HTeam; ?>"><br>
                <?php if (isset($ATeam)) echo $ATeam; echo " @ ", $ATeamOdds; ?>: <input type="radio" name="team" value="<?php if (isset($ATeam)) echo $ATeam; ?>"><br>
                Place amount: <input type="number" name="amount"><br>
                
                <input type="submit" name="submit" value="Place Bet" >
    
        </form>
    </body>
</html>
