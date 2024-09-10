<?php
include 'addCustomerHeader.html';

if (isset($_POST['submit'])) {
    
    try {

        $forename = $_POST['forename'];
        $surname = $_POST['surname'];
        $DOB = $_POST['DOB'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $postcode = $_POST['postcode'];
        $pdo = new PDO('mysql:host=localhost;dbname=BetSYS; charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        if ($forename == '' || $surname == '' || $DOB == '' || $phone == '' || $email == '' || $postcode == ''){
        
            echo("Form was not filled out.");
        }

        else{
        
            $sql = "INSERT INTO Customers (forename, surname, DOB, phone, email, postcode, status, balance) VALUES(:forename, :surname,
                    :DOB, :phone, :email, :postcode, 'a', 0.00)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':forename', $forename);
            $stmt->bindValue(':surname', $surname);
            $stmt->bindValue(':DOB', $DOB);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':postcode', $postcode);
            $stmt->execute();
    
            echo "Great success, do it again";
        }
    }
    
    catch (PDOException $e) {
    
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    }    
}

include 'addCustomerFoot.html';
?>
