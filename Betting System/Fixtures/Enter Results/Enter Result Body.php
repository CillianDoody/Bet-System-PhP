        <form action="Confirm Result.php" method="post">
                <!--Used form validation from source below!-->
                <!--Title: Client-side form validation
                Author: n.a.
                Site owner/sponsor: mozilla.org
                Date: n.a.
                Code version: n.a.
                Availability: https://developer.mozilla.org/en-US/docs/Learn/Forms/Form_validation
                Modified: no-->
                <?php if (isset($HTeam)) echo $HTeam; ?>: <input type="number" name="Score1"><br>
                <?php if (isset($ATeam)) echo $ATeam; ?>: <input type="number" name="Score2"><br>
                
                <input type="submit" name="submit" value="Enter Result" >
    
        </form>
    </body>
</html>
